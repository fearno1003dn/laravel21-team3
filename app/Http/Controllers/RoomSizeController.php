<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\RoomSize;
use App\Http\Requests\RoomSizeRequest;
use App\Http\Requests\CheckRoomSizeEditRequest;
use Illuminate\Pagination\Paginator;

class RoomSizeController extends Controller
{
  public function listAllRoomSize()
  {

      $roomSizes = RoomSize::all();
      return view('admins.roomSizes.listAllRoomSize',compact('roomSizes'));

  }

  public function createRoomSize(RoomSize $roomSize)
  {
      return view('admins.roomSizes.create',compact('roomSize'));
  }

  public function editRoomSize(RoomSize $roomSize)
  {
      return view('admins.roomSizes.edit',compact('roomSize'));
  }

  public function saveRoomSize(RoomSizeRequest $request)
  {
      $inputs = $request->all();
      $roomSize = RoomSize::create($inputs);
      return redirect('admins/roomSizes')->withSuccess('Success');
  }

  public function updateRoomSize(RoomSize $roomSize,CheckRoomSizeEditRequest $request)
  {
      $inputs =  $request->all();
      $roomSize->update($inputs);
      return redirect('/admins/roomSizes');
  }

  public function deleteRoomSize(RoomSize $roomSize)
  {
      $roomSize->delete();
      return redirect('admins/roomSizes');
  }

  public function searchRoomSize(Request $search)
  {

      // $search = \Request::get('search');
      $search = Input::get('search');

      $roomSizes = RoomSize::where('name', 'LIKE', '%' . $search . '%')
          ->Orwhere('size', '=',  $search )
          ->paginate(1);


      return view('admins.roomSizes.listAllSearchRoomSize', compact('roomSizes'));
  }
}
