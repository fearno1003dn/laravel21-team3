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

  public function createRoomType()
  {
      return view('admins.roomTypes.create');
  }

  public function editRoomType(RoomType $roomTypes)
  {
      return view('admins.roomTypes.edit',compact('roomTypes'));
  }

  public function saveRoomType(RoomTypeRequest $request)
  {
      $inputs = $request->all();
      $roomTypes = RoomType::create($inputs);
      return redirect('admins/roomTypes')->withSuccess('Success');
  }

  public function updateRoomType(RoomType $roomTypes,RoomTypeRequest $request)
  {
      $inputs =  $request->all();
      $roomTypes->update($inputs);
      return redirect('/admins/roomTypes')->withSuccess('Update user success');
  }

  public function deleteRoomType(RoomType $roomTypes)
  {
      $roomTypes->delete();
      return redirect('admins/roomTypes')->withSuccess('User has been delete');
  }
}
