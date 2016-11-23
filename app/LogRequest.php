<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogRequest extends Model
{
  protected $table = 'requests';

  public function user()
  {
      return $this->belongsTo('App\User','user_id','id');
  }
  public function polygon()
  {
      return $this->belongsTo('App\User','polygon_id','id');
  }
  protected $fillable = ['user_id', 'polygon_id', 'valid', 'latitude', 'longitude'];
}
