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

class UserController extends Controller
{
  public function points($id){
    $polygons = User::find($id)->polygons()->get()->toArray();

    $polygonFormat = function($polygon){
      $points = Polygon::find($polygon["id"])->points()->get();
      $beauty = function ($point){
        unset($point["id"]);
        unset($point["polygon_id"]);
        unset($point["created_at"]);
        unset($point["updated_at"]);
        return $point;
      };
      $polygon["points"] = array_map($beauty, $points->toArray());
      return $polygon;
    };

    $json = (object) [
      'status' => 200,
      'numberOfPolygons' => count($polygons),
      'msg' => "All Polygons Coordinates by User",
      'polygons' => array_map($polygonFormat, $polygons)
      ];
    return response(json_encode($json), 200)->header('Content-Type', 'application/json');
  }

}
