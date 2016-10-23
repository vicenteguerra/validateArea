<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;


class Polygon extends Model
{
  use Uuid32ModelTrait;
  protected $fillable = ['user_id', 'name'];
}
