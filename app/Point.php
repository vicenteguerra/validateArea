<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
  public function polygon()
  {
      return $this->belongsTo('App\Polygon','polygon_id','id');
  }
  protected $fillable = ['latitude','longitude','polygon_id'];
}
