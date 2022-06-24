 
@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<!-- 
<div id="audio-player-container" class="wwws" style=" width:1000px;">

    <input type="text" class="form-control limite-inferior"  readonly="readonly" style="width:50px;" value="wwwwwww"/>

    <div class="audio-progress" id="audio-progress">

            <div id="draggable-point" style="  width:30px; height:90px " class="draggable ui-widget-content">
                <div id="progress-handle-1" style="width:50px; height:50px ">50</div>
            </div>
            <div id="audio-progress-bar" class="bar-first" style=" height:30px">
            </div>

 
            <div id="draggable-point-2" style="left:80%; width:30px; max-height:90px " class="draggable ui-widget-content">
                <div id="progress-handle-2" style="width:50px; height:50px ">50</div>
            </div>
           
            <div id="audio-progress-bar-middle" class="bar-middle" style="width:80%;height:30px">
            </div>

            <div id="audio-progress-bar-third" class="bar-third" style="width:80%;height:30px">
            </div>  
            
    </div>
    <input type="text" class="form-control limite-superior"  style="width:50px;"/>

</div>

<div id="posX"></div>


-->

<div id="audio-player-container">
  <div class="audio-progress" id="audio-progress">
    <div id="draggable-point" style="left:75%;position:absolute;" class="draggable ui-widget-content">
      <div id="audio-progress-handle"></div>
    </div>
    <div id="audio-progress-bar" class="bar" style="width:75%">
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

          console.log("offset: "+offset);
          console.log("xPos: "+xPos);
            $('#audio-progress-bar').css({
            'width': xPos
            });
        }
    });




    $('#draggable-point-2').draggable({
        axis: 'x',
        containment: "#audio-progress"
    });

    $('#draggable-point-2').draggable({

        drag: function() {
            var offset = $(this).offset();
            var xPos = (100 * parseFloat($(this).css("left"))) / (parseFloat($(this).parent().css("width"))) + "%";
        
            $('#audio-progress-bar-middle').css({
            'width': xPos
            });
        }
    });


     
});

 


   
 

</script>

<style>


 /*
.www{
  display: flex;
  flex-direction: row ; 
}

.limite-inferior{

    display: block;
    position:absolute;
    z-index: 1;
    top : 70px;
    left : 200px;
    border: 4px solid #D3D5DF;
    border-top-color: #D3D5DF;
    border-right-color: #D3D5DF;
    border-radius: 100%;
    background-color: #fff;
    box-shadow: 0 1px 6px rgba(0, 0, 0, .2);
}

 .limite-superior{

  display: block;
  position:absolute;
  z-index: 1;
  top : 70px;

  left : 1175px;
  border: 4px solid #D3D5DF;
  border-top-color: #D3D5DF;
  border-right-color: #D3D5DF;
  border-radius: 100%;
  background-color: #fff;
  box-shadow: 0 1px 6px rgba(0, 0, 0, .2);
  cursor:pointer;


 }

.audio-progress {
  height: .5rem;
  width: 100%;
  background-color: #C0C0C0;
}
.audio-progress .bar-first{
  display: block;
  position:absolute;
  top : 118px;
  left : 117px;
  z-index: 3;

  height: 100%;
  background-color: #c73333;
}

.bar-third {
  display: block;
  position:absolute;
  top : 118px;
  left : 117px;
  z-index: 1;
  height: 100%;
  background-color: #27862c;
}

.bar-middle {

  display: block;
  position:absolute;
  top : 118px;
  left : 117px;
  z-index: 2;
  height: 100%;
  background-color: #c1a62f;
}

#progress-handle-1 {
  display: block;
  position:absolute;
  z-index: 5;
  margin-top: -5px;
  margin-left: -10px;
  width: 10px;
  height: 10px;
  border: 4px solid #D3D5DF;
  border-top-color: #D3D5DF;
  border-right-color: #D3D5DF;
  border-radius: 100%;
  background-color: #fff;
  box-shadow: 0 1px 6px rgba(0, 0, 0, .2);
  cursor:pointer;
}

#progress-handle-2 {
  display: block;
  position:absolute;
  z-index: 5;
  margin-top: -5px;
  margin-left: -10px;
  width: 10px;
  height: 10px;
  border: 4px solid #D3D5DF;
  border-top-color: #D3D5DF;
  border-right-color: #D3D5DF;
  border-radius: 100%;
  background-color: #fff;
  box-shadow: 0 1px 6px rgba(0, 0, 0, .2);
  cursor:pointer;
}


.draggable {
  float: left; margin: 0 10px 10px 0;
}
*/




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