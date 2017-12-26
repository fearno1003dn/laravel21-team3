<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'price', 'status', 'description', 'amount_people', 'image1', 'image2', 'image3', 'room_type_id', 'room_size_id'];
    protected $table = 'rooms';


    public function roomTypes()
    {
        return $this->belongsTo('App\RoomType', 'room_type_id');
    }

    public function bookRoom()
    {
        return $this->hasMany('App\BookRoom', 'room_id');
    }

    public function bookings()
    {
        return $this->belongsToMany('App\Booking', 'book_rooms');
    }

    public function roomSizes()
    {
        return $this->belongsTo('App\RoomSize', 'room_size_id');
    }
}
