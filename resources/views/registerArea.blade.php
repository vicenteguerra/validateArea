@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Areas</div>

                <div class="panel-body">
                  <div style="height: 450px;" id="map">

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" />

@endsection

<script type="text/javascript">


function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
  center: {lat: 19.428377, lng: -99.148689},
  zoom: 14
  });

  var drawingManager = new google.maps.drawing.DrawingManager({
  drawingControl: true,
  drawingControlOptions: {
    position: google.maps.ControlPosition.TOP_CENTER,
    drawingModes: [
      google.maps.drawing.OverlayType.POLYGON
    ]
  },
  circleOptions: {
    fillColor: '#40FFDD',
    fillOpacity: 1,
    strokeWeight: 3,
    clickable: true,
    editable: true,
    zIndex: 1
  }
  });
  drawingManager.setMap(map);


 google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
   var array   = polygon.getPath().getArray();
  registerArea(array);
  polygon.setMap(map);
});



  infoWindow = new google.maps.InfoWindow;

  @foreach($polygons as $polygon)
    var p = new google.maps.Polygon({
        paths: {!! $polygon["points"] !!},
        strokeWeight: 0,
        fillColor: rgba(255,0,0),
        fillOpacity: 0.6,
        name: "{{ $polygon["name"] }}",
        id: "{{ $polygon["id"] }}"
    });
    p.setMap(map);
  @endforeach
}



function registerArea(coords){
  $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    $.ajax({
       type:'POST',
       url:'/polygon',
       data: {points: JSON.stringify(coords)},
       dataType: 'json',
       success:function(data){
         toastr.info(data.msg);
         console.log(data.msg);
       },
       error: function(error){
         console.log(error);
       }
    });
 }

</script>
