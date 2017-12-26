<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['user_id', 'check_in', 'check_out', 'status', 'code', 'total', 'promotion_id'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function bookRooms()
    {
        return $this->hasMany('App\BookRoom', 'booking_id');
    }

    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'book_rooms');
    }
}
