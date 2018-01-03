<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRoomService extends Model
{
  protected $table = 'book_room_services';
  protected $fillable = ['quantity','book_room_id','service_id'];
  public $timestamps = false;


}
