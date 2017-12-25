<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function listAllUser()
    {

        $users= User::paginate(1);
        return view('admins.userManagement.listAllUsers',compact('users'));

    }



    public function editUser(User $user)
    {

        return view('admins.userManagement.editProfile',compact('user'));
    }

    public function saveUser()
    {
        $inputs = Input::all();
        $user = User::create($inputs);
        return redirect('admins/users')->withSuccess('Success');
    }

    public function updateUser(User $user)
    {
        $inputs = Input::all();
        $user->update($inputs);
        return redirect('/admins/users'.$user->id)->withSuccess('Update user success');
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

}
