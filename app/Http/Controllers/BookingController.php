<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BookRoom;
use App\Room;
use Illuminate\Support\Facades\Input;
use App\RoomType;
use App\Booking;
use App\RoomSize;
use App\BookRoomService;
use App\Http\Requests\CheckFindRoomRequest;
use App\Service;
use App\Http\Requests\RoomRequest;
use Illuminate\Pagination\Paginator;
use App\Promotion;
use Carbon\Carbon;
use Cart;
use Auth;
use App\User;
use Illuminate\Support\Facades\Session;
use Twilio;
use Toastr;
use DateTime;
use Excel;



class BookingController extends Controller
{
    public function add(Request $request, $id)
    {
        $arrival = strtotime($request->session()->get('arrival'));
        $departure = strtotime($request->session()->get('departure'));
        $room = Room::find($id);
        $price = $room->price;
        $size = $request->session()->get('size');
        $roomType = $request->session()->get('roomType');
        Cart::add(
            [
                'id' => $room->id,
                'name' => $room->roomTypes->name,
                'qty' => ($departure - $arrival) / 3600 / 24,
                'price' => $price,
                'options' =>
                    [
                        'roomSize' => $room->roomSizes->name,
                    ]
            ]);
        return redirect('bookings/checkout');
    }

    public function createBooking(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            $data = Input::all();
            $user = Auth::user();
            $booking = new Booking();
            $booking->user_id = Auth::id();
            $booking->check_in = ($request->session()->get('arrival'));
            $booking->check_out = ($request->session()->get('departure'));
            $booking->total = Cart::total();
            if ($user->deposit < $booking->total) {
                Toastr::error('Insufficient Funds!!!!!', $title = null, $options = []);
                return redirect(route('bookings.checkout'));
            } else {
                $admin = User::where('role', '=', 1)->first();
                $admin->deposit = $admin->deposit + $booking->total;
                $user->deposit = $user->deposit - $booking->total;
                $user->save();
                $admin->save();
                $booking->code = (strtoupper(str_random(6)));
                $code = $booking->code;
                $booking->status = 0;
                $booking->save();
                foreach (Cart::content() as $row) {
                    $bookRoom = new BookRoom();
                    $bookRoom->room_id = $row->id;
                    $bookRoom->booking_id = $booking->id;
                    $room = Room::find($row->id);
                    $room->status = 1;
                    $room->save();
                    $bookRoom->save();
                }
                Cart::destroy();
                \Twilio::message('+84' . Auth::user()->phone_number,'Total Booking: ' .$booking->total. '$. '. 'Have Just Make Booking Hotel Code: ' .$code. '. You Can Cancel Booking before Check In');
                return redirect('/user/bookings');
            }
        }
    }

    public function checkout(Request $request)
    {
        $arrival = ($request->session()->get('arrival'));
        $departure = ($request->session()->get('departure'));
        $size = $request->session()->get('size');
        $roomType = $request->session()->get('roomType');
        return view('hotel.bookings.checkout', compact('arrival', 'departure', 'size', 'roomType'));
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect('bookings/checkout');
    }

    public function listAllBooking()
    {
        $bookings = Booking::paginate(25);
        $date = new DateTime();
        $date = date("Y-m-d");
        $bookings = Booking::orderBy('created_at', 'dec')->paginate(25);
        return view('admins.bookings.listAllBooking', compact('bookings', 'date'));
    }

    public function editBooking(Booking $booking)
    {
        $promotions = Promotion::all()->pluck('code', 'id');
        return view('admins.bookings.edit', compact('promotions', 'booking'));
    }

    public function checkinBooking(Booking $booking)
    {

        $booking->update(['status' => 1]);
        return redirect('admins/bookings');
    }

    public function detailBooking($booking_id)
    {

        // dd($now); UTC+0????
        // $bookroom=BookRoom::where('booking_id', $booking_id)->get();
        $bookroom = BookRoom::where('booking_id', $booking_id)->get();
        $booking = Booking::where('id', $booking_id)->first();
        // dd($booking);
        $from = new Carbon($booking->check_in);
        $to = new Carbon($booking->check_out);
        $now = Carbon::now();
        $diff1 = $from->diffInDays($to);
        $diff2 = $from->diffInDays($now);
        // dd($bookroom);
        // dd($from,$to,$now,$diff1,$diff2);
        return view('admins.bookings.detail1', compact('booking', 'diff1', 'diff2', 'now', 'bookroom'));
    }

    public function cancelBooking(Booking $booking)
    {
        //$booking->delete();
        $d = 0;
        $user = User::where('id', '=', $booking->user_id)->first();
        $admin = User::where('role', '=', 1)->first();
        $booking->update(['status' => 2]);
        $user->deposit = $user->deposit + ($booking->total * 0.8);
        $user->save();
        $admin->deposit = $admin->deposit - ($booking->total * 0.8);
        $admin->save();
        $booking->total = $booking->total * 0.2;
        $booking->save();
        foreach ($booking->rooms as $room) {
          foreach ($room->bookings as $book) {
            if ($book->status == 1 || $book->status == 0) {
              $d ++;
            }
          }
          if ($d == 0) {
            $room->status = 2;
            $room->save();
          }
        }
        return redirect('admins/bookings');
    }

    public function searchBooking()
    {
        $date = new DateTime();
        $date = date("Y-m-d");
        $search = Input::get('search');
        $search1 = Input::get('search1');
        $search2 = Input::get('search2');
        $search3 = Input::get('search3');
        $search4 = Input::get('search4');

        $totalbooking = 0;
        $totalmoney = 0;

        if (isset($search3)) {
            $bookings = Booking::where('code', '=', $search3)

            ->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings','date'));
        }
        if (isset($search) && isset($search1) && isset($search2) && isset($search4)) {

            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                ->where('status', '=',$search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                ->where('status', '=',$search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalbooking', 'totalmoney','date'));
        }

        if (isset($search) && isset($search1) && isset($search4)) {
            $bookings = Booking::where('created_at', '>=', $search1)
                ->where('status', '=',$search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '>=', $search1)
                ->where('status', '=',$search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search) && isset($search2) && isset($search4)) {
            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))
                ->where('status', '=',$search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))
                ->where('status', '=',$search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search1) && isset($search2) && isset($search4)) {
            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                ->where('status', '=',$search4)
                ->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                ->where('status', '=',$search4)
                ->orderBy('created_at', 'asc')->paginate(25);
            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search) && isset($search1) && isset($search2)) {
            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalbooking', 'totalmoney','date'));
        }

        if (isset($search) && isset($search1)) {
            $bookings = Booking::where('created_at', '>=', $search1)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '>=', $search1)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search) && isset($search2)) {
            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search) && isset($search4)) {
            $bookings = Booking::where('status', '=', $search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('status', '=', $search4)
                ->whereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search1) && isset($search2)) {
            $bookings = Booking::whereBetween('created_at', array($search1, $search2))->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::whereBetween('created_at', array($search1, $search2))->orderBy('created_at', 'asc')->paginate(25);
            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search1) && isset($search4)) {
            $bookings = Booking::where('created_at', '>=', $search1)
                ->where('status', '=', $search4)
                ->get();

            foreach ($bookings as $booking) {
                    $totalbooking++;
                    $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '>=', $search1)
                ->where('status', '=', $search4)
                ->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search2) && isset($search4)) {
            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))
                ->where('status', '=', $search4)
                ->get();

            foreach ($bookings as $booking) {
                    $totalbooking++;
                    $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))
                ->where('status', '=', $search4)
                ->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search)) {
            $bookings = Booking::where('code', 'LIKE', '%' . $search . '%')
                ->Orwhere('total', '=', $search)
                ->OrwhereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('code', 'LIKE', '%' . $search . '%')
                ->Orwhere('total', '=', $search)
                ->OrwhereHas('users', function ($query) use ($search) {
                    $query->where('last_name', 'LIKE', '%' . $search . '%')
                        ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search1)) {
            $bookings = Booking::where('created_at', '>=', $search1)->get();

                foreach ($bookings as $booking) {
                    $totalbooking++;
                    $totalmoney = $totalmoney + $booking->total;
                }

                $bookings = Booking::where('created_at', '>=', $search1)->orderBy('created_at', 'asc')->paginate(25);

                return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search2)) {

            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '>=', $search2)
                ->where('created_at', '<', date("Y-m-d", strtotime("$search2 +1 day")))
                ->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search4)) {
            $bookings = Booking::where('status', '=', $search4)->get();

            foreach ($bookings as $booking) {
                $totalbooking++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('status', '=', $search4)
                ->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings', 'totalmoney', 'totalbooking','date'));
        }

        if (isset($search3)) {
            $bookings = Booking::where('code', '=', $search3)->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings','date'));
        }
        return redirect('admins/bookings');

    }

    public function addService($booking_id, $room_id)
        {
            $bookroom = BookRoom::where('booking_id', $booking_id)->where('room_id', $room_id)->first();
            // dd($bookroom);
            $services = Service::all()->pluck('name', 'id');
            return view('admins.bookings.addService', compact('bookroom', 'services'));
        }

        public function saveService($booking_id, $room_id)
        {
            $bookroom = BookRoom::where('booking_id', $booking_id)->where('room_id', $room_id)->first();
            // dd($bookroom);
            $data = Input::all();
            $data['book_room_id'] = $bookroom->id;
            $bookroomservice = BookRoomService::create($data);
            return redirect('admins/bookings/detail/' . $bookroom->booking_id)->withSuccess('Service has been added');
        }

        public function deleteService($booking_id, $room_id, BookRoomService $service)
        {
            // dd($service);
            $service->delete();
            return redirect('admins/bookings/detail/' . $booking_id)->withSuccess('Service has been deleted');
        }

        public function adminCheckout($booking_id)
        {
            $booking = Booking::where('id', $booking_id)->first();
            // dd($booking);
            $bookroom = BookRoom::where('booking_id', $booking_id)->get();
            $from = new Carbon($booking->check_in);
            $to = new Carbon($booking->check_out);
            $now = Carbon::now();
            $diff1 = $from->diffInDays($to);
            $diff2 = $from->diffInDays($now);
            $paid = $booking->total;
            $roomTotal = 0;
            $serviceTotal = 0;
            $roomUsingPrice = 0;
            $totalPrice = 0;

            foreach ($bookroom as $br) {
                foreach ($br->services as $service) {
                    $serviceTotal += $service->price * $service->pivot->quantity;
                }
            }
            if ($booking->promotion_id) {
                $totalPrice = ($paid + $serviceTotal) * ((100 -($booking->promotions->discount))/100);
            } else {
                $totalPrice = $paid + $serviceTotal;
            }
            return view('admins.bookings.checkout1', compact('booking', 'bookroom', 'serviceTotal', 'diff1', 'totalPrice'));
        }


        public function adminCheckoutSingleRoom($booking_id, $room_id, BookRoomService $service)
        {
            $booking = Booking::where('id', $booking_id)->first();
            // dd($booking);
            $bookroom = BookRoom::where('booking_id', $booking_id)->where('room_id', $room_id)->first();
            $from = new Carbon($booking->check_in);
            $to = new Carbon($booking->check_out);
            $now = Carbon::now();
            $diff1 = $from->diffInDays($to);
            $diff2 = $from->diffInDays($now);
            $roomTotal = 0;
            $serviceTotal = 0;

            return view('admins.bookings.checkout', compact('booking', 'bookroom', 'roomTotal', 'serviceTotal', 'diff2'));
        }

        public function adminCheckoutConfirm($booking_id)
        {
            $booking = Booking::where('id', $booking_id)->first();
            // dd($booking);
            $bookroom = BookRoom::where('booking_id', $booking_id)->get();
            $paid = $booking->total;

            $serviceTotal = 0;
            $totalPrice = 0;
            $booking->update(['status' => 3]);
            foreach ($bookroom as $br) {
                foreach ($br->services as $service) {
                    $serviceTotal += $service->price * $service->pivot->quantity;
                }
            }

            if ($booking->promotion_id) {
                $totalPrice = ($paid + $serviceTotal) * ((100 -($booking->promotions->discount))/100);
            } else {
                $totalPrice = $paid + $serviceTotal;
            }
            $booking->total = $totalPrice;
            $booking->save();
            $d = 0;
            foreach ($booking->rooms as $room) {
                foreach ($room->bookings as $book) {
                    if ($book->status == 1 || $book->status == 0) {
                        $d ++;
                    }
                }
                if ($d == 0) {
                    $room->status = 2;
                    $room->save();
                }
            }
            // dd($totalPrice);
            // return redirect('admins/bookings/detail/'.$booking->id.'/checkout');
            return redirect('admins/bookings')->withSuccess('Room has been delete');
        }
    }
