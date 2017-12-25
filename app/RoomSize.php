<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomSize extends Model
{
  protected $table = 'room_sizes';
  protected $fillable = ['name', 'size'];
  public $timestamps = false;

  public function rooms()
  {
    return $this->hasMany('App\Room',  'room_size_id', 'id');
  }
}
