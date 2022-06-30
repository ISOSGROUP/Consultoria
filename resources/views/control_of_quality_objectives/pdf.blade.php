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
                                <label id="date">FECHA DE ENVIO:</label>
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

                           
                            
                                    @foreach($controlOfQualityObjectives as $controlOfQualityObjectives)


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
                                            
                                    <!-- <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  -->


                                   <!--  <script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script> -->


                                    <div class="form-group custom-table">
                                        <table class="table table-striped" id="dataTable" >
                                        </table>

        <script type="text/javascript">

                 
         
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

            //$('#dataTable').append(thead);
            document.getElementById("dataTable").innerHTML = thead;

            

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

            console.log("month_list: " + month_list);
            
            month_list.map((value , index) => {


                (value.toString().includes(month) ? flat = true: null);

                if(flat && (!flat2)){
                    //console.log(index-1);
                    flat2 = true;
                    periodo = index-1;
                    //console.log(month_list[periodo]);
                    //console.log(formula);
                    data_1 = ((monthlist[value] != undefined)? monthlist[month_list[periodo]].toString().split(',')[0]:"");
                    data_2 = ((monthlist[value] != undefined)? monthlist[month_list[periodo]].toString().split(',')[1]:"");


                    if(formula == 1 ||  formula == 2){

                        pocentaje = ((data_2 * 100)/data_1);
                        //$('#status_to_date').val(pocentaje);

                    }else{
                        pocentaje = data_1;
                        //$('#status_to_date').val(pocentaje);

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

            //$('#dataTable').append(tbody);
            document.getElementById("dataTable").innerHTML = tbody;



        }
        
        </script>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('goals', 'Meta:') !!}
                                        {!! Form::text('goals',$controlOfQualityObjectives->goals, ['class' => 'form-control']) !!}
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
                                    <table id="sample_table">
                                    <tr id="" class="custom-row" style="height:2px;">
                                    <td  style="max-width:1px;padding:5px;"><span class="sn"></span>.</td>
                                    <td class="actividades" style="max-width:30px;padding:5px;" contenteditable>test</td>
                                    <td class="recursos" style="max-width:30px;padding:5px;" contenteditable>test</td>
                                    <td class="responsable volunteer " style="max-width:20px;padding:5px;" >
                                    <td class="plazo" style="max-width:30px;padding:5px;"><input type="date" class="datepick" /></td>
                                    <td class="verificacion" style="max-width:20px;min-height:30px;padding:5px;" contenteditable>test</td>

                                
                                    <td >
                                        <div class="input-group-prepend">
                                            <a class="btn btn-xs delete-record" data-id="0"> <i class="fa fa fa-trash fa-lg"></i></a>
                                        </div>
                                    </td>
                                        
                                    </tr>
                                    </table>
                                </div>




                                <table class="table table-striped " id="tbl_posts" style="min-width:1100px;" >
                                
                                    <thead>
                                        <th style="min-width:1px;">#</th>
                                        <th class="actividades"   style="min-width:30px;overflow-y: auto;height:40px;">Actividades</th>
                                        <th class="recursos"   style="min-width:30px;">Recursos</th>
                                        <th class="responsable"   style="width:25px;">Responsable</th>
                                        <th class="plazo"   style="min-width:30px;">Plazo</th>
                                        <th class="verificacion"   style="min-width:30px;">Verificación de eficacia </th>
                                        <th class="action"  style="width:10px"style="min-width:30px;display:none">Action</th>
                                    
                                    </thead>

                                    <tbody id="tbl_posts_body">
                                    </tbody>

                                </table>

                                </div>
                                        
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
     
</style>