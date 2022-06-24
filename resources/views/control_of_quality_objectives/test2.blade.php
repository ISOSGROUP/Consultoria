 
@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<div
  class="RadialProgress"
  role="progressbar"
  aria-valuenow="25"
  aria-valuemin="0"
  aria-valuemax="100"
></div>

<input type="range" value="25" min="0" max="100" />




@endsection 

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script type="text/javascript">

$(document).ready(function() {

  const controller = document.querySelector('input[type=range]');
  const radialProgress = document.querySelector('.RadialProgress');

  const setProgress = (progress) => {
    const value = `${progress}%`;
    radialProgress.style.setProperty('--progress', value)
    radialProgress.innerHTML = value
    radialProgress.setAttribute('aria-valuenow', value)
  }

  setProgress(controller.value)
  controller.oninput = () => {
    setProgress(controller.value)
  }


});
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