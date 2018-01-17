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
use PDF;

class AdminBookingController extends Controller
{
  public function detailBooking($booking_id)
  {
      $bookroom = BookRoom::where('booking_id', $booking_id)->get();
      $booking = Booking::where('id', $booking_id)->first();
      $from = new Carbon($booking->check_in);
      $to = new Carbon($booking->check_out);
      $now = Carbon::now();
      $diff1 = $from->diffInDays($to);
      $diff2 = $from->diffInDays($now);
      return view('admins.bookings.detail1', compact('booking', 'diff1', 'diff2', 'now', 'bookroom'));
  }

  public function addService($booking_id, $room_id)
      {
          $bookroom = BookRoom::where('booking_id', $booking_id)->where('room_id', $room_id)->first();
          $services = Service::all()->pluck('name', 'id');
          return view('admins.bookings.addService', compact('bookroom', 'services'));
      }

      public function saveService($booking_id, $room_id)
      {
          $bookroom = BookRoom::where('booking_id', $booking_id)->where('room_id', $room_id)->first();
          $data = Input::all();
          $data['book_room_id'] = $bookroom->id;
          $bookroomservice = BookRoomService::create($data);
          return redirect('admins/bookings/detail/' . $bookroom->booking_id)->withSuccess('Service has been added');
      }

      public function deleteService($booking_id, $room_id, BookRoomService $service)
      {
          $service->delete();
          return redirect('admins/bookings/detail/' . $booking_id)->withSuccess('Service has been deleted');
      }

      public function adminCheckout($booking_id)
      {
          $booking = Booking::where('id', $booking_id)->first();
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
          return redirect('admins/bookings');
      }

      public function exportPDF($booking_id)
      {
        $booking = Booking::where('id', $booking_id)->first();
        $bookroom = BookRoom::where('booking_id', $booking_id)->get();
        $from = new Carbon($booking->check_in);
        $to = new Carbon($booking->check_out);
        $now = Carbon::now();
        $diff1 = $from->diffInDays($to);
        $paid = $booking->total;
        $serviceTotal = 0;
        $totalPrice = $paid;
        foreach ($bookroom as $br) {
            foreach ($br->services as $service) {
                $serviceTotal += $service->price * $service->pivot->quantity;
            }
        }
        $pdf = PDF::loadView('admins.pdf.invoice', compact('booking', 'bookroom', 'serviceTotal', 'diff1', 'totalPrice','now'));
        $filename = "$booking->code". '_invoiceDetail.pdf';
        return $pdf ->stream("$filename");
      }
}
