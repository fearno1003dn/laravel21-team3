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
use DateTime;

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
         ->paginate(1);

          return view('admins.userManagement.listAllSearchUser',compact('users'));
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

    public function listBooking(User $user)
    {
            $date = new DateTime();
            $date = date("Y-m-d");
            $bookings = Booking::where('user_id', '=', $user->id)->orderBy('created_at', 'dec')->paginate(10);
            return view('admins.bookings.listAllBooking',compact('bookings', 'date'));
    }

    public function userListBooking()
    {
        if (Auth::check()){
            $date = new DateTime();
            $date = date("Y-m-d");
            $user = Auth::user();
            $bookings = Booking::where('user_id', '=', $user->id)->orderBy('created_at', 'dec')->paginate(10);
            foreach ($bookings as $booking) {
              //dd($booking->check_in);
            }
            return view('hotel.users.bookings',compact('bookings', 'date'));
        }
        else
            return redirect('/index');
    }

    public function userCancelBooking(Booking $booking)
    {
      if (Auth::check()){
        $user = Auth::user();
        $admin = User::where('role', '=', 1)->first();
        $booking->update(['status' => 2]);
        $user->deposit = $user->deposit + $booking->total * 0.8;
        $user->save();
        $admin->deposit = $admin->deposit - $booking->total * 0.8;
        $admin->save();
        $booking->total = $booking->total * 0.2;
        $booking->save();
        return redirect('/user/bookings');
        }
      else
        return redirect('/index');
    }

    public function userSearchBooking()
    {
      if (Auth::check()){
        $search1 = Input::get('search1');
        $search2 = Input::get('search2');
        $user = Auth::user();

        if (isset($search1) && isset($search2) ) {
          $bookings = Booking::where('user_id', '=', $user->id)->whereBetween('created_at', array($search1, $search2))->orderBy('created_at', 'asc')->paginate(25);

          return view('hotel.users.bookings',compact('bookings'));
        }

        if (isset($search1)) {
          $bookings = Booking::where('user_id', '=', $user->id)->where('created_at', '>=', $search1)->orderBy('created_at', 'asc')->paginate(25);

          return view('hotel.users.bookings',compact('bookings'));
        }

        if (isset($search2)) {
          $bookings = Booking::where('user_id', '=', $user->id)->where('created_at', '=', $search2)->orderBy('created_at', 'asc')->paginate(25);

          return view('hotel.users.bookings',compact('bookings'));
        }

        return redirect('/user/bookings');
      }
      else
          return redirect('/index');
    }
}
