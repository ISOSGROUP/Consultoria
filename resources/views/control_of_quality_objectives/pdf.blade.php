<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ url('risks_chance.css') }}" />

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  
</head>

<body>
 

<div class="form_wrapper">

                            <div class="form-control">
                                <label for="">PERÍODO DE INFORMACIÓN: ANUAL</label>
                                <br>
                                <label id="date"></label>
                                <br>
                                <label for="">MODULO: CONTROL DE OBJETIVOS</label>
                                <br>
                                <br> 
                                <br>
                            </div>

  <div class="form_container">

  
                            @php
                                $measurement_frequency = ["1"=>"Mensual","2"=>"Bimestral","3"=>"Trimestral","4"=>"cuatrimestre","6"=>"Semestral","12"=>"Anual"];
                                $formula = ["1"=> " ⬆ (N eventos ejecutados * 100) / N eventos programados ","2"=>" ⬇ (N eventos ejecutados * 100) / N eventos programados","3"=>" ⬆ Conteo de N eventos","4"=>" ⬇ Conteo de N eventos"];

                            @endphp

                           
                            
                                    @foreach($controlOfQualityObjectives as $key => $controlOfQualityObjectives)
                                    

                                    <div class="form-group col-sm-12 col-lg-12">
                                        {!! Form::label('quality_politics', 'Política de Calidad:') !!}
                                        {!! Form::textarea('quality_politics', $controlOfQualityObjectives->quality_politics, ['class' => 'form-control']) !!}
                                        <br>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-12">
                                        {!! Form::label('objectives', 'Objetivos:') !!}
                                        {!! Form::textarea('objectives', $controlOfQualityObjectives->objectives, ['class' => 'form-control textarea_field']) !!}
                                        <br>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-12">
                                        {!! Form::label('indicator', 'Indicador:') !!}
                                        <br>
                                        {!! Form::text('indicator',  $controlOfQualityObjectives->indicator, ['class' => 'form-control']) !!}
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-5">
                                        {!! Form::label('formula', 'Formula:') !!}
                                        <br>

                                        {!! Form::text('formula', $formula[$controlOfQualityObjectives->formula], ['class' => 'form-control','id'=>'formula','onchange'=>"val()"]) !!} 
                                        <br>
                                    
                                    </div>
                                            
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('measurement_frequency', 'Frecuencia de medición:') !!}
                                        <br>
                                        {!! Form::text('measurement_frequency',$measurement_frequency[$controlOfQualityObjectives->measurement_frequency], ['class' => 'form-control','empty'=>'Seleccionar','id'=>'measurement_frequency']) !!}
                                        <br>
                                    </div>    
                                            

                                    <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

                                   <!--  <script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script> -->


                                    <div class="form-group custom-table">
                                        <table class="table table-striped" id="dataTable-{{$key}}" >
                                        </table>

        <script type="text/javascript">

              

    document.getElementById("date").innerHTML = "";

    var today = new Date()
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var str = "FECHA DE ENVIO: "+today.toLocaleDateString('es-ES', options)
    document.getElementById("date").innerHTML = str.toUpperCase();

    var key = '<?php echo $key; ?>';

    console.log("key: "+key);

    test();
    
    function test(){


        var thead = "";
        var tbody = "";

        var formula = '<?php echo $controlOfQualityObjectives->formula; ?>';
        var measurement_frequency = '<?php echo $controlOfQualityObjectives->measurement_frequency; ?>';
        var meses = "";
        var MONTHS = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
        var flat = 0; 
        var month_list = [];


        for (var i=0; i < MONTHS.length; i++) {

            meses += " - "+MONTHS[i];
            flat ++;
            if(flat == measurement_frequency){
                flat = 0;
                meses = meses.slice(2);
                month_list.push(meses);
                meses = "";

            }
        }


        thead += '<thead>'+
                    '<tr>'+
                        '<th>Mes</th>'+
                        '<th>Events</th>'+
                    ((formula == 1 ||  formula == 2)? '<th>Events realizados</th>':"")
                    '</tr>'+
                '</thead>';

        document.getElementById("dataTable-"+key).innerHTML = thead;



        var today = new Date()
        var options = { month: 'long'};
        var month = today.toLocaleDateString('es-ES', options);
        month = month.charAt(0).toUpperCase()+ month.slice(1);

        var monthlist = '<?php echo json_encode(unserialize($controlOfQualityObjectives->month_list)); ?>';
        var monthlist = JSON.parse(monthlist);
        var flat = false;
        var flat2 = false;
        var periodo = 0;
        var data_1 = 0;
        var data_2 = 0;
        var pocentaje = 0;

        //console.log("month_list: " + month_list[2]);

        month_list.map((value , index) => {


            (value.toString().includes(month) ? flat = true: null);

            if(flat && (!flat2)){
                //console.log(index-1);
                flat2 = true;
                periodo = index-1;
                
                periodo = ((periodo < 0) ? 0: periodo);
                console.log(periodo);
                //console.log(formula);
                data_1 = ((monthlist[value] != undefined)? monthlist[month_list[periodo]].toString().split(',')[0]:"");
                data_2 = ((monthlist[value] != undefined)? monthlist[month_list[periodo]].toString().split(',')[1]:"");


                if(formula == 1 ||  formula == 2){

                    pocentaje = ((data_2 * 100)/data_1);
                    //console.log("pocentaje :"+pocentaje);
                    $('#status_to_date').val(pocentaje);

                }else{
                    pocentaje = data_1;
                    $('#status_to_date').val(pocentaje);

                }

            }

            tbody += '<tr class="item">'+
                                '<td>' + value + '</td>'+
                                '<td>' + '<input type="Number"'+
                                            'name="values['+value+',data_1]"'+
                                            'class="form-control data_1"'+ 
                                            ( flat == true ? "readonly ":"")+
                                            'value="'+ ((monthlist[value] != undefined)? monthlist[value].toString().split(',')[0]:0)+'">'+
                                '</td>'+
                                
                                ((formula == 1 ||  formula == 2 )? '<td>' +'<input type="Number"'+
                                            'name="values['+value+',data_2]"'+
                                        'class="form-control data_2"'+ 
                                        ( flat == true ? "readonly ":"")+
                                        'value="'+ ((monthlist[value] != undefined)? monthlist[value].toString().split(',')[1]:0)+'">'+

                                '</td>' :"")
                            '</tr>';

        } );

        document.getElementById("dataTable-"+key).innerHTML = tbody;



}






    $("tr.custom-row").each(function() {


        var jsonData = '<?php echo $controlOfQualityObjectives->activities; ?>';
        var jsonData = JSON.parse(jsonData);
        var users = '<?php echo $users; ?>';
        var users = JSON.parse(users);



        var select = `<select class="js-example-basic-multiple" name="states[]" multiple="multiple">`;

        for(var index in users) {

            select += `<option value="`+users[index]["name"]+`">`+users[index]["name"]+`</option>`

        }   

        select += `</select>`;

        for(var key in jsonData) {

            var actividades = jsonData[key]["actividades"];
            var recursos = jsonData[key]["recursos"];
            var responsable = jsonData[key]["responsable"];
            var plazo = jsonData[key]["plazo"];
            var verificacion = jsonData[key]["verificacion"];

            var content = jQuery('#sample_table tr');
            var size = key;
            var element = null;
            element = content.clone();
            element.find("td.actividades").empty();
            element.find("td.recursos").empty();
            element.find("td.responsable").empty();
            element.find("td.plazo").empty();
            element.find("td.verificacion").empty();
            element.find("td.actividades").append(actividades);
            element.find("td.recursos").append(recursos);
            element.find("td.responsable").append(responsable);
            element.find("td.plazo").append(`<input type="date" class="datepicks" />`);
            element.find("td.plazo").find("input").val(plazo); 
            element.find("td.verificacion").append(verificacion);
            element.attr('id', size);
            //element.find('.delete-record').attr('data-id', size);
            element.appendTo('#tbl_posts_body');
            element.find('.sn').html(size);

        }
    });




        </script>











                                    </div>

                                   

                                    <div class="form-group col-sm-6">
                                        {!! Form::label('goals', 'Meta:') !!}
                                        {!! Form::text('goals',$controlOfQualityObjectives->goals, ['class' => 'form-control']) !!}
                                        <br>
                                        <br>
                                        
                                    </div>


                                    <div  class="form-inline">
                                    <label >Cambios de rango</label>

                                    


                                    <div class="form-inline col-sm-12">
                                            <div class="form-group">
                                                <label id="bueno-label-{{$key}}"></label>
                                                <!-- <input type="Number" name="bueno"style="width:100px;" class="form-control"> -->
                                                {!! Form::Number('bueno', null, ['class' => 'form-control',"style"=>"width:100px;","id"=>"bueno-".$key]) !!}
                                            </div>
                                    </div>


                                    <div class="form-inline col-sm-12">
                                            <div class="form-group">
                                                <label >Regular &nbsp;&nbsp;&nbsp;</label>
                                                {!! Form::Number('regular_1', null, ['class' => 'form-control',"style"=>"width:100px;","id"=>"regular_1-".$key]) !!}

                                                <label >&nbsp; > x > &nbsp;</label>
                                                {!! Form::Number('regular_2', null, ['class' => 'form-control',"style"=>"width:100px;","id"=>"regular_2-".$key]) !!}
                                            </div>
                                    </div>
                                    <div class="form-inline col-sm-12">
                                            <div class="form-group">
                                                <label id="bad-label-{{$key}}"></label>
                                                {!! Form::Number('malo', null, ['class' => 'form-control',"style"=>"width:100px;","id"=>"malo-".$key]) !!}
                                            </div>
                                    </div>




 
                                    {{--
                                    <div class="wrapper">
                                        <div class="limit-1 limit-1-{{$key}}">
                                            <input type="text" readonly style="width:100px" class="form-control" id="number-min" value="0">
                                        </div>

                                        <div class="container">
                                            <div class="slider-track slider-track-{{$key}}"></div>
                                            <input type="range" min="0" max="100" value="20" id="slider-1-{{$key}}" oninput="slideOne()">
                                            <input type="range" min="0" max="100" value="40" id="slider-2-{{$key}}" oninput="slideTwo()">

                                            <div class="box-1 box-1-{{$key}}">
                                                <div class="number-1 number-1-{{$key}}">50</div>
                                            </div>

                                            <div class="box-2 box-2-{{$key}}">
                                                <div class="number-2 number-2-{{$key}}">50</div>
                                            </div>

                                        </div>

                                        <div class="limit-2 limit-2-{{$key}}">    
                                            <input type="text"  onKeyUp="val()" id="number-max-{{$key}}"style="width:100px" class="form-control" value="100">
                                        </div>
                                    </div>
                                    --}}


                                    <script  type="text/javascript">



                                    var formula = '<?php echo $controlOfQualityObjectives->formula; ?>';

                                    var key = '<?php echo $key; ?>';

                                    var bueno = '<?php echo $controlOfQualityObjectives->bueno; ?>';
                                    var regular_1 = '<?php echo $controlOfQualityObjectives->regular_1; ?>';
                                    var regular_2 = '<?php echo $controlOfQualityObjectives->regular_2; ?>';
                                    var malo = '<?php echo $controlOfQualityObjectives->malo; ?>';

                                    ((bueno == 0)? document.getElementById("bueno-"+key).value = regular_2:"");

                                    if(bueno == 0){

                                        document.getElementById("bueno-"+key).value = regular_1;
                                        document.getElementById("bueno-label-"+key).innerHTML = " Bueno <=";
                                        document.getElementById("malo-"+key).value = regular_2;
                                        document.getElementById("bad-label-"+key).innerHTML = " Malo >=";


                                    }else{

                                        document.getElementById("bueno-"+key).value = regular_2;
                                        document.getElementById("bueno-label-"+key).innerHTML = " Bueno >=";
                                        document.getElementById("malo-"+key).value = regular_1;
                                        document.getElementById("bad-label-"+key).innerHTML = "Malo <=";

                                    }


                                    //document.getElementById("bueno-"+key).value = bueno;
                                    document.getElementById("regular_1-"+key).value = regular_1;
                                    document.getElementById("regular_2-"+key).value = regular_2;
                                    //document.getElementById("malo-"+key).value = malo;


                                    var sliderOne = document.getElementById("slider-1-"+key);
                                    var sliderTwo = document.getElementById("slider-2-"+key);
                                    var minGap = 0;
                                    var sliderTrack = document.querySelector(".slider-track-"+key);
                                    var sliderMaxValue = document.getElementById("slider-1-"+key).max;
                                    var box_1 = document.querySelector(".box-1-"+key);
                                    var number_1 = document.querySelector(".number-1-"+key);

                                    var box_2 = document.querySelector(".box-2-"+key);
                                    var number_2 = document.querySelector(".number-2-"+key);
                                    var number_max = document.getElementById("number-max-"+key);

                                    var red = "#c8422d";
                                    var green = "#0ea70e";
                                    var percent1 = 0;
                                    var percent2 = 0;

                                    slideOne();
                                    slideTwo();


                                    function slideOne(){
                                        if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
                                            sliderOne.value = parseInt(sliderTwo.value) - minGap;
                                        }
                                        fillColor();
                                    }
                                    function slideTwo(){
                                        if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
                                            sliderTwo.value = parseInt(sliderOne.value) + minGap;
                                        }
                                        fillColor();
                                    }
                                    function fillColor(){
                                        
                                        
                                        var is_percentage = false;
                                        var r = ((formula == 1 ) ? customize_bar_values(red,green,is_percentage = true): "")
                                        var r = ((formula == 2 ) ? customize_bar_values(green,red,is_percentage = true): "")
                                        var r = ((formula == 3 ) ? customize_bar_values(red,green,is_percentage = false): "")
                                        var r = ((formula == 4 ) ? customize_bar_values(green,red,is_percentage = false): "")

                                    }

                                    function customize_bar_values(data_1,data_2,is_percentage){

                                    var sliderMaxValue = document.getElementById("slider-1-"+key).max;
                                    var sliderOne = document.getElementById("slider-1-"+key);
                                    var sliderTwo = document.getElementById("slider-2-"+key);

                                        if(is_percentage){

                                            number_max.setAttribute("readonly", "readonly");
                                            number_max.value = "100";


                                            sliderOne.setAttribute("max", number_max.value);
                                            sliderTwo.setAttribute("max", number_max.value);


                                            sliderMaxValue = number_max.value;
                                            percent1 = (sliderOne.value / sliderMaxValue) * 100;
                                            percent2 = (sliderTwo.value / sliderMaxValue) * 100;

                                            box_1.style.left = (Math.trunc(percent1) - 2)+ '%';
                                            number_1.textContent = Math.trunc(percent1);

                                            box_2.style.left = (Math.trunc(percent2) - 4)+ '%';
                                            number_2.textContent = Math.trunc(percent2);

                                        }else{

                                            number_max.removeAttribute("readonly");

                                            sliderMaxValue = number_max.value;
                                            percent1 = (sliderOne.value / sliderMaxValue) * 100;
                                            percent2 = (sliderTwo.value / sliderMaxValue) * 100;

                                            box_1.style.left = (Math.trunc(percent1) - 2)+ '%';
                                            number_1.textContent = sliderOne.value;


                                            box_2.style.left = (Math.trunc(percent2) - 4)+ '%';
                                            number_2.textContent = sliderTwo.value;

                                        }
                                        sliderTrack.style.background = `linear-gradient(to right, ${data_1} ${percent1}% , #ceca40 ${percent1}% , #ceca40 ${percent2}%, ${data_2} ${percent2}%)`;
                                    
                                    }
                                    function val() {
                                        var d = '<?php echo $controlOfQualityObjectives->formula; ?>';

                                        //var d = document.getElementById("formula").value;

                                        var number_max = document.getElementById("number-max-"+key);
                                        

                                        var sliderMaxValue = document.getElementById("slider-1-"+key).max;
                                        var sliderOne = document.getElementById("slider-1-"+key);
                                        var sliderTwo = document.getElementById("slider-2-"+key);
                                        sliderOne.setAttribute("max", number_max.value);
                                        sliderTwo.setAttribute("max", number_max.value);
                                        sliderOne.value = 0;
                                        sliderTwo.value = number_max.value;
                                        fillColor()
                                    }



                                    var good = '<?php echo $controlOfQualityObjectives->bueno; ?>';
                                    var regular_1 = '<?php echo $controlOfQualityObjectives->regular_1; ?>';
                                    var regular_2 = '<?php echo $controlOfQualityObjectives->regular_2; ?>';
                                    var bad = '<?php echo $controlOfQualityObjectives->malo; ?>';

                                    var slider_1 = document.getElementById("slider-1-"+key);
                                    var slider_2 = document.getElementById("slider-2-"+key);
                                    var number_max = document.getElementById("number-max-"+key);


                                    slider_1.setAttribute("value",((regular_1 != "")? regular_1: 20));
                                    slider_2.setAttribute("value",((regular_2 != "")? regular_2: 60));
                                    slider_1.setAttribute("max",((good != 0) ? good: bad));
                                    slider_2.setAttribute("max",((good != 0) ? good: bad));
                                    number_max.setAttribute("value",((good != 0) ? good: bad));
                                    document.querySelector(".number-1-"+key).innerHTML = regular_1;
                                    document.querySelector(".number-2-"+key).innerHTML = regular_2;




                                </script>





                                    </div>


                                    <div class="form-group col-sm-6">
                                        {!! Form::label('status_to_date', 'Estado hasta la fecha:') !!}
                                        {!! Form::text('status_to_date', $controlOfQualityObjectives->status_to_date, ['class' => 'form-control',"readonly"=>"readonly"]) !!}
                                    </div>
                                        
                                    
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('responsible_for_providing_data', 'Responsable de brindar datos:') !!}
                                        {!! Form::text('status_to_date', json_encode(unserialize($controlOfQualityObjectives->responsible_for_providing_data)), ['class' => 'form-control',"readonly"=>"readonly"]) !!}
                                    </div>

                                        
                                



                                
                            {!! Form::label('effectiveness_verification', 'Planificación de actividades para el logro de objetivos:') !!}
      

                                <div class="form-group col-sm-12 tbl_posts">


                                {!! Form::text('activities', null, ['class' => 'form-control',"readonly"=>"readonly","style"=>"display:none","id"=>"activities"]) !!}



                                <div style="display:none;">
                                    <table id="sample_table-{{$key}}" class="">
                                    <tr id="" class="custom-row" style="height:2px;">
                                    <td  style="max-width:1px;padding:5px;"><span class="sn"></span>.</td>
                                    <td class="actividades custom-td" style="max-width:30px;padding:5px;" contenteditable>test</td>
                                    <td class="recursos custom-td" style="max-width:30px;padding:5px;" contenteditable>test</td>
                                    <td class="responsable volunteer custom-td" style="max-width:20px;padding:5px;" >
                                    <td class="plazo custom-td" style="max-width:40px;padding:5px;"><input style="min-width:20px;"type="date" class="datepick" /></td>
                                    <td class="verificacion custom-td" style="max-width:20px;min-height:30px;padding:5px;" contenteditable>test</td>

                                
                                    
                                        
                                    </tr>
                                    </table>
                                </div>




                                <table class="table table-striped " id="tbl_posts" style="min-width:900px;" >
                                
                                    <thead>
                                        <th style="min-width:1px;">#</th>
                                        <th class="actividades"   style="min-width:30px;overflow-y: auto;height:40px;">Actividades</th>
                                        <th class="recursos"   style="min-width:30px;">Recursos</th>
                                        <th class="responsable"   style="width:25px;">Responsable</th>
                                        <th class="plazo"   style="min-width:30px;">Plazo</th>
                                        <th class="verificacion"   style="min-width:30px;">Verificación de eficacia </th>
                                    
                                    </thead>

                                    <tbody id="tbl_posts_body-{{$key}}">
                                    </tbody>

                                </table>


<script  type="text/javascript">

$("tr.custom-row").each(function() {


var jsonData = '<?php echo $controlOfQualityObjectives->activities; ?>';
var jsonData = JSON.parse(jsonData);
var users = '<?php echo $users; ?>';
var users = JSON.parse(users);
var index2 = '<?php echo $key; ?>';



var select = `<select class="js-example-basic-multiple" name="states[]" multiple="multiple">`;

for(var index in users) {

    select += `<option value="`+users[index]["name"]+`">`+users[index]["name"]+`</option>`

}   

select += `</select>`;

for(var key in jsonData) {

    var actividades = jsonData[key]["actividades"];
    var recursos = jsonData[key]["recursos"];
    var responsable = jsonData[key]["responsable"];
    var plazo = jsonData[key]["plazo"];
    var verificacion = jsonData[key]["verificacion"];

    var content = jQuery('#sample_table-'+index2+' tr');
    var size = key;
    var element = null;
    element = content.clone();
    element.find("td.actividades").empty();
    element.find("td.recursos").empty();
    element.find("td.responsable").empty();
    element.find("td.plazo").empty();
    element.find("td.verificacion").empty();
    element.find("td.actividades").append(actividades);
    element.find("td.recursos").append(recursos);
    element.find("td.responsable").append(JSON.stringify(responsable));
    element.find("td.plazo").append(`<input style="width:95px;" type="date" class="datepicks" />`);
    element.find("td.plazo").find("input").val(plazo); 
    element.find("td.verificacion").append(verificacion);
    element.attr('id', size);
    //element.find('.delete-record').attr('data-id', size);
    element.appendTo('#tbl_posts_body-'+index2);
    element.find('.sn').html(size);

}
});




</script>


                                </div>
                                <br>
                                <br>
                                <br>
                                ------------------------END-----------------------
                                <br>
                                <br>      
                                @endforeach

  </div>
</div>
 
</body>
 

</html>


 
<script type="text/javascript">
 

 //$(document).ready(function() {
    
  
    //var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    //var month = today.toLocaleDateString('es-ES', options);
    //$('#r').val(today);
    
   
 

    //});
</script>

<style>


.form_wrapper {
	/*background: #fff; */
	width: 400px;
	max-width: 100%;
	box-sizing: border-box;
	padding: 5px;
	margin: 2%;
	position: relative;
	z-index: 1; 
    /* opacity: 0; */
}
.form_container {
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0,0,0, 0.3);
    width: 400px;
}
.form_container input{
    border: 2px solid  #f0f0f0;
    border-radius: 4px;
    width: 100%;
    padding: 10px;
    font-size: 11px;
}
body {
    font-family:'Open Sans',sans-serif;
    font-size: 11px;
	background: #f2f2f2;
}
/*
label {
        font-size: 11px;
    }
  */      
     




  .wrapper{
        position: relative;
        width: 95vmin;
        background-color: #ffffff;
        padding: 50px 40px 20px 40px;
        border-radius: 10px;
    }
    .container{
        position: relative;
        width: 100%;
        height: 100px;
        margin-top: 30px;
    }
    input[type="range"]{
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 100%;
        outline: none;
        position: absolute;
        margin: auto;
        top: 0;
        bottom: 0;
        background-color: transparent;
        pointer-events: none;
    }
    .slider-track{
        width: 100%;
        height: 5px;
        position: absolute;
        margin: auto;
        top: 0;
        bottom: 0;
        border-radius: 5px;
    }
    input[type="range"]::-webkit-slider-runnable-track{
        -webkit-appearance: none;
        height: 5px;
    }
    input[type="range"]::-moz-range-track{
        -moz-appearance: none;
        height: 5px;
    }
    input[type="range"]::-ms-track{
        appearance: none;
        height: 5px;
    }
    input[type="range"]::-webkit-slider-thumb{
        -webkit-appearance: none;
        height: 1.7em;
        width: 1.7em;
        background-color: #3264fe;
        cursor: pointer;
        margin-top: -9px;
        pointer-events: auto;
        border-radius: 50%;
    }
    input[type="range"]::-moz-range-thumb{
        -webkit-appearance: none;
        height: 1.7em;
        width: 1.7em;
        cursor: pointer;
        border-radius: 50%;
        background-color: #3264fe;
        pointer-events: auto;
    }
    input[type="range"]::-ms-thumb{
        appearance: none;
        height: 1.7em;
        width: 1.7em;
        cursor: pointer;
        border-radius: 50%;
        background-color: #3264fe;
        pointer-events: auto;
    }
    input[type="range"]:active::-webkit-slider-thumb{
        background-color: #0ea70e;
        border: 3px solid #21d8c0;
    }
    .values{
        background-color: #3264fe;
        width: 32%;
        position: relative;
        margin: auto;
        padding: 10px 0;
        border-radius: 5px;
        text-align: center;
        font-weight: 500;
        font-size: 25px;
        color: #ffffff;
    }
    .values:before{
        content: "";
        position: absolute;
        height: 0;
        width: 0;
        border-top: 15px solid #3264fe;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        margin: auto;
        bottom: -14px;
        left: 0;
        right: 0;
    }
    .box-1 {
        position:absolute;
        top: -65px;
        height: 50px;
        width: 50px;
        background-color: #3264fe;
        box-shadow: 0px 0px 10px #ccc;
        color: #ffffff;
        border-radius: 50% 50% 0% 50%;
        transform: rotateZ(45deg);
    }
    .box-1 .number-1{
        transform: rotateZ(-45deg);
        text-align: center;
        line-height: 50px;
        font-family: Verdana;

    }

    .box-2 {
        position:absolute;
        top: -65px;
        height: 50px;
        width: 50px;
        background-color: #3264fe;
        box-shadow: 0px 0px 10px #ccc;
        color: #ffffff;
        border-radius: 50% 50% 0% 50%;
        transform: rotateZ(45deg);
    }
    .box-2 .number-2{
        transform: rotateZ(-45deg);
        text-align: center;
        line-height: 50px;
        font-family: Verdana;

    }

    .limit-1{

        position:absolute;
        top: 65px;
        height: 50px;
        width: 50px;
        color: #ffffff;
        
    }
    .limit-2{
     
        position:absolute;
        top: 75px;
        left: 575px;

        height: 50px;
        width: 50px;
        color: #ffffff;

    }



    .custom-table{
        border: 2px solid #6d6d6f;
        border-radius:10px;
        width: 500px;
        height: 250px;
        padding:10px;
        overflow-y: auto;
    }
    .tbl_posts{
        border: 2px solid #6d6d6f;
        border-radius:5px;
        width: 900px;
        height: 250px;
        padding:5px;
        overflow-y: auto;
    }
 
 
    .custom-td {
        border: 1px solid black;
        max-width: 60px;
        word-wrap: break-word;
    }



</style>