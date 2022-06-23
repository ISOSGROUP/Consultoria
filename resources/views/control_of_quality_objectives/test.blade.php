 
@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<div id="audio-player-container">

    <div class="audio-progress" id="audio-progress">

            <div id="draggable-point" style="left:80%; width:30px; height:30px " class="draggable ui-widget-content">
                <div id="audio-progress-handle"></div>
            </div>

            <div id="audio-progress-bar" class="bar" style="width:75%;height:30px">
            </div>
            
    </div>

</div>

<div id="posX"></div>



@endsection 

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script type="text/javascript">

$( function() {
  


    $('#draggable-point').draggable({
        axis: 'x',
        containment: "#audio-progress"
    });

    $('#draggable-point').draggable({

        drag: function() {
            var offset = $(this).offset();
            var xPos = (100 * parseFloat($(this).css("left"))) / (parseFloat($(this).parent().css("width"))) + "%";
        
            $('#audio-progress-bar').css({
            'width': xPos
            });
        }
    });


     
});

 


   
 

</script>

<style>

 
.audio-progress {
  height: .5rem;
  width: 100%;
  background-color: #C0C0C0;
}
.audio-progress .bar {
  height: 100%;
  background-color: #E95F74;
}

#audio-progress-handle {
  display: block;
  position:absolute;
  z-index: 1;
  margin-top: -5px;
  margin-left: -10px;
  width: 10px;
  height: 10px;
  border: 4px solid #D3D5DF;
  border-top-color: #D3D5DF;
  border-right-color: #D3D5DF;
  transform: rotate(45deg);
  border-radius: 100%;
  background-color: #fff;
  box-shadow: 0 1px 6px rgba(0, 0, 0, .2);
  cursor:pointer;
}

.draggable {
  float: left; margin: 0 10px 10px 0;
}
</style>