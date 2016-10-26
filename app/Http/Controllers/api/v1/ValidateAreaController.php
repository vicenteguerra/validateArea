<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Polygon;
use App\Point;
use Auth;
use Uuid;
use View;

class ValidateAreaController extends Controller
{

  public function polygon($id){
    $latitude = Input::get("latitude");
    $longitude = Input::get("longitude");

    if(!$latitude || !$longitude){
      $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'response' => "/",
        'msg' => "Invalid Location"
        ];
      return response(json_encode($json), 200)->header('Content-Type', 'application/json');
    }
    $polygon = Polygon::find($id);
    if (ValidateAreaController::isValid($polygonua, $latitude, $longitude)){
      $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'response' => "/",
        'valid' => true,
        'msg' => "Location is inside the polygon"
        ];
      return response(json_encode($json), 200)->header('Content-Type', 'application/json');
    }else{
      $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'response' => "/",
        'valid' => false,
        'msg' => "Location is not inside the polygon"
        ];
      return response(json_encode($json), 200)->header('Content-Type', 'application/json');
    }
  }
  public function user($id){
    $latitude = Input::get("latitude");
    $longitude = Input::get("longitude");

    if(!$latitude || !$longitude){
      $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'response' => "/",
        'msg' => "Invalid Location"
        ];
      return response(json_encode($json), 200)->header('Content-Type', 'application/json');
    }
    $polygons = User::find($id)->polygons();
    $valids = array_map(function ($polygon) { return ValidateAreaController::isValid($polygon, $latitude, $longitude); } , $polygons);
    if (array_sum($valids)){
      $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'response' => "/",
        'valid' => true,
        'msg' => "Location is inside the polygon"
        ];
      return response(json_encode($json), 200)->header('Content-Type', 'application/json');
    }else{
      $json = (object) [
        'status' => 200,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'response' => "/",
        'valid' => false,
        'msg' => "Location is not inside the polygon"
        ];
      return response(json_encode($json), 200)->header('Content-Type', 'application/json');
    }
  }
  public static function isValid($polygon, $latitude, $longitude){
    $points = $polygon->points()->get();
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
