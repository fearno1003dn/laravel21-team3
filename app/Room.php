<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
<<<<<<< HEAD
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
=======
    protected $fillable = ['name', 'price', 'status', 'description', 'image1', 'image2', 'image3', 'room_type_id','room_size_id'];
    protected $table = 'rooms';
    
    public function room_types()
    {
      return $this->belongsTo('App\RoomType' , 'room_type_id');
    }
    public function room_sizes()
    {
      return $this->belongsTo('App\RoomSize' , 'room_size_id');
>>>>>>> 8f75c41602a7f2a5c25c48b1a5a4c5500d4b8210
    }
}
