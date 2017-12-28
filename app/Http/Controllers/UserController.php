<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CheckUserEditRequest;
use Illuminate\Pagination\Paginator;
use Auth;
use App\Booking;

class UserController extends Controller
{
    public function listAllUser()
    {

        $users= User::all();
        return view('admins.userManagement.listAllUsers',compact('users'));

    }

    public function editUser(User $user)
    {

        return view('admins.userManagement.editProfile',compact('user'));
    }

    public function saveUser(UserRequest $request)
    {
        $inputs = $request->all();
        $user = User::create($inputs);
        return redirect('admins/users')->withSuccess('Success');
    }

    public function updateUser(User $user,CheckUserEditRequest $request)
    {

        $inputs = $request->all();
        $user->update($inputs);
        return redirect('/admins/users')->withSuccess('Update user success');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect('admins/users')->withSuccess('User has been delete');
    }

    public function searchUser()
   {
         $search = Input::get('search');

         $users = User::where('first_name', 'LIKE', '%'. $search.'%')
         ->Orwhere('last_name', 'LIKE', '%'. $search.'%')
         ->Orwhere('email','LIKE','%'.$search.'%')
         ->Orwhere('role','=', $search)
         ->Orwhere('phone_number','LIKE','%'.$search.'%')
         ->Orwhere('address','LIKE','%'.$search.'%')
         ;

          return view('admins.rooms.searchUser',compact('rooms'));
   }

   public function userShow()
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('hotel.users.detail',compact('user'));
        }
        else
            return redirect('/index');
    }

    public function userListBooking()
    {
        if (Auth::check()){
            $user = Auth::user();
            $bookings = Booking::where('user_id', '=', $user->id)->paginate(10);
            return view('hotel.users.bookings',compact('bookings'));
        }
        else
            return redirect('/index');
    }
}
