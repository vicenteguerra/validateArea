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
use App\LogRequest;

class ValidateAreaController extends Controller
{
  public function index($polygons_ids, $user_id){
    $latitude = Input::get("latitude");
    $longitude = Input::get("longitude");

    if(!$latitude || !$longitude){
      $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'msg' => "Invalid Location"
        ];
      return response(json_encode($json), 200)->header('Content-Type', 'application/json');
    }

     $valid_array = array_filter($polygons_ids, function($polygon_id) use($latitude, $longitude) {
        return ValidateAreaController::isValid($polygon_id, $latitude, $longitude);
      });

    $valid = count($valid_array)>0;

    $v = ($valid) ? 'is' : 'is not';
    $s = (count($polygons_ids)>1) ? 'any' : 'the';
    $msg = "Location " . $v . " inside " . $s . " polygon";

    $request = new LogRequest(
      ['latitude' => $latitude,
       'longitude' => $longitude,
       'valid' => $valid,
       'user_id' => $user_id,
       'polygon_id' => reset($polygons_ids)
       ]);
    $request->save();
    $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'valid' => $valid,
        'msg' => $msg,
        'polygons_ids' => $valid_array
        ];

    return response(json_encode($json), 200)->header('Content-Type', 'application/json');
  }

  public function polygon($id)
  {
    $user_id = Polygon::find($id)->user->id;
    return $this->index(array($id), $user_id);
  }

  public function user($id)
  {
    $polygons= User::find($id)->polygons()->get()->toArray();
    $polygons_ids = array_map(function ($polygon){ return $polygon['id'];}, $polygons);

    return $this->index($polygons_ids, $id);
  }

  public static function isValid($polygon_id, $latitude, $longitude){
    $points = Polygon::find($polygon_id)->points()->get();
    $vertices_x = array();
    $vertices_y = array();

    foreach ($points as $point ) {
      array_push($vertices_x, $point->latitude);
      array_push($vertices_y, $point->longitude);
    }

    $points_polygon = count($vertices_x) - 1;  // number vertices - zero-based array

    return ValidateAreaController::is_in_polygon($points_polygon, $vertices_x, $vertices_y, $latitude, $longitude);
  }

  public static function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $latitude, $longitude)
  {
    $i = $j = $c = 0;
    for ($i = 0, $j = $points_polygon ; $i < $points_polygon; $j = $i++) {
      if ( (($vertices_y[$i]  >  $longitude != ($vertices_y[$j] > $longitude)) &&
       ($latitude < ($vertices_x[$j] - $vertices_x[$i]) * ($longitude - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]) ) )
         $c = !$c;
    }
    return $c;
  }
}
