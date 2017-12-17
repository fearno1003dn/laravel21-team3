<?php

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
    return view('admins.layouts.index1');
});
//hotel
Route::get('/index', function () {
    return view('index');
});
Route::group(['prefix' => 'seachroom'], function () {
    Route::get('/roomTypeVip', ['as' => 'room.TypeVip', 'uses' => 'RoomController@allRoomVip']);
    Route::get('/roomTypeDeluxe', ['as' => 'room.TypeDeluxe', 'uses' => 'RoomController@allRoomDeluxe']);
    Route::get('/roomTypeFamily', ['as' => 'room.TypeFamily', 'uses' => 'RoomController@allRoomFamily']);
    Route::get('/detailRoom', ['as' => 'room.detailRoom', 'uses' => 'RoomController@detailRoom']);

});

