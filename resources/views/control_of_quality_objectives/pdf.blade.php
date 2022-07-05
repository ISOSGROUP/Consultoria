<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  
</head>

<body>
 

<div class="form_wrapper">

@php


     
    
@endphp


                                <br>
                            <div class="form-control">
                                <label for="">PERÍODO DE INFORMACIÓN: ANUAL</label>
                                <br>
                                <label id="date"></label>
                                <br>
                                <label for="">MODULO: CONTROL DE OBJETIVOS</label>
                                <br>
                            </div>

  <div class="form_container">

  
                            @php
                                $measurement_frequency = ["1"=>"Mensual","2"=>"Bimestral","3"=>"Trimestral","4"=>"cuatrimestre","6"=>"Semestral","12"=>"Anual"];
                                $formula = ["1"=> " ⬆ (N eventos ejecutados * 100) / N eventos programados ","2"=>" ⬇ (N eventos ejecutados * 100) / N eventos programados","3"=>" ⬆ Conteo de N eventos","4"=>" ⬇ Conteo de N eventos"];

                            @endphp

                           
                            
                                    @foreach($controlOfQualityObjectives as $key => $controlOfQualityObjectives)
                                    
                                    <br>
                                    <div class="form-group col-sm-12 col-lg-12">
                                        {!! Form::label('quality_politics', 'Política de Calidad:') !!}
                                        <br>
                                        {!! Form::textarea('quality_politics', $controlOfQualityObjectives->quality_politics, ['class' => 'form-control textarea']) !!}
                                        <br>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-12">
                                        {!! Form::label('objectives', 'Objetivos:') !!}
                                        <br>
                                        {!! Form::textarea('objectives', $controlOfQualityObjectives->objectives, ['class' => 'form-control textarea_field textarea']) !!}
                                        <br>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-12">
                                        {!! Form::label('indicator', 'Indicador:') !!}
                                        <br>
                                        {!! Form::text('indicator',  $controlOfQualityObjectives->indicator, ['class' => 'form-control input']) !!}
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-5">
                                        {!! Form::label('formula', 'Formula:') !!}
                                        <br>

                                        {!! Form::text('formula', $formula[$controlOfQualityObjectives->formula], ['class' => 'form-control input','id'=>'formula','onchange'=>"val()"]) !!} 
                                        <br>
                                    
                                    </div>
                                            
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('measurement_frequency', 'Frecuencia de medición:') !!}
                                        <br>
                                        {!! Form::text('measurement_frequency',$measurement_frequency[$controlOfQualityObjectives->measurement_frequency], ['class' => 'form-control input','empty'=>'Seleccionar','id'=>'measurement_frequency']) !!}
                                        <br>
                                    </div>    
                                            

                                    <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

                                   <!--  <script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script> -->


                                    <div class="form-group custom-table">
                                        <table class="table table-striped " id="dataTable-{{$key}}" >
                                        </table>

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
                                        document.getElementById("bueno-label-"+key).innerHTML = "Bueno <=";
                                        document.getElementById("malo-"+key).value = regular_2;
                                        document.getElementById("bad-label-"+key).innerHTML = "Malo >=";


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

                                </script>





                                    </div>


                                    <div class="form-group col-sm-6">
                                        {!! Form::label('status_to_date', 'Estado hasta la fecha:') !!}
                                        {!! Form::text('status_to_date',null, ['class' => 'form-control',"readonly"=>"readonly","id"=>"status_to_date-".$key]) !!}
                                    </div>
                                        
                                    
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('responsible_for_providing_data', 'Responsable de brindar datos:') !!}
                                        {!! Form::text('responsible_for_providing_data', json_encode(unserialize($controlOfQualityObjectives->responsible_for_providing_data)), ['class' => 'form-control input',"readonly"=>"readonly","id"=>"responsible_for_providing_data-".$key]) !!}
                                    </div>

                                        
                                



                                    <script type="text/javascript">

    document.getElementById("date").innerHTML = "";

    var today = new Date();
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var str = "FECHA DE ENVIO: "+today.toLocaleDateString('es-ES', options)
    document.getElementById("date").innerHTML = str.toUpperCase();

    var key = '<?php echo $key; ?>';

    console.log("key: "+key);
    var pocentaje = '<?php echo $controlOfQualityObjectives->status_to_date; ?>';
    $('#status_to_date-'+key).val(pocentaje+"%");

    var responsible_for_providing_data = '<?php echo json_encode(unserialize($controlOfQualityObjectives->responsible_for_providing_data)); ?>';
    $('#responsible_for_providing_data-'+key).val(JSON.parse(responsible_for_providing_data));


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



        var today = new Date();
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


        month_list.forEach(function (value, index) {
            
            if(value.toString().indexOf(month) !== -1){

                flat = true;
            }


            if(flat && (!flat2)){
                //console.log(index-1);
                flat2 = true;
                periodo = index-1;
                
                periodo = ((periodo < 0) ? 0: periodo);
                //console.log(periodo);
                //console.log(formula);
                data_1 = ((monthlist[value] != undefined)? monthlist[month_list[periodo]].toString().split(',')[0]:"");
                data_2 = ((monthlist[value] != undefined)? monthlist[month_list[periodo]].toString().split(',')[1]:"");


                if(formula == 1 ||  formula == 2){

                    pocentaje = ((data_1 == 0) ? 0: ((data_2 * 100)/data_1));
                    //console.log("pocentaje :"+pocentaje);
                    //$('#status_to_date-'+key).val(pocentaje);
                    //document.getElementById("status_to_date-"+key).value = pocentaje;

                }else{
                    pocentaje = data_1;
                    //$('#status_to_date').val(pocentaje);
                    //$('#status_to_date-'+key).val(pocentaje);


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
                        
                        });

        document.getElementById("dataTable-"+key).innerHTML = tbody;
 
    }

        </script>



                                
                            {!! Form::label('effectiveness_verification', 'Planificación de actividades para el logro de objetivos:') !!}
      

                                <div class="form-group col-sm-12 tbl_posts" style="width:700px;">


                                {!! Form::text('activities', null, ['class' => 'form-control',"readonly"=>"readonly","style"=>"display:none","id"=>"activities"]) !!}



                                <div style="display:none;">
                                    <table id="sample_table-{{$key}}" class="" >
                                    <tr id="" class="custom-row-{{$key}}" style="height:2px;">
                                    <td  style="max-width:1px;padding:5px;"><span class="sn"></span>.</td>
                                    <td class="actividades custom-td" style="max-width:30px;padding:5px;" contenteditable>test</td>
                                    <td class="recursos custom-td" style="max-width:30px;padding:5px;" contenteditable>test</td>
                                    <td class="responsable volunteer custom-td" style="max-width:20px;padding:5px;" >
                                    <td class="plazo custom-td" style="max-width:40px;padding:5px;"><input style="min-width:20px;"type="date" class="datepick" /></td>
                                    <td class="verificacion custom-td" style="max-width:20px;min-height:30px;padding:5px;" contenteditable>test</td>

                                
                                    
                                        
                                    </tr>
                                    </table>
                                </div>




                                <table class="table table-striped tbl_posts mytable" id="tbl_posts" style="width:700px;" >
                                
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

    var index2 = '<?php echo $key; ?>';



    var jsonData = '<?php echo $controlOfQualityObjectives->activities; ?>';
        var jsonData = JSON.parse(jsonData);
        var users = '<?php echo $users; ?>';
        var users = JSON.parse(users);

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
            //element.find("td.plazo").append(`<input style="width:95px;" type="date" class="datepicks" />`);
            //element.find("td.plazo").find("input").val(plazo);
            element.find("td.plazo").append(plazo); 
            element.find("td.verificacion").append(verificacion);
            element.attr('id', size);
            element.appendTo('#tbl_posts_body-'+index2);
            element.find('.sn').html(size);



        }




/*
    $("tr.custom-row-"+index2).each(function() {


        

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
            element.appendTo('#tbl_posts_body-'+index2);
            element.find('.sn').html(size);

        }
    });

*/
   




</script>


                                </div>
                                <br>
                                <br> 
                                <br>      
                                <br>
                                <br>      
                                <br>

                                @endforeach

                                      
     


  </div>
</div>
 
</body>
 

</html>

 
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
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0, 0.3);
        width: 900px;
        
    }
    .form_container input{
        /* border: 2px solid  #f0f0f0; */
        border-radius: 4px;
        /* width: 50px; */
        margin: 10px;
        font-size: 11px;
    }
    body {
        font-family:'Open Sans',sans-serif;
        font-size: 11px;
        background: #f2f2f2;
    }
    .textarea{
        width: 800px;

    }
    .cell{

    }
    .input{
        width: 500px;

    }
/*
label {
        font-size: 11px;
    }
  */      
     




  

    .custom-table{
        border: 2px solid #6d6d6f;
        border-radius:10px;
        width: 500px;
        height: 250px;
        padding:10px;
        overflow-y: auto;
    }
    .tbl_posts{
       /*  border: 1px solid #6d6d6f; */
        border-radius:5px;
        width: 900px;
        height: 250px;
        padding:5px;
        border-collapse: collapse;


    }
 
 
    .custom-td {
        /* border: 1px solid black; */
        max-width: 60px;
        word-wrap: break-word;
    }

    .mytable {
        border-collapse: collapse;
        margin: 10px 0;
        font-size: 0.8em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .mytable thead tr {
        background-color: #1d97c3;
        color: #ffffff;
        text-align: left;
    }

    .mytable th,
    .mytable td {
        padding: 12px 15px;

    }

    .mytable tbody tr {
        border-bottom: 1px solid #dddddd;

    }

    .mytable tbody tr {
        background-color: #f3f3f3;
    }



</style>