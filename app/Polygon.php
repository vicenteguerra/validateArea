<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;


class Polygon extends Model
{
  use Uuid32ModelTrait;
  public function user()
  {
      return $this->belongsTo('App\User','user_id','id');
  }
  public function points()
  {
      return $this->hasMany('App\Point','polygon_id','id');
  }
  protected $fillable = ['user_id', 'name'];
}
