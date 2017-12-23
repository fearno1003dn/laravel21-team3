<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'price', 'status', 'description', 'image1', 'image2', 'image3', 'room_type_id','room_size_id'];
    protected $table = 'rooms';
    
    public function room_types()
    {
      return $this->belongsTo('App\RoomType' , 'room_type_id');
    }
    public function room_sizes()
    {
      return $this->belongsTo('App\RoomSize' , 'room_size_id');
    }
}
