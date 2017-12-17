<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\RoomType;
use App\Booking;
use App\BookRoom;

class RoomController extends Controller
{
    public function allRoomVip()
    {
        $rooms = Room::Where('room_type_id', '=', 1)->get();
        return view('hotel.seachRoomType', compact('rooms'));
    }
    public function allRoomDeluxe()
    {
        $rooms = Room::Where('room_type_id', '=', 2)->get();
        return view('hotel.seachRoomType', compact('rooms'));
    }
    public function allRoomFamily()
    {
        $rooms = Room::Where('room_type_id', '=', 3)->get();
        return view('hotel.seachRoomType', compact('rooms'));
    }

    public function detailRoom()
    {
        return view('hotel.layouts.detailRoom');
    }
}
