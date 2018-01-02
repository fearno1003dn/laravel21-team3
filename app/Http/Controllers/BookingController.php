<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Booking;
use App\BookRoom;
use App\Room;
use App\RoomSize;


class BookingController extends Controller
{
    public function add(Request $request, $id)
    {
        $arrival = strtotime($request->session()->get('arrival'));
        $departure = strtotime($request->session()->get('departure'));
        $room = Room::find($id);
        $price = $room->price;
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

    public function checkout()
    {
        Cart::total();
        return view('hotel.bookings.checkout');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect('bookings/checkout');
    }
}
