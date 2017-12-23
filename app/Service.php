<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'services';
  protected $fillable = ['name','price', 'description'];
  public $timestamps = false;
}
