@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Areas</div>

                <div class="panel-body">
                  <div style="height: 450px;" id="map">

                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">Create</div>
              <div class="panel-body">
                <a type="button" href="/create" class="col-md-12 btn btn-primary ">Create New Area</a><br>
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">Information</div>
              <div class="panel-body">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon3">Name</span>
                  <input type="text" class="form-control" id="polygon-name" aria-describedby="basic-addon3">
                  <input type="hidden" class="form-control" id="polygon-id" aria-describedby="basic-addon3">
                </div><br>
                <button class="btn btn-success col-md-12" href="#" role="button">Save Name</button><br><br>
                <button class="btn btn-danger col-md-12" href="#" role="button">Delete Polygon</button><br>
              </div>
            </div>
            <div class="panel panel-warning">
              <div class="panel-heading">API Information</div>
              <div class="panel-body">
                <div class="well" >
                  <h4>POST Request</h4>
                  <pre><code id="post_url"></code></pre>
                </div>
                <div class="well">
                  <h4>GET Request</h4>
                  <pre><code id="get_url"></code></pre>
                </div>
              </div>
            </div>
          </div> <!-- End Panel Group -->
        </div>
    </div>
</div>


<script type="text/javascript">


var map;
var infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: {lat: 19.434381178461, lng: -99.1637134552},
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });


  var addListenersOnPolygon = function(polygon) {
    google.maps.event.addListener(polygon, 'click', function (event) {
      infoWindow.setContent(polygon.name);
      infoWindow.setPosition(event.latLng);
      infoWindow.open(map);
      $("#polygon-name").val(polygon.name);
      $("#polygon-id").val(polygon.id);
      $("#post_url").text(location.protocol + "//" + location.host + "/{{ Auth::id() }}/"+ polygon.id ) ;
      $("#get_url").text(location.protocol + "//" + location.host + "/{{ Auth::id() }}/"+ polygon.id ) ;
    });
  }

  @foreach($polygons as $polygon)
    var p = new google.maps.Polygon({
        paths: {!! $polygon["points"] !!},
        strokeWeight: 0,
        fillColor: '#FF0000',
        fillOpacity: 0.6,
        name: "{{ $polygon["name"] }}",
        id: "{{ $polygon["id"] }}"
    });
    p.setMap(map);
    addListenersOnPolygon(p);
  @endforeach

  infoWindow = new google.maps.InfoWindow;
}



</script>
@endsection
