<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model
{
    protected $table = 'book_rooms';
    protected $fillable = ['room_id', 'booking_id'];

    public function bookings()
    {
        return $this->belongsto('App\Booking', 'booking_id');
    }

    public function rooms()
    {
        return $this->belongsTo('App\Room', 'room_id');
    }



    public function services()
    {
      return $this->belongsToMany('App\Service','book_room_services', 'book_room_id', 'service_id','id','id')->withPivot('quantity','id');
    }


    public function bookRoomServices()
    {
        return $this->hasMany('App\BookRoomService', 'book_room_id','id');
    }


}
