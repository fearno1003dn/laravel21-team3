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
}
