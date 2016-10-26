<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Polygon;
use App\Point;
use App\User;

use Auth;
use Illuminate\Support\Facades\Input;
use Log;
use Uuid;

class PolygonController extends Controller
{
    /**
     * Register New Area
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      try{
        $coordinates_string = Input::get("points");
        $coordinates = json_decode($coordinates_string);

        $polygon = new Polygon(['name' => Uuid::generate()]);
        Auth::user()->polygons()->save($polygon);

        foreach ($coordinates as $coord) {
          $point = new Point(['longitude' => (string)$coord->lng,
                              'latitude' => (string)$coord->lat
                            ]);
          $polygon->points()->save($point);
        }

        $json = (object) [
          'status' => 200,
          'response' => "/polygon",
          'msg' => "Polygon Created"
          ];
        return response(json_encode($json), 200)->header('Content-Type', 'application/json');
      }catch(\Exception $e){
        $json = (object) [
          'status' => 200,
          'response' => "/polygon",
          'msg' => "Error " . $e->getMessage()
          ];
        return response(json_encode($json), 200)->header('Content-Type', 'application/json');
      }
    }

    public function delete(){
      try{
        $polygon_id = Input::get("polygon_id");
        $polygon = Polygon::find($polygon_id);
        $polygon->points()->delete();
        $polygon->delete();

        $json = (object) [
          'status' => 200,
          'response' => "/polygon/delete",
          'msg' => "Polygon Deleted"
          ];
        return response(json_encode($json), 200)->header('Content-Type', 'application/json');
      }catch(\Exeption $e){
        $json = (object) [
          'status' => 200,
          'response' => "/polygon/delete",
          'msg' => "Error " . $e->getMessage()
          ];
        return response(json_encode($json), 200)->header('Content-Type', 'application/json');
      }
    }

    public function update(){
      try{
        $polygon_id = Input::get("polygon_id");
        $name = Input::get("name");

        if(!$name){
          $json = (object) [
            'status' => 200,
            'response' => "/polygon/update",
            'msg' => "Please insert name"
            ];
        }

        $polygon = Polygon::find($polygon_id);
        $polygon->name = $name;
        $polygon->save();

        $json = (object) [
          'status' => 200,
          'response' => "/polygon/update",
          'msg' => "Polygon Updated"
          ];
        return response(json_encode($json), 200)->header('Content-Type', 'application/json');
      }catch(\Exeption $e){
        $json = (object) [
          'status' => 200,
          'response' => "/polygon/update",
          'msg' => "Error " . $e->getMessage()
          ];
        return response(json_encode($json), 200)->header('Content-Type', 'application/json');
      }
    }

}
