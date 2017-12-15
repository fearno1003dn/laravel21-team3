<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'price', 'status', 'description', 'amount_people', 'image1', 'image2', 'image3', 'room_type_id'];
    protected $table = 'rooms';
}
