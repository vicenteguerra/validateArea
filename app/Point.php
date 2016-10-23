<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
  protected $fillable = ['latitude','longitude','polygon_id'];
}
