@extends('layouts.app')

@section('content')

<div class="info-home col-md-8 col-md-offset-2 text-center">
  <h1>Valid Place</h1>
  <h2>Simple web service for verify if a location coordinates are inside of  polygons drawn in a Map.
    Very useful for allow and restrict services in Mobile Apps. </h2>
  <h3>(Verify if the coordinates are inside of the drawn polygon)</h3>
</div>

<div class="video-container">
  <iframe class="background-video"
  src="//player.vimeo.com/video/156188945?title=0&amp;byline=0&amp;portrait=0&amp;color=3a6774&amp;autoplay=1&amp;loop=1"
  frameborder="0" height="100%" width="100%" webkitallowfullscreen
  mozallowfullscreen allowfullscreen>
  </iframe>
</div>


<footer >
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-8">
        <a href="http://twitter.com/IngHucruz">@IngHucruz</a> | <a href="https://twitter.com/ok_atomic">@ok_atomic</a>
      </div>
      <div class="col-md-4 text-right">
        <a href="http://yamblet.com/">2016 Yamblet</a>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="col-md-8">
        <a href="https://vimeo.com/156188945">Maps (Landing page video)</a>
      </div>
      <div class="col-md-4 text-right">
        <a href="https://github.com/vicenteguerra/validateArea">Github</a>
      </div>
    </div>
  </div>
</footer>

@endsection
