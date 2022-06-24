 
@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<div id="slider">
</div>

<p>
  <label for="amount">range:</label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>
 
<div id="slider-range"></div>



@endsection 
<link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <!-- <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->

 
<script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 101,
      values: [ 50, 60 ],
      slide: function( event, ui ) {
        $( "#amount" ).val(ui.values[ 0 ] + "% - " + ui.values[ 1 ] + "%" );
      }
    });
    $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 )+"%  " +
      $( "#slider-range" ).slider( "values", 1 )+"%" );
  } );
  </script>


<style>

.RadialProgress {
  --hue: 220;
  --holesize: 65%;
  --track-bg: hsl(233 34% 92%);
  
  block-size: 50vmin;
  inline-size: 50vmin;
  min-inline-size: 100px;
  min-block-size: 100px;
  display: grid;
  place-items: center;
  position: relative;
  font-weight: 700;
  font-size: max(10vmin, 1.4rem);
  
  &::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 50%;
    z-index: -1;
    background: conic-gradient(
      hsl(var(--hue) 100% 70%),
      hsl(var(--hue) 100% 40%),
      hsl(var(--hue) 100% 70%) var(--progress, 0%),
      var(--track-bg) var(--progress, 0%) 100%
    );
    
    mask-image: radial-gradient(
      transparent var(--holesize),
      black calc(var(--holesize) + 0.5px)
    );
  }
}


</style>