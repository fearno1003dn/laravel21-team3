<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\RoomType;
use App\Http\Requests\RoomTypeRequest;
use App\Http\Requests\CheckRoomTypeEditRequest;
use Illuminate\Pagination\Paginator;

class RoomTypeController extends Controller
{
  public function listAllRoomType()
  {

      $roomTypes = RoomType::all();
      return view('admins.roomTypes.listAllRoomType',compact('roomTypes'));

  }

  public function createRoomType(RoomType $roomType)
  {
      return view('admins.roomTypes.create',compact('roomType'));
  }

  public function editRoomType(RoomType $roomType)
  {
      return view('admins.roomTypes.edit',compact('roomType'));
  }

  public function saveRoomType(RoomTypeRequest $request)
  {
      $inputs = $request->all();
      $roomType = RoomType::create($inputs);
      return redirect('admins/roomTypes')->withSuccess('Success');
  }

  public function updateRoomType(RoomType $roomType,CheckRoomTypeEditRequest $request)
  {
      $inputs =  $request->all();
      $roomType->update($inputs);
      return redirect('/admins/roomTypes')->withSuccess('Update user success');
  }

  public function deleteRoomType(RoomType $roomType)
  {
      $roomType->delete();
      return redirect('admins/roomTypes')->withSuccess('User has been delete');
  }
}
