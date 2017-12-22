<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Room;
use App\RoomType;
use App\Booking;
use App\BookRoom;

class RoomController extends Controller
{
    public function allRoomType($id)
    {
        $roomTypes = RoomType::Where('name', '=', $id)->get();
        return view('hotel.seachRoom.seachRoomType', compact('roomTypes'));
    }

    public function detailRoom($id)
    {
        $room = Room::find($id);
        return view('hotel.seachRoom.detailRoom', compact('room'));
    }

    public function seachRoom(Request $request)
    {
        $data = Input::all();
        $arrival = $data['arrival'];
        $from = date("Y-m-d", strtotime($arrival));
        $departure = $data['departure'];
        $to = date("Y-m-d", strtotime($departure));
        $amount_people = $data['amount_people'];
        $roomType = $data['roomType'];

        $request->session()->put('arrival', $arrival);
        $request->session()->put('departure', $departure);
        $request->session()->put('amount_people', $amount_people);
        $request->session()->put('roomType', $roomType);


        $rooms = Room::where('status', '=', 0)
            ->where('amount_people', '=', $amount_people)
            ->whereHas('roomTypes', function ($query) use ($roomType) {
                $query->where('name', '=', $roomType);
            })
            ->whereDoesntHave('bookings', function ($query) use ($from) {
                $query->where('check_in', '<=', $from)->where('check_out', '>=', $from);
            })
            ->whereDoesntHave('bookings', function ($query) use ($to) {
                $query->where('check_in', '<=', $to)->where('check_out', '>=', $to);
            })
            ->whereDoesntHave('bookings', function ($query) use ($from, $to) {
                $query->where('check_in', '>=', $from)->where('check_out', '<=', $to);
            })
            ->get();
        if (count($rooms) == 0) {
            return view('hotel.seachRoom.messageSeachRoom');
        } else {
            return view('hotel.seachroom.detaiallroomseach', compact('rooms'));
        }

    }
}
