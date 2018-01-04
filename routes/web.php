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
    if (Auth::check() && Auth::user()->role == 1)
        return view('admins.layouts.index1');
    else
        return redirect('/index');
});



Route::get('/user/index','userController@userShow');
Route::get('/user/bookings','userController@userListBooking');
Route::get('/user/bookings/cancel/{booking}','userController@userCancelBooking');
Route::get('/user/bookings/search','userController@userSearchBooking');


Route::get('admins/rooms/search','RoomController@searchRoom'); //chuyen cai ni xuong duoi cung thi deo chay gg
Route::get('admins/rooms', 'RoomController@listAllRoom');
Route::get('admins/rooms/create', 'RoomController@createRoom');
Route::get('admins/rooms/{room}/edit', 'RoomController@editRoom');
Route::get('admins/rooms/{room}/delete', 'RoomController@deleteRoom');
Route::get('admins/rooms/{room}', 'RoomController@roomDetail');
Route::post('admins/rooms', 'RoomController@saveRoom');
Route::put('admins/rooms/{room}', 'RoomController@updateRoom');



Route::get('admins/roomTypes/search','RoomTypeController@searchRoomType');
Route::get('admins/roomTypes', 'RoomTypeController@listAllRoomType');
Route::get('admins/roomTypes/create', 'RoomTypeController@createRoomType');
Route::get('admins/roomTypes/{roomTypes}/edit', 'RoomTypeController@editRoomType');
Route::post('admins/roomTypes', 'RoomTypeController@saveRoomType');
Route::get('admins/roomTypes/{roomType}/delete', 'RoomTypeController@deleteRoomType');
Route::put('admins/roomTypes/{roomType}', 'RoomTypeController@updateRoomType');

Route::get('admins/services/search','ServiceController@searchService');
Route::get('admins/services', 'ServiceController@listAllService');
Route::get('admins/services/create', 'ServiceController@createService');
Route::get('admins/services/{service}/edit', 'ServiceController@editService');
Route::post('admins/services', 'ServiceController@saveService');
Route::get('admins/services/{service}/delete', 'ServiceController@deleteService');
Route::put('admins/services/{service}', 'ServiceController@updateService');



Route::get('admins/users/search','UserController@searchUser');
Route::get('admins/users', 'userController@listAllUser');
Route::get('admins/users/{user}/edit', 'userController@editUser');
Route::post('admins/users', 'userController@saveUser');
Route::get('admins/users/{user}/delete', 'userController@deleteUser');
Route::put('admins/users/{user}/update', 'userController@updateUser');


Route::get('admins/bookings','BookingController@listAllBooking');
Route::get('admins/bookings/edit/{booking}','BookingController@editBooking');
Route::get('admins/bookings/detail/{booking}', 'BookingController@detailBooking');
Route::put('admins/bookings/update/{booking}', 'BookingController@updateBooking');
Route::get('admins/bookings/cancel/{booking}', 'BookingController@cancelBooking');
Route::get('admins/bookings/search','BookingController@searchBooking');
Route::get('admins/bookings/detail/{booking}/{room_id}/addservice','BookingController@addService');
Route::post('admins/bookings/detail/{booking}/{room_id}','BookingController@saveService');
Route::get('admins/bookings/detail/{booking}/{room_id}/{service}/delete','BookingController@deleteService');
Route::get('admins/bookings/detail/{booking}/checkout','BookingController@adminCheckout');

Route::get('admins/bookings/detail/{booking}/{room_id}/checkout','BookingController@adminCheckoutSingleRoom');
Route::get('admins/bookings/detail/{booking}/checkout/confirm','BookingController@adminCheckoutConfirm');
Route::get('admins/bookings/detail/{booking}/{room_id}/roomDetail','BookingController@roomDetail');






//hotel
Route::get('/index', function () {
    return view('index');
});

Route::group(['prefix' => 'seachroom'], function () {
    Route::get('/roomType/{name}', ['as' => 'room.TypeVip', 'uses' => 'RoomController@allRoomType']);
    Route::get('/detailRoom/{id}', ['as' => 'room.detailRoom', 'uses' => 'RoomController@detailRoom']);
    Route::get('/seach', ['as' => 'room.seach', 'uses' => 'RoomController@seachRoomIndex']);
});
Route::group(['prefix' => 'bookings'], function (){
    Route::get('/add/{id}',['as'=>'bookings.add', 'uses' => 'BookingController@add']);
    Route::get('/checkout',['as'=>'bookings.checkout', 'uses' =>  'BookingController@checkout']);
    Route::get('/checkout/{rowId}/delete',['as'=>'bookings.delete', 'uses' =>  'BookingController@delete']);
    Route::get('/create', ['as'=>'booking.create', 'uses' => 'BookingController@createBooking']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
