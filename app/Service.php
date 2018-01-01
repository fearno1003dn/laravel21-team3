<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'services';
  protected $fillable = ['name','price', 'description'];
  public $timestamps = false;


  public function bookrooms()
  {
      return $this->belongsToMany('App\BookRoom','book_room_services', 'book_room_id', 'service_id','id')->withPivot('quantity','id');
  }

    public function bookRoomServices()
  {
      return $this->hasMany('App\BookRoomService', 'service_id','id');
  }

}
