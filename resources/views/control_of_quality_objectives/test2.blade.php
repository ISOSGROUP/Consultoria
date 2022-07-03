 
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

 


</style>