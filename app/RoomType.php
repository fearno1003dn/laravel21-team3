<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
<<<<<<< HEAD
    protected $table = 'room_types';
    protected $fillable = ['name', 'description'];

    public function rooms()
    {
        return $this->hasMany('App\Room', 'room_type_id', 'id');
    }
=======
  protected $table = 'room_types';
  protected $fillable = ['name', 'description'];
  public $timestamps = false;

  public function rooms()
  {
    return $this->hasMany('App\Room',  'room_type_id', 'id');
  }
>>>>>>> 8f75c41602a7f2a5c25c48b1a5a4c5500d4b8210
}
