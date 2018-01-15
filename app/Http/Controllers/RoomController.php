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
use Carbon\Carbon;

class RoomController extends Controller
{
    //index
    public function allRoomType(RoomType $id)
    {
        $roomType = $id->id;
        $rooms = Room::Where('room_type_id', '=', $roomType )->get();
        return view('hotel.seachRoom.seachRoomType', compact('rooms'));
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


            $rooms = Room::where('status', '=', 2)
                ->whereHas('roomTypes', function ($query) use ($roomType) {
                    $query->where('name', '=', $roomType);
                })
                ->whereHas('roomSizes', function ($query) use ($size) {
                    $query->where('size', '=', $size);
                })
                ->Orwhere('status', '=', 1)
                ->whereHas('roomTypes', function ($query) use ($roomType) {
                    $query->where('name', '=', $roomType);
                })
                ->whereHas('roomSizes', function ($query) use ($size) {
                    $query->where('size', '=', $size);
                })
                ->whereDoesntHave('bookings', function ($query) use ($from) {
                    $query->where('status', 0)->where('check_in', '<=', $from)->where('check_out', '>=', $from)
                            ->Orwhere('status', 1)->where('check_in', '<=', $from)->where('check_out', '>=', $from);
                })
                ->whereDoesntHave('bookings', function ($query) use ($to) {
                    $query->where('status', 0)->where('check_in', '<=', $to)->where('check_out', '>=', $to)
                            ->Orwhere('status', 1)->where('check_in', '<=', $to)->where('check_out', '>=', $to);
                })
                ->whereDoesntHave('bookings', function ($query) use ($from, $to) {
                    $query->where('status', 0)->where('check_in', '>=', $from)->where('check_out', '<=', $to)
                            ->Orwhere('status', 1)->where('check_in', '>=', $from)->where('check_out', '<=', $to);
                })
                ->paginate(4);



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
        $data = Input::except('image1','image2','image3');
        $room = Room::create($data);
        $files= [];
        $filenames = [];
        if($request->file('image1'))   $files[] = $request->file('image1');
        if($request->file('image2'))   $files[] = $request->file('image2');
        if($request->file('image3'))   $files[] = $request->file('image3');
        $time =time();

        foreach($files as $file)
           {
             $rand1 = rand(1,99999);
             $rand2 = rand(1,99999);
             $rand3 = rand(1,99999);

             if(!empty($file))
             {
               $filename =  $time. "." . $rand1. "." . $rand2. "." . $rand3 . '.' . $file->getClientOriginalExtension();
               $file->move('images/rooms/', $filename);
               $filenames[] = $filename;
           }
          }

             $room->image1 = $filenames[0];
             $room->save();


           if ($request->hasFile('images2') ) {
             $room->image2 = $filenames[1];
             $room->save();
           }
           
           if ($request->hasFile('images3') ) {
             $room->image3 = $filenames[2];
             $room->save();
           }

        return redirect('admins/rooms')->withSuccess('Room has been created');
    }

    public function updateRoom(Room $room, CheckRoomEditRequest $request)
    {
        $data = Input::except('image1','image2','image3');
        $room->update($data);
        $files= [];
        $filenames = [];
        if($request->file('image1'))   $files[] = $request->file('image1');
        if($request->file('image2'))   $files[] = $request->file('image2');
        if($request->file('image3'))   $files[] = $request->file('image3');

        $time =time();

        foreach($files as $file)
           {
             $rand1 = rand(1,99999);
             $rand2 = rand(1,99999);
             $rand3 = rand(1,99999);

             if(!empty($file))
             {
               $filename =  $time. "." . $rand1. "." . $rand2. "." . $rand3 . '.' . $file->getClientOriginalExtension();
               $file->move('images/rooms/', $filename);
               $filenames[] = $filename;
           }
          }
          if ($request->hasFile('images1') ) {
             $room->image1 = $filenames[0];
             $room->save();
           }

           if ($request->hasFile('images2') ) {
             $room->image2 = $filenames[1];
             $room->save();
           }
           if ($request->hasFile('images3') ) {
             $room->image3 = $filenames[2];
             $room->save();
           }

        // $room->update($data);
        return redirect('/admins/rooms/')->withSuccess('Update room success');
    }

    public function deleteRoom(Room $room)
    {
        $room->delete();
        return redirect('admins/rooms')->withSuccess('Room has been delete');
    }

    public function roomDetail(Room $room)
    {
              $calendars =BookRoom::where('room_id',$room->id)
              ->whereHas('bookings', function ($query) {
                  $query->where('status', '=', '1');
              })->get();
              return view('admins.rooms.roomDetail', compact('room','calendars'));
    }

    public function searchRoom(Request $search)
    {
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
