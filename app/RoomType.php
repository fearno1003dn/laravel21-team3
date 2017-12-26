<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';
    protected $fillable = ['name', 'description'];

    public function rooms()
    {
        return $this->hasMany('App\Room', 'room_type_id', 'id');
    }
}
