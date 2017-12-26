<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
use App\Http\Requests\RoomTypeRequest;
use Illuminate\Pagination\Paginator;

class RoomTypeController extends Controller
{
  public function listAllRoomType()
  {

      $roomTypes = RoomType::paginate(1);
      return view('admins.roomTypes.listAllRoomType',compact('roomTypes'));

  }

  public function createRoomType()
  {
      return view('admins.roomTypes.create');
  }

  public function editRoomType()
  {
      return view('admins.roomTypes.edit');
  }
}
