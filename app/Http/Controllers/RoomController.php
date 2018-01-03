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
use App\Http\Requests\CheckRoomEditRequest;
use Illuminate\Pagination\Paginator;

class RoomController extends Controller
{
    //index
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

    public function seachRoomIndex(CheckFindRoomRequest $request)
    {
        $data = Input::all();
        $arrival = $data['arrival'];
        $from = date("Y-m-d", strtotime($arrival));
        $departure = $data['departure'];
        $to = date("Y-m-d", strtotime($departure));
        $size = $data['size'];
        $roomType = $data['roomType'];

        $request->session()->put('arrival', $arrival);
        $request->session()->put('departure', $departure);
        $request->session()->put('size', $size);
        $request->session()->put('roomType', $roomType);


        $rooms = Room::where('status', '=', 0)
            ->whereHas('roomSizes', function ($query) use ($size) {
                $query->where('size', '=', $size);
            })
            ->whereHas('roomTypes', function ($query) use ($roomType) {
                $query->where('name', '=', $roomType);
            })
            ->whereDoesntHave('bookings', function ($query){
                $query->where('status', '=', 1);
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

    //admin
    public function index()
    {

        return view('admins.layouts.index1');

    }

    public function listAllRoom()
    {

        $rooms = Room::paginate(25);
        return view('admins.rooms.listAllRoom', compact('rooms'));

    }

    public function createRoom(Room $room)
    {
        $roomTypes = RoomType::all()->pluck('name', 'id');
        $roomSizes = RoomSize::all()->pluck('name', 'id');
        return view('admins.rooms.create', compact('room','roomTypes', 'roomSizes'));
    }

    public function editRoom(Room $room)
    {
        $roomTypes = RoomType::all()->pluck('name', 'id');
        $roomSizes = RoomSize::all()->pluck('name', 'id');
        return view('admins.rooms.edit', compact('roomTypes', 'roomSizes', 'room'));
    }

    public function saveRoom(roomRequest $request)
    {
        $data = Input::except('image1', 'image2', 'image3');
        $file1 = $request->file('image1');
        $filename1 = $file1->getClientOriginalExtension();
        $request->file = $filename1;
        $image1 = time() . "." . $filename1;
        $destinationPath1 = public_path('/images/rooms');
        $file1->move($destinationPath1, $image1);
        $data['image1'] = $image1;
        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $filename2 = $file2->getClientOriginalExtension();
            $request->file = $filename2;
            $image2 = time() . "." . $filename2;
            $destinationPath2 = public_path('/images/rooms');
            $file2->move($destinationPath2, $image2);
            $data['image2'] = $image2;
        }

        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $filename3 = $file3->getClientOriginalExtension();
            $request->file = $filename3;
            $image3 = time() . "." . $filename3;
            $destinationPath3 = public_path('/images/rooms');
            $file3->move($destinationPath3, $image3);
            $data['image3'] = $image3;
        }

        $room = Room::create($data);
        return redirect('admins/rooms')->withSuccess('Room has been created');
    }

    public function updateRoom(Room $room, CheckRoomEditRequest $request)
    {
        $data = Input::all();

        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $filename1 = $file1->getClientOriginalExtension();
            $request->file = $filename1;
            $image1 = time() . "." . $filename1;
            $destinationPath1 = public_path('/images/rooms');
            $file1->move($destinationPath1, $image1);
            $data['image1'] = $image1;
        }
        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $filename2 = $file2->getClientOriginalExtension();
            $request->file = $filename2;
            $image2 = time() . "." . $filename2;
            $destinationPath2 = public_path('/images/rooms');
            $file2->move($destinationPath2, $image2);
            $data['image2'] = $image2;
        }

        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $filename3 = $file3->getClientOriginalExtension();
            $request->file = $filename3;
            $image3 = time() . "." . $filename3;
            $destinationPath3 = public_path('/images/rooms');
            $file3->move($destinationPath3, $image3);
            $data['image3'] = $image3;
        }

        $room->update($data);
        return redirect('/admins/rooms/')->withSuccess('Update room success');
    }

    public function deleteRoom(Room $room)
    {
        $room->delete();
        return redirect('admins/rooms')->withSuccess('Room has been delete');
    }

    public function roomDetail(Room $room)
    {

        return view('admins.rooms.roomDetail', compact('room'));
    }

    public function searchRoom(Request $search)
    {

        // $search = \Request::get('search');
        $search = Input::get('search');

        $rooms = Room::where('name', 'LIKE', '%' . $search . '%')
            ->Orwhere('price', '=', $search)
            ->Orwhere('status', 'LIKE', '%' . $search . '%')
            ->Orwhere('description', 'LIKE', '%' . $search . '%')
            ->OrwhereHas('roomTypes', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->OrwhereHas('roomSizes', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->paginate(1);


        return view('admins.rooms.listAllSearchRoom', compact('rooms'));
    }

}
