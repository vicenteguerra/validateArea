<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Polygon;
use App\Point;
use Auth;
use Uuid;
use View;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Polygons List
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $polygons = Polygon::where('user_id', Auth::id())->get();
      $polygons_array = Array();
      foreach ($polygons as $polygon) {
        $points = Point::where('polygon_id', $polygon->id)->get();
        $polygon_info["name"] = $polygon->name;
        $polygon_info["id"] = $polygon->id;
        $points_array = Array();
        foreach ($points as $point) {
          $point_info["lat"] = $point->latitude;
          $point_info["lng"] = $point->longitude;
          $points_array[] = $point_info;
        }
        $polygon_info["points"] = json_encode($points_array, JSON_NUMERIC_CHECK);
        $polygons_array[] = $polygon_info;
      }
      return View::make('home', array('polygons' => $polygons_array));
    }

    /**
     * Register New Area
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerArea');
    }

    public function test(){
      var_dump(Uuid::generate(4));die;
      $polygons = Polygon::where('user_id', Auth::id())->get();
      $polygons_array = Array();
      foreach ($polygons as $polygon) {
        $points = Point::where('polygon_id', $polygon->id)->get();
        $polygon_info["name"] = $polygon->name;
        $polygon_info["user_id"] = $polygon->id;
        $polygon_info["points"] = $points;
        $polygons_array[] = $polygon_info;
      }
      return json_encode($polygons_array);
    }
}
