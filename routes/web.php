<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Room;
use App\RoomType;
use App\Booking;
use App\BookRoom;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/index');
});

//admin
Route::get('/admins', function () {
    if(Auth::check() && Auth::user()->role == 1)
        return view('admins.layouts.index1');
    else
        return redirect('/index');  
});

//hotel
Route::get('/index', function () {
    $roomtypes = RoomType::all();
    return view('index', compact('roomtypes'));
});

Route::group(['prefix' => 'seachroom'], function () {
    Route::get('/roomType/{name}', ['as' => 'room.TypeVip', 'uses' => 'RoomController@allRoomType']);
    Route::get('/detailRoom/{id}', ['as' => 'room.detailRoom', 'uses' => 'RoomController@detailRoom']);
    Route::get('/seach', ['as' => 'room.seach', 'uses' => 'RoomController@seachRoom']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

