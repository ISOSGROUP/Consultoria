@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">foda</a>
      </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')

             
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             foda
                         </div>
                         <div class="card-body">

                              <div class="pull-left mr-3">
                           
                              



        <div class="form-group" >

            <label for="birthday" class="col-xs-2 control-label"> oportunidades
                <a class="pull-right" style="padding-left:20px"> <i class="fa fa-plus-square fa-lg"   id="CreateTextboxOpportunity"> </i></a>
            </label>

            <div class="col-xs-10">

                <div class="form" id="opportunity">

         

                <!--
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder=""/>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder=""/>
                    </div>
        -->
                </div>
            </div>
        </div>


        
    



                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

 
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
 
<script type="text/javascript">  

$(document).ready(function() {

    $("#CreateTextboxOpportunity").bind("click", function () {  
        var div = $("<div class='input-group mb-3' />");  
        div.html(GenerateTextbox(""));  
        $("#opportunity").append(div);  
    });  
     
    $("body").on("click", ".remove", function () {  
        $(this).closest("div").parent().remove();  
    });  
});

$(function () {  
    
});  
function GenerateTextbox(value) {  

            return  '<input type="text" class="form-control" placeholder=""    >'+
                    '<div class="input-group-prepend">'+
                        '<a class="pull-right remove" style="padding-left:20px"> <i class="fa fa fa-trash fa-lg"> </i></a>'+
                    '</div>'
    
}  
</script>  

 <style>

/* enable absolute positioning */
.inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }
 </style>

