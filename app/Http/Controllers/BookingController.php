<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Room;
use App\RoomType;
use App\Booking;
use App\BookRoom;
use App\RoomSize;
use App\Http\Requests\CheckFindRoomRequest;
use App\Service;
use App\Http\Requests\RoomRequest;
use Illuminate\Pagination\Paginator;
use App\Promotion;


class BookingController extends Controller
{
    public function listAllBooking()
    {
		$bookings = Booking::paginate(25);
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

    public function detailBooking(Booking $booking)
    {
        return view('admins.bookings.detail', compact('booking'));
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
        $totals = 0;

        if (isset($search) && isset($search1) && isset($search2) ) {
            $bookings = Booking::whereBetween('created_at', array($search1, $search2))
                    ->whereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'asc')->paginate(25);

            foreach ($bookings as $booking){
                $totals = $totals + $booking->total;
            }
    
            return view('admins.bookings.listAllBooking', compact('bookings','totals'));
        }

        if (isset($search) && isset($search1)) {
            $bookings = Booking::where('created_at', '>=', $search1)
                    ->whereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'asc')->paginate(25);
            
            foreach ($bookings as $booking){
                $totals = $totals + $booking->total;
            }
    
            return view('admins.bookings.listAllBooking', compact('bookings','totals'));
        }

        if (isset($search) && isset($search2) ) {
            $bookings = Booking::where('created_at', '=', $search2)
                    ->whereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'asc')->paginate(25);
            
            foreach ($bookings as $booking){
                $totals = $totals + $booking->total;
            }
    
            return view('admins.bookings.listAllBooking', compact('bookings','totals'));
        }

        if (isset($search1) && isset($search2) ) {
            $bookings = Booking::whereBetween('created_at', array($search1, $search2))->orderBy('created_at', 'asc')->paginate(25);
            
            foreach ($bookings as $booking){
                $totals = $totals + $booking->total;
            }
    
            return view('admins.bookings.listAllBooking', compact('bookings','totals'));
        }        

        if (isset($search)) {
            $bookings = Booking::where('code', 'LIKE', '%' . $search . '%')
                    ->Orwhere('total', '=', $search)
                    ->OrwhereHas('users', function ($query) use ($search) {
                        $query->where('last_name', 'LIKE', '%' . $search . '%')
                              ->Orwhere('first_name', 'LIKE', '%' . $search . '%');
                    })->paginate(25);
            
            foreach ($bookings as $booking){
                $totals = $totals + $booking->total;
            }
    
            return view('admins.bookings.listAllBooking', compact('bookings','totals'));        
        } 

        if (isset($search1)) {
            $bookings = Booking::where('created_at', '>=', $search1)->orderBy('created_at', 'asc')->paginate(25); 
            
            foreach ($bookings as $booking){
                $totals = $totals + $booking->total;
            }
    
            return view('admins.bookings.listAllBooking', compact('bookings','totals'));
        } 

        if (isset($search2)) {
            $bookings = Booking::where('created_at', '=', $search2)->orderBy('created_at', 'asc')->paginate(25); 
           
           foreach ($bookings as $booking){
                $totals = $totals + $booking->total;
            }
    
            return view('admins.bookings.listAllBooking', compact('bookings','totals'));
        }

        return redirect('admins/bookings');
        
    }
}
