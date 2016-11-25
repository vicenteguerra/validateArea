<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Polygon;
use App\User;
use App\Point;
use Auth;
use Uuid;
use View;

class PolygonController extends Controller
{
  public function points($id){
    $points = Polygon::find($id)->points()->select(['latitude', 'longitude'])->get();

    $json = (object) [
      'status' => 200,
      'polygon_id' => $id,
      'msg' => "Points of polygon",
      'name' => Polygon::find($id)->name,
      'points' => $points->toArray()
      ];
    return response(json_encode($json), 200)->header('Content-Type', 'application/json');
  }

}
