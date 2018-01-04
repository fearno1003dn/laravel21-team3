<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Room;
use App\RoomType;
use App\Booking;
use App\BookRoom;
use App\RoomSize;
use App\BookRoomService;
use App\Http\Requests\CheckFindRoomRequest;
use App\Service;
use App\Http\Requests\RoomRequest;
use Illuminate\Pagination\Paginator;
use App\Promotion;
use Carbon\Carbon;


class BookingController extends Controller
{
    public function listAllBooking()
    {
		$bookings = Booking::orderBy('created_at', 'dec')->paginate(25);
        return view('admins.bookings.listAllBooking', compact('bookings'));
    }

    public function editBooking(Booking $booking)
    {
        $promotions = Promotion::all()->pluck('code', 'id');
        return view('admins.bookings.edit', compact('promotions', 'booking'));
    }

    public function updateBooking(Booking $booking)
    {
        $data = Input::all();
        $booking->update($data);
        return redirect('admins/bookings/detail/'.$booking->id)->withSuccess('Update booking success');
    }

    public function detailBooking($booking_id)
    {

        // dd($now); UTC+0????
        // $bookroom=BookRoom::where('booking_id', $booking_id)->get();
        $bookroom=BookRoom::where('booking_id',$booking_id)->get();
        $booking=Booking::where('id',$booking_id)->first();
        // dd($booking);
        $from = new Carbon($booking->check_in);
        $to = new Carbon($booking->check_out);
        $now = Carbon::now();
        $diff1 = $from->diffInDays($to);
        $diff2 = $from->diffInDays($now);
        // dd($bookroom);
        // dd($from,$to,$now,$diff1,$diff2);
        return view('admins.bookings.detail1', compact('booking','diff1','diff2','now','bookroom'));
    }

    public function deleteBooking(Booking $booking)
    {
        $booking->delete();
        return redirect('admins/bookings')->withSuccess('Room has been delete');
    }

    public function searchBooking()
    {
        $search = Input::get('search');
        $search1 = Input::get('search1');
        $search2 = Input::get('search2');
        $search3 = Input::get('search3');

        $totalbooking = 0;
        $totalmoney = 0;

        if (isset($search) && isset($search1) && isset($search2) ) {
            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                    ->whereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'asc')->paginate(25);

            foreach ($bookings as $booking){
                $totalbooking ++;
                $totalmoney = $totalmoney + $booking->total;
            }

            return view('admins.bookings.listAllBooking', compact('bookings','totalmoney', 'totalbooking'));
        }

        if (isset($search) && isset($search1)) {
            $bookings = Booking::where('created_at', '>=', $search1)
                    ->whereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'asc')->paginate(25);

            foreach ($bookings as $booking){
                $totalbooking ++;
                $totalmoney = $totalmoney + $booking->total;
            }

            return view('admins.bookings.listAllBooking', compact('bookings','totalmoney', 'totalbooking'));
        }

        if (isset($search) && isset($search2) ) {
            $bookings = Booking::where('created_at', '=', $search2)
                    ->whereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'asc')->paginate(25);

            foreach ($bookings as $booking){
                $totalbooking ++;
                $totalmoney = $totalmoney + $booking->total;
            }

            return view('admins.bookings.listAllBooking', compact('bookings','totalmoney', 'totalbooking'));
        }

        if (isset($search1) && isset($search2) ) {
            $bookings = Booking::whereBetween('created_at', array($search1, $search2))->orderBy('created_at', 'asc')->paginate(25);

            foreach ($bookings as $booking){
                $totalbooking ++;
                $totalmoney = $totalmoney + $booking->total;
            }

            return view('admins.bookings.listAllBooking', compact('bookings','totalmoney', 'totalbooking'));
        }

        if (isset($search)) {
            $bookings = Booking::where('code', 'LIKE', '%' . $search . '%')
                    ->Orwhere('total', '=', $search)
                    ->OrwhereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->get();

            foreach ($bookings as $booking){
                $totalbooking ++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('code', 'LIKE', '%' . $search . '%')
                    ->Orwhere('total', '=', $search)
                    ->OrwhereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings','totalmoney', 'totalbooking'));
        }

        if (isset($search1)) {
            $bookings = Booking::where('created_at', '>=', $search1)->get();

            foreach ($bookings as $booking){
                $totalbooking ++;
                $totalmoney = $totalmoney + $booking->total;
            }
            //dd($totalmoney);

            $bookings = Booking::where('created_at', '>=', $search1)->orderBy('created_at', 'asc')->paginate(25);
        
            return view('admins.bookings.listAllBooking', compact('bookings','totalmoney', 'totalbooking'));
        }

        if (isset($search2)) {
            $bookings = Booking::where('created_at', '=', $search2)->get();

           foreach ($bookings as $booking){
                $totalbooking ++;
                $totalmoney = $totalmoney + $booking->total;
            }

            $bookings = Booking::where('created_at', '=', $search2)->orderBy('created_at', 'asc')->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings','totalmoney', 'totalbooking'));
        }

        if (isset($search3)) {
            $bookings = Booking::where('code', '=', $search3)->paginate(25);

            return view('admins.bookings.listAllBooking', compact('bookings'));
        }

        return redirect('admins/bookings');

    }


    public function addService($booking_id, $room_id)
    {
       $bookroom=BookRoom::where('booking_id',$booking_id)->where('room_id',$room_id)->first();
       // dd($bookroom);
       $services=Service::all()->pluck('name','id');

       return view('admins.bookings.addService',compact('bookroom','services'));

    }
    public function saveService($booking_id, $room_id)
    {
       $bookroom=BookRoom::where('booking_id',$booking_id)->where('room_id',$room_id)->first();
       // dd($bookroom);
       $data=Input::all();
       $data['book_room_id']=$bookroom->id;
       $bookroomservice=BookRoomService::create($data);
       return redirect('admins/bookings/detail/'.$bookroom->booking_id)->withSuccess('Service has been added');
    }
    public function deleteService($booking_id, $room_id, BookRoomService $service)
    {
      // dd($service);
       $service->delete();
       return redirect('admins/bookings/detail/'.$booking_id)->withSuccess('Service has been deleted');
    }

    public function adminCheckout($booking_id)
    {
     $booking=Booking::where('id',$booking_id)->first();
     // dd($booking);
     $bookroom=BookRoom::where('booking_id',$booking_id)->get();
     $from = new Carbon($booking->check_in);
     $to = new Carbon($booking->check_out);
     $now = Carbon::now();
     $diff1 = $from->diffInDays($to);
     $diff2 = $from->diffInDays($now);
     $paid = $booking->total;
     $roomTotal = 0 ;
     $serviceTotal= 0 ;
     $roomUsingPrice = 0;
     $totalPrice = 0;

     foreach ($bookroom as $br) {
       $roomUsingPrice= $br->rooms->price * $diff2;
       $roomTotal = $roomTotal + ($br->rooms->price * $diff2);
       foreach ($br->services as $service) {
               $serviceTotal += $service->price * $service->pivot->quantity;
             }

           }

            if($booking->promotions->code) {
                       $totalPrice = ($roomTotal)*(100- $booking->promotions->discount)/100 + $serviceTotal - $paid   ;
                   }
             else {
                       $totalPrice = $roomTotal + $serviceTotal - $paid  ;
                   }

     return view('admins.bookings.checkout1',compact('booking','bookroom','roomTotal','serviceTotal','diff2','totalPrice','paid' ));
   }



   public function adminCheckoutSingleRoom($booking_id,$room_id, BookRoomService $service)
   {
    $booking=Booking::where('id',$booking_id)->first();
    // dd($booking);
    $bookroom=BookRoom::where('booking_id',$booking_id)->where('room_id',$room_id)->first();
    $from = new Carbon($booking->check_in);
    $to = new Carbon($booking->check_out);
    $now = Carbon::now();
    $diff1 = $from->diffInDays($to);
    $diff2 = $from->diffInDays($now);
    $roomTotal = 0 ;
    $serviceTotal= 0 ;

    return view('admins.bookings.checkout',compact('booking','bookroom','roomTotal','serviceTotal','diff2'));
  }

  public function adminCheckoutConfirm($booking_id)
  {
   $booking=Booking::where('id',$booking_id)->first();
   // dd($booking);
   $bookroom=BookRoom::where('booking_id',$booking_id)->get();
   $from = new Carbon($booking->check_in);
   $to = new Carbon($booking->check_out);
   $now = Carbon::now();
   $diff1 = $from->diffInDays($to);
   $diff2 = $from->diffInDays($now);
   $paid = $booking->total;
   $roomTotal = 0 ;
   $serviceTotal= 0 ;
   $roomUsingPrice = 0;
   $totalPrice = 0;
   $booking->update(['status' => 3]);

   foreach ($bookroom as $br) {
     $br->rooms->update(['status' => 1]);
     $roomUsingPrice= $br->rooms->price * $diff2;
     $roomTotal = $roomTotal + ($br->rooms->price * $diff2);
     foreach ($br->services as $service) {
             $serviceTotal += $service->price * $service->pivot->quantity;
           }

         }

          if($booking->promotions->code) {
                     $totalPrice = ($roomTotal)*(100- $booking->promotions->discount)/100 + $serviceTotal - $paid   ;
                 }
           else {
                     $totalPrice = $roomTotal + $serviceTotal - $paid  ;
                 }
    $booking->update(['total' => $totalPrice]);
    // dd($totalPrice);
    // return redirect('admins/bookings/detail/'.$booking->id.'/checkout');
    return redirect('admins/bookings')->withSuccess('Room has been delete');
  }
}
