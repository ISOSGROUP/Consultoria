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

             
             <div class="box">

                <div class="form-group test" >
                    <label for="strengths" class="col-xs-2 control-label">
                    </label>
                </div>

                <div class="form-group strengths" >
                    <label for="strengths" class="col-xs-2 control-label label-strengths"> Fortalezas
                        <a class="pull-right" style=" color:#0882cd; padding-left:20px"> <i class="fa fa-plus-square fa-lg createFodaTextBox" test="strengths"  > </i></a>
                    </label>
                        <div class="form" id="strengths">
                        </div>
                </div>

                <div class="form-group weaknesses" >
                    <label for="weaknesses" class="col-xs-2 control-label"> debilidades
                        <a class="pull-right" style=" color:#0882cd; padding-left:20px"> <i class="fa fa-plus-square fa-lg createFodaTextBox"  test="weaknesses" > </i></a>
                    </label>
                        <div class="form weaktest" id="weaknesses">
                        </div>
                </div>

                <div class="form-group opportunities" >
                    <label for="opportunities" class="col-xs-2 control-label"> oportunidades
                        <a class="pull-center" style="color:#0882cd; padding-right:20"> <i class="fa fa-plus-square fa-lg createFodaTextBox" test="opportunities"  > </i></a>
                    </label>
                        <div class="form" id="opportunities">
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



                <div class="form-group oppor_strength_strategies" >
                    <label for="oppor_strength_strategies" class="col-xs-2 control-label"> strategias
                    <a class="pull-right" style="color:#0882cd;padding-left:20px"> <i class="fa fa-plus-square fa-lg createStrategyTextBox" test="opportunities_strengths"  > </i></a>
                    </label>
                        <div class="form" id="opportunities_strengths">
                        </div>
                </div>

                <div class="form-group oppor_weak_strategies" >
                    <label for="oppor_weak_strategies" class="col-xs-2 control-label"> strategias
                       <a class="pull-right" style="color:#0882cd;padding-left:20px"> <i class="fa fa-plus-square fa-lg createStrategyTextBox" test="opportunities_weaknesses"  > </i></a>
                    </label>
                    <div class="form" id="opportunities_weaknesses">
                    </div>
                </div>

                <div class="form-group threats" >
                    <label for="opportunities" class="col-xs-2 control-label"> amenazas
                        <a class="pull-right" style="color:#0882cd;padding-left:20px"> <i class="fa fa-plus-square fa-lg createFodaTextBox" test="threats" > </i></a>
                    </label>
                        <div class="form" id="threats">
                        </div>
                </div>

                <div class="form-group threats_strength_strategies" >
                    <label for="threats_strength_strategies" class="col-xs-2 control-label"> strategias
                    <a class="pull-right" style="color:#0882cd;padding-left:20px"> <i class="fa fa-plus-square fa-lg createStrategyTextBox" test="threats_strengths"  > </i></a>

                    </label>
                        <div class="form" id="threats_strengths">
                        </div>
                </div>

                <div class="form-group threats_weak_strategies" >
                    <label for="threats_weak_strategies" class="col-xs-2 control-label"> strategias
                        <a class="pull-right" style="color:#0882cd  ;padding-left:20px"> <i class="fa fa-plus-square fa-lg createStrategyTextBox" test="threats_weaknesses"  > </i></a>
                    </label>
                        <div class="form" id="threats_weaknesses">
                        </div>
                </div>



            </div>


            <div class="form-group form-creator-foda" >
                <label>información del usuario que completó el FODA</label>
                <br>
                <br>
                <form action="{{route('userFoda.save')}}" method="post">

                    @csrf

                    <div class="form-group">

                        <label>Nombre:</label>
                      {{--   <input type="text" name="user" id="user"class="form-control" placeholder="Name"> --}}
                        <input type="text" style="display:none;"name="id" id="user_id"class="form-control" placeholder="Name">


                        <select name="user" id="user" class="form-control">
                                @foreach($users as $key => $value)

                                        <option value="{{ $value->name }}">{{ $value->name }}</option>

                                @endforeach
                        </select>



                    </div>


                    {{--
                        
                        
                    <div class="form-group">
                        <label>fecha:</label>
                        <input type="date"  readonly="readonly" name="date" id="datepicker" class="form-control">
                    </div>

                    --}}


                    <div class="form-group">
                        <label>fecha:</label>
                        <div class='input-group' >
                            <input  type='text'  readonly name="date"  class="form-control" id='datepicker' />
                        </div>
                    </div>


         
                    @can('cambiar fecha en apartado partes interesadas')

                        <script>
                            document.getElementById("datepicker").removeAttribute("readonly");;
                        </script>

                    @endcan



                    <div class="form-group">
                        <button class="btn btn-success btn-submit">actualizar</button>
                    </div>
                </form>


            </div>


            <div class="modalcustom" id="modal1" data-animation="slideInOutLeft">
                <div class="modal-dialog">
                    <header class="modal-header">
                    Editar
                        <button class="close-modal" id="close_modelcustom" aria-label="close modal" data-close>
                            ✕  
                        </button>
                    </header>

                    <section class="modal-content">

                        
                        <div class="form-group">

                            <input type="text" id="data-1" style="display:none;" class="form-control" placeholder=""/>
                            <input type="text" id="data-2" style="display:none;" class="form-control" placeholder=""/>
                            <input type="text" id="row_strategy" style="display:none;" class="form-control" placeholder=""/>

                            <table class="table table-striped" id="dataTable" >

                                <thead>
                                    <th id="theadCol1" scope="col" width="1%"></th>
                                    <th id="theadCol2" scope="col" width="1%"></th>
                                </thead>
                                <tr>
                                {{-- 
                                    <td>
                                        <label class="label-table">
                                            
                                    
                                            <input type="checkbox" 
                                            
                                            name="values[{{ $permission->name.' view_files' }}]"
                                            class='permission'
                                            {{ ($permission->view_files == true) 
                                                ? 'checked'
                                                : '' }}
                                             > option 1
                                        </label>
                                    </td>
                                    --}}
                                </tr>

                            </table>



                            <label for="strategy" class="col-xs-2 control-label"> strategia
                            </label>
                            <input type="text" id="strategy" class="form-control" placeholder=""/>

                            <label for="responsible" class="col-xs-2 control-label"> responsable
                            </label>
                            <input type="text" id="responsible" class="form-control" placeholder=""/>

                            <label for="budget" class="col-xs-2 control-label"> presupuesto
                            </label>
                            <input type="text" id="budget" class="form-control" placeholder=""/>

                            @php
                                $ss = ["without_starting"=>"sin iniciar","in_process"=>"en proceso","executed"=>"ejecutado","cancelled"=>"cancelado"];
                            @endphp

                            <label for="status" class="col-xs-2 control-label"> estado
                            </label>
                            <select name="status" id="status" class="form-control">
                                @foreach($ss as $key => $value)

                                    <option value="{{ $key }}">{{ $value }}</option>

                                @endforeach

                            </select>

                            <br>

                            <label for="description" class="col-xs-2 control-label"> descripcion
                            </label>
                            <textarea name="textarea"  class="form-control" id="description" rows="5" cols="50"></textarea>

                            <label for="budget" class="col-xs-2 control-label"> estrategia vinculada
                            </label>
                            <input type="text" id="linked_strategy" class="form-control" placeholder=""/>

                            <br>
                            <br>
                            <div class="btn-group">
                                <button type="button" id="save-foda-details" class="open-modal">
                                    Guardar
                                </button>
                            </div>


                        </div>
                         
                    </section>
                    
                </div>
            </div>

        </div>
    </div>

@endsection

<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   



<script>
   jQuery(document).ready(function($) {
        //$('#datepicker').datepicker({
          //  dateFormat: "yy-mm-dd"
        //});
    });
     
</script>


 

<script type="text/javascript">  
$(document).ready(function() {
   
    $.ajax({
        url: "/fodaUser",
        type: 'GET',
        dataType: 'json',  
        success: function(res) {
            console.log(res);
            document.getElementById("user").value = res[0].name
            document.getElementById("user_id").value = res[0].id
            document.getElementById("datepicker").value = res[0].date;
        }
    });
        
    const myArray = {};
    myArray.weaknesses = "debilidades";
    myArray.opportunities = "oportunidades";
    myArray.strengths = "fortalezas";
    myArray.threats = "amenazas";
    //console.log(myArray["threats"]);
/*
   function generateTexbox(data){
        var weaknesses_children = Array.prototype.slice.call(document.getElementById("weaknesses").children);
        var opportunities_children = Array.prototype.slice.call(document.getElementById("opportunities").children);
        weaknesses_children.map((element, index) => { 
            if (opportunities_children.length > index) {
                ( ((weaknesses_children[index].children[0].id != "w") && (opportunities_children[index].children[0].id != "w")) ? loadStrategyRows("oppor_weak_strategies",weaknesses_children[index].children[0].id,opportunities_children[index].children[0].id):"");       
            }
        })
        var strengths_children = Array.prototype.slice.call(document.getElementById("strengths").children);
        var opportunities_children = Array.prototype.slice.call(document.getElementById("opportunities").children);
        strengths_children.map((element, index) => { 
            if (opportunities_children.length > index) {
                ( ((strengths_children[index].children[0].id != "w") && (opportunities_children[index].children[0].id != "w")) ? loadStrategyRows("oppor_strength_strategies",strengths_children[index].children[0].id,opportunities_children[index].children[0].id):"");       
            }
        })
        var strengths_children = Array.prototype.slice.call(document.getElementById("strengths").children);
        var threats_children = Array.prototype.slice.call(document.getElementById("threats").children);
        threats_children.map((element, index) => { 
            if (strengths_children.length > index) {
                ( ((threats_children[index].children[0].id != "w") && (strengths_children[index].children[0].id != "w")) ? loadStrategyRows("threats_strength_strategies",threats_children[index].children[0].id,strengths_children[index].children[0].id):"");       
            }
        })
        var weaknesses_children = Array.prototype.slice.call(document.getElementById("weaknesses").children);
        var threats_children = Array.prototype.slice.call(document.getElementById("threats").children);
        threats_children.map((element, index) => { 
            if (weaknesses_children.length > index) {
                ( ((threats_children[index].children[0].id != "w") && (weaknesses_children[index].children[0].id != "w")) ? loadStrategyRows("threats_weak_strategies",threats_children[index].children[0].id,weaknesses_children[index].children[0].id):"");       
            }
        })
         
        
    }
    */
   async function Generate(data,data_1,data_2){
                    var  length = data.length;
                    await data.forEach((value,i) => {
                        var div = $("<div class='input-group mb-3' />");
                        var isRemove = false;
                       
                       /* if ( (i > data_1.length) || (i > data_2.length))  {
 
                            isRemove = true;
                            div.html(GenerateTextbox(value.name, value.description, value.foda_details_id,isRemove, myArray[value.name].charAt(0).toUpperCase(),(i+1) ));  
                        }else{
                            
                            if( length == (i + 1) ){
                                isRemove = true;
                                div.html(GenerateTextbox(value.name, value.description, value.foda_details_id, isRemove,myArray[value.name].charAt(0).toUpperCase(),(i+1) ));  
                            }else{
                                div.html(GenerateTextbox(value.name, value.description, value.foda_details_id,"", myArray[value.name].charAt(0).toUpperCase(),(i+1) ));  
                            }
                        }
*/
                        if( length == (i + 1) ){
                            isRemove = true;
                            div.html(GenerateTextbox(value.name, value.description, value.foda_details_id, isRemove,myArray[value.name].charAt(0).toUpperCase(),(i+1) ));  
                        }else{
                            div.html(GenerateTextbox(value.name, value.description, value.foda_details_id,"", myArray[value.name].charAt(0).toUpperCase(),(i+1) ));  
                        }
                        $('#'+value.name).append(div); 
                    });
   }
   function generate2(){
        const listFodaStrategies = {};
        listFodaStrategies.opportunities_strengths = { 0:"opportunities", 1:"strengths"};
        listFodaStrategies.opportunities_weaknesses = { 0:"opportunities", 1:"weaknesses"};
        listFodaStrategies.threats_strengths = { 0:"threats", 1:"strengths"};
        listFodaStrategies.threats_weaknesses = { 0:"threats", 1:"weaknesses"};
        //console.log(myArray["threats"]);
        async function request(index,listFodaStrategies){
            $id = "w";
            $.ajax({
                
                url: "/getFoda/"+ listFodaStrategies[index][0] +"/"+ listFodaStrategies[index][1]+"/"+$id,
                type: 'GET',
                success: function(res) {
                    //console.log("key: "+index);
                    //console.log("value: "+res[index]);
                    console.log(res[0]);
                    if(res[0] != null){
                        Object.keys(res).forEach(key => {
                            //console.log(key); 
                            //console.log(res[key]); 
                            var data =  res[key][0].strategy;
                            var id =  res[key][0].id;
                            var div = $("<div class='input-group mb-3' />");  
                            div.html(generateStrategyRow(listFodaStrategies[index][0],listFodaStrategies[index][1],data,id,"no"));  
                            $('#'+index).append(div); 
                        });
                    } 
                }
            });
        }
        for (var key in listFodaStrategies) {
            if (listFodaStrategies.hasOwnProperty(key)) {
                //console.log(key + " -> " + listFodaStrategies[key][1]);
                request(key,listFodaStrategies);
            }
        }
   }
    $.ajax({
        url: "/allFoda",
        type: 'GET',
        dataType: 'json',  
        success: function(res) {
            //for (const key of Object.keys(res)) {
                //console.log("key: "+key);  
                //console.log("value: "+res[key]); 
                //((key == "weaknesses")? Generate(res[key]) :"");
                //((key == "opportunities")? Generate(res[key]) :"");
                //((key == "threats")? Generate(res[key]) :"");
                //((key == "strengths")? Generate(res[key]) :"");
            //}
            Generate(res["weaknesses"],res["opportunities"],res["threats"]);
            Generate(res["strengths"],res["opportunities"],res["threats"]);
            Generate(res["opportunities"],res["strengths"],res["weaknesses"]);
            Generate(res["threats"],res["strengths"],res["weaknesses"]);
            generate2();
        }
    });
    $(".createFodaTextBox").bind("click", function () {  
        var attr = $(this).attr("test");
        var div = $("<div class='input-group mb-3' />");  
        div.html(GenerateTextbox(attr,"","w",false,"",""));  
        $('#'+attr).append(div);  
    });
    $(".createStrategyTextBox").bind("click", function () {  
        var index = $(this).attr("test");
        var list = index.split("_");
        var data =  "";
        var id =  "w";
        var div = $("<div class='input-group mb-3' />");  
        div.html(generateStrategyRow(list[0],list[1],data,id,"yes"));  
        $('#'+index).append(div); 
    });
      
     
    $("body").on("click", ".removeFodaTextBox", function () {
        var foda_field = $(this).attr("value");
        var parentElm = $(this).parent().parent();
        var children = parentElm.children('input');
        $.ajax({
            url: "/foda/"+foda_field+"/"+children.attr("id"),
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                //children.attr("id",res)
            },
            complete: function(){
                $(this).closest("div").parent().remove(); 
                location.reload();
            }
        });
    });
    $("body").on("click", ".removeStrategyTextBox", function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "/foda_strategies_details/"+id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res);
            },
            complete: function(){
                $(this).closest("div").parent().remove(); 
                location.reload();
            }
        });
    });
    $("body").on("click", ".save", function () {  
        var foda_field = $(this).attr("value");
        var parentElm = $(this).parent().parent();
        var children = parentElm.children('input');
        $.ajax({
            url: "/save_foda/"+foda_field+"/"+children.attr("id")+"/"+children.val(),
            type: 'GET',
            dataType: 'json',  
            success: function(res) {
                children.attr("id",res)
                location.reload();
            }
        });
    });
      
//});
    function GenerateTextbox(foda_field,description,id,isRemove,first_character,row_number) {  
        if(isRemove){
            return  ' <i class="" style="padding-right:10px; padding-top:5px;" >'+first_character+row_number+'</i>'+
                    '<input type="text" style="border-radius:10px;" value="'+description+'" id="'+id+'" row-identifier="'+first_character+row_number+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right save"  value='+foda_field+' style="color:#147811;padding-left:15px;padding-top:10px;"> <i class="fa fa-save fa-lg"> </i></a>'+
                    '<a class="pull-right removeFodaTextBox" value='+foda_field+' style="color:#db6955 ;padding-left:15px;padding-top:10px;"> <i class="fa fa fa-trash fa-lg"> </i></a>'+
                '</div>';
        }else{
            return  '<i class="" style="padding-right:10px; padding-top:5px" >'+first_character+row_number+'</i>'+
                    '<input type="text" style="border-radius:10px;" value="'+description+'" id="'+id+'" row-identifier="'+first_character+row_number+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right save"  value='+foda_field+' style="color:#147811;padding-left:15px; padding-top:10px;"> <i class="fa fa-save fa-lg"> </i></a>'+
                '</div>'
        }
        
    }
    
    /*
    function loadStrategyRows(id,weaknesses_id,opportunities_id){
        $.ajax({
            url: "/getFoda/"+opportunities_id+"/"+weaknesses_id,
            type: 'GET',
            dataType: 'json',  
            success: function(res) {
                if(res != null){
                    var data =  res[0].strategy;
                    console.log(data);
                    var div = $("<div class='input-group mb-3' />");  
                    div.html(GenerateTextbox2(weaknesses_id,opportunities_id,data));  
                    $('#'+id).append(div); 
                }else{
                    var div = $("<div class='input-group mb-3' />");  
                    div.html(GenerateTextbox2(weaknesses_id,opportunities_id,""));  
                    $('#'+id).append(div); 
                }
            }
        });
    }
    function GenerateTextbox2(weaknesses_id,opportunities_id,data) {  
        return  '<input type="text" readonly="readonly" style="border-radius:10px;" value="'+data+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right edit" data-1="'+opportunities_id+'" data-2="'+weaknesses_id+'"    style="padding-left:20px"> <i class="fa fa-edit fa-lg"> </i></a>'+
                '</div>'
    } 
    */
    
    function generateStrategyRow(value_1,value_2,data,id,value_3) {  
        return  '<input type="text" readonly="readonly" style="border-radius:10px;" value="'+((data != null)? data:"")+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right edit" data-1="'+value_1+'" data-2="'+value_2+'" id="'+id+'" is-new-field="'+value_3+'"  style="color: #3685e9 ;padding-left:15px;padding-top:10px;"> <i class="fa fa-edit fa-lg"> </i></a>'+
                    '<a class="pull-right removeStrategyTextBox" id="'+id+'"  style="color: #db6955;padding-left:15px;padding-top:9px;"> <i class="fa fa fa-trash fa-lg"> </i></a>'+
                '</div>'
    }
    function addRow(element_1,element_2,checkboxList){ 
        var table = document.getElementById('dataTable');
        var rowCount = table.rows.length;
        var cellCount = 1; 
        var row = table.insertRow(rowCount);
        for(var i = 0; i <= cellCount; i++){
            var htmlLabelInput = "";
            if(i == 0){
                if((element_1 != null) && (element_1.getAttribute("row-identifier") != "")){
                    
                        var s = `checked`;
                        var s2 = 'checked';
                    htmlLabelInput = '<label class="label-table">'+
                                '<input type="checkbox"  ischecked="'+((checkboxList.includes(parseInt(element_1.id))) ? element_1.id :"false")+'"'+
                                'name="values['+element_1.id+']"'+
                                'class="customCheckBox"> '+element_1.getAttribute("row-identifier")+
                                '</label>';
                }
                var cell = row.insertCell(i);
                cell.innerHTML = htmlLabelInput;
                ( ((element_1 != null)&& (element_1.getAttribute("row-identifier")) )? $('[ischecked="'+element_1.id+'"]').attr('checked', true):"")
            }else{
             
                if((element_2 != null) && (element_2.getAttribute("row-identifier") != "")){
                    htmlLabelInput = '<label class="label-table">'+
                                     '<input type="checkbox"  ischecked="'+((checkboxList.includes(parseInt(element_2.id))) ? element_2.id :"false")+'"'+
                                    'name="values['+element_2.id+']"'+
                                    'class="customCheckBox"> '+element_2.getAttribute("row-identifier")+
                                    '</label>';
                } 
                 
                var cell = row.insertCell(i);
                cell.innerHTML = htmlLabelInput;
                ( ((element_2 != null)&& (element_2.getAttribute("row-identifier")) )? $('[ischecked="'+element_2.id+'"]').attr('checked', true):"")
            }
        }
    }
   // $(document).ready(function() {
        const isVisible = "is-visible";
        $("body").on("click", ".edit", function () {  
            document.getElementById("modal1").classList.add(isVisible);
            var value_1 = $(this).attr("data-1");
            var value_2 = $(this).attr("data-2");
            document.getElementById("theadCol1").innerHTML = myArray[value_1];
            document.getElementById("theadCol2").innerHTML = myArray[value_2];
            var data_1 = $(this).attr("data-1");
            var data_2 = $(this).attr("data-2");
            var id = $(this).attr("id");
            var is_new_field = $(this).attr("is-new-field");
            if(is_new_field == "yes"){
                data_1 = "w";
                data_2 = "w";
            }
            $.ajax({
                url: "/getFoda/"+data_1+"/"+data_2+"/"+id,
                type: 'GET',
                dataType: 'json',  
                success: function(res) {
                    if(res != null){
                        document.getElementById("strategy").value = res[0][0].strategy;
                        document.getElementById("responsible").value = res[0][0].responsible;
                        document.getElementById("budget").value = res[0][0].budget;
                        document.getElementById("status").value = res[0][0].status;
                        document.getElementById("description").value = res[0][0].description;
                        document.getElementById("linked_strategy").value =  res[0][0].linked_strategy;
                        document.getElementById("row_strategy").value = id;
                        document.getElementById("data-1").value = value_1;
                        document.getElementById("data-2").value = value_2;
                        
                        var opportunities_children = Array.prototype.slice.call(document.getElementById(value_1).children);
                        var strengths_children = Array.prototype.slice.call(document.getElementById(value_2).children);
                       ((opportunities_children.length > strengths_children.length)? (opportunities_children.map((element, index) => { (typeof strengths_children[index] != 'undefined') ? addRow(opportunities_children[index].children[1],strengths_children[index].children[1],res[0][1]):addRow(opportunities_children[index].children[1],null,res[0][1])})) : strengths_children.map((element, index) => { (typeof opportunities_children[index] != 'undefined') ? addRow(opportunities_children[index].children[1],strengths_children[index].children[1],res[0][1]):addRow(null,strengths_children [index].children[1],res[0][1])}))
                       
                       /*
                        if(opportunities_children.length > strengths_children.length){
                            opportunities_children.map((element, index) => { 
                                //console.log("rrr: "+opportunities_children[index].children[1].getAttribute("row-identifier"));
                                //((typeof strengths_children[index] != 'undefined')? addRow(opportunities_children[index].children[0],strengths_children[index].children[0]):addRow(opportunities_children[index].children[0],null))
                                if(typeof strengths_children[index] != 'undefined') {
                                    
                                    addRow(opportunities_children[index].children[1],strengths_children[index].children[1]);
                                }else{
                                    addRow(opportunities_children[index].children[1],null);
                                }
                            })
                        }else{
                            strengths_children.map((element, index) => { 
                                if(typeof opportunities_children[index] != 'undefined') {
                                    addRow(opportunities_children[index].children[1],strengths_children[index].children[1]);
                                }else{
                                    addRow(null,strengths_children [index].children[1]);
                                }
                                //((typeof opportunities_children[index] != 'undefined')? addRow(opportunities_children[index].children[0],strengths_children[index].children[0]):addRow(null,strengths_children[index].children[0]))
                            })
                        }*/
                    } else{
                        console.log("sin data");
                        var opportunities_children = Array.prototype.slice.call(document.getElementById(value_1).children);
                        var strengths_children = Array.prototype.slice.call(document.getElementById(value_2).children);
                       ((opportunities_children.length > strengths_children.length)? (opportunities_children.map((element, index) => { (typeof strengths_children[index] != 'undefined') ? addRow(opportunities_children[index].children[1],strengths_children[index].children[1],[]):addRow(opportunities_children[index].children[1],null,[])})) : strengths_children.map((element, index) => { (typeof opportunities_children[index] != 'undefined') ? addRow(opportunities_children[index].children[1],strengths_children[index].children[1],[]):addRow(null,strengths_children [index].children[1],[])}))
                        document.getElementById("strategy").value = "";
                        document.getElementById("responsible").value = "";
                        document.getElementById("budget").value = "";
                        document.getElementById("status").value = "without_starting";
                        document.getElementById("description").value = "";
                        document.getElementById("linked_strategy").value = "";
                        document.getElementById("row_strategy").value = "";
                        document.getElementById("data-1").value = value_1;
                        document.getElementById("data-2").value = value_2;
                    }
                   
                }
            });
        });
        var save = document.getElementById("save-foda-details");
        save.addEventListener("click", function() {
            var table = document.getElementById("dataTable");
            var checkboxList = {};
            for (var i = 0, row; row = table.rows[i]; i++) {
                for (var j = 0, col; col = row.cells[j]; j++) {
                    
                    Array.from(col.children).forEach(function(element) {
                        if (element.children[0].checked) {
                            var str = element.children[0].getAttribute("name");
                            var result = str.substring( str.indexOf( '[' ) + 1, str.indexOf( ']' ) );
                            checkboxList[result] = result;
                        } 
                    });
                }
            }
            
 
            var json_arr = {};
            json_arr[0] = document.getElementById("data-1").value;
            json_arr[1] = document.getElementById("data-2").value;
            json_arr[2] = document.getElementById("strategy").value;
            json_arr[3] = document.getElementById("responsible").value;
            json_arr[4] = document.getElementById("budget").value;
            json_arr[5] = document.getElementById("status").value;
            json_arr[6] = document.getElementById("description").value;
            json_arr[7] = document.getElementById("linked_strategy").value;
            json_arr[8] = document.getElementById("row_strategy").value;
            json_arr[9] = checkboxList;
            $.ajax({
                url: "/savefodaStrategies",
                type: 'GET',
                dataType: 'json',  
                data: {
                    value:json_arr
                },
                success: function(res) {
                    //console.log("res: "+res);                     
                },
                complete: function (data) {
                    //console.log("complete: "+data); 
                    location.reload();                    
                }
            });
            
        });
        var close_model = document.getElementById("close_modelcustom");
        close_model.addEventListener("click", function() {
            this.parentElement.parentElement.parentElement.classList.remove(isVisible);
            location.reload();
        });
        document.addEventListener("click", e => {
            if (e.target == document.querySelector(".modalcustom.is-visible")) {
                document.querySelector(".modalcustom.is-visible [data-close]").click();
            }
        });
        document.addEventListener("keyup", e => {
        // if we press the ESC
            if (e.key == "Escape" && document.querySelector(".modalcustom.is-visible")) {
                document.querySelector(".modalcustom.is-visible [data-close]").click();
            }
        });
    }
    );
    
</script>  

 <style>
    .box {
        display: flex;
        width:  1020px;
        height: 800px;
        /* border: 1px solid #c3c3c3; */
        flex-direction: row;
        flex-wrap: wrap;
        padding: 5px;  
    }
    .box > div {
        flex: 1 1 auto;
        text-align: center;
        margin: 5px; 
        border-radius:10px;
    
    }
    .test {
        width: 300px;
        height: 250px;
        /*border: 1px solid #c3c3c3; */
        align-items: center;
        justify-content: center;
        display: flex;
    }
    .strengths {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    
    .weaknesses {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    .opportunities {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    .oppor_strength_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    .oppor_weak_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    .threats {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    .threats_strength_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    .threats_weak_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    .form-creator-foda {
        width: 400px;
        height: 300px;
        padding:20px;
        background-color:rgba(247, 247, 247, 0.46);
        color:rgba(7, 11, 19, 1);
        
        position: relative;
        top: 10px; left: 6px;
        flex: 1 1 auto;
        margin: 2px; 
        border-radius:10px;
    }
    
    
     
    
  
    :root {
        --lightgray: #efefef;
        --blue: steelblue;
        --white: #fff;
        --black: rgba(0, 0, 0, 0.8);
        --bounceEasing: cubic-bezier(0.51, 0.92, 0.24, 1.15);
    }
    
    
    button {
        cursor: pointer;
        background: transparent;
        border: none;
        outline: none;
        font-size: inherit;
    }
    
    
    .open-modal {
        font-weight: bold;
        background: var(--blue);
        color: var(--white);
        padding: 0.75rem 1.75rem;
        margin-bottom: 1rem;
        border-radius: 5px;
    }
    /* MODAL
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .modalcustom {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: var(--black);
        cursor: pointer;
        visibility: hidden;
        opacity: 0;
        transition: all 0.35s ease-in;
    }
    .modalcustom.is-visible {
        visibility: visible;
        opacity: 1;
    }
    .modal-dialog {
        position: relative;
        max-width: 800px;
        max-height: 80vh;
        border-radius: 5px;
        background: var(--white);
        overflow: auto;
        cursor: default;
    }
    .modal-dialog > * {
        padding: 1rem;
    }
    .modal-header {
        background: var(--lightgray);
    }
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .modal-header .close-modal {
        font-size: 1.5rem;
    }
    .modal p + p {
        margin-top: 1rem;
    }
    /* SLIDE LEFT ANIMATION
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    [data-animation="slideInOutLeft"] .modal-dialog {
        opacity: 0;
        transform: translateX(-100%);
        transition: all 0.5s var(--bounceEasing);
    }
    [data-animation="slideInOutLeft"].is-visible .modal-dialog {
        opacity: 1;
        transform: none;
        transition-delay: 0.2s;
    }
    .label-table {
        padding:2px;
       /* border:1px solid #ccc;
        
        margin:0 0 10px;
        
        display:block; */
    }
    .label-table:hover {
        background:#eee;
        cursor:pointer;
    }
    .customCheckBox:hover {
        background:#eee;
        cursor:pointer;
    }
    
    
 
 </style>