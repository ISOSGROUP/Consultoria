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

                                    <br>
                                <div class="form-control">
                                    <label for="">PERÍODO DE INFORMACIÓN: ANUAL</label>
                                    <br>
                                    <label id="date"></label>
                                    <br>
                                    <label for="">MODULO: RIESGOS</label>
                                    <br>
                                </div>

        <div class="form_container">


        


            @foreach($riesgos as $key => $riesgos)

            
                @php

                    $probability = ["0"=>"Elevado","1"=>"Medio","2"=>"Bajo"];
                    $impact = ["0"=>"Bajo","1"=>"Medio","2"=>"Alto"];
                    $tracking_status = ["Abierto"=>"Abierto","Cerrado"=>"Cerrado"];

                @endphp

                <!-- Process Field -->
                <br>
                <br>
                <div class="form-group col-sm-6">
                
                    <div>
                    
                        <input type="radio" id="contactChoice1-{{$key}}"
                        name="risk_chance_radio1" value="R" {{ ($riesgos->risk_chance_radio == "R") ? 'checked' : '' }}>
                        <label for="contactChoice1">riesgos</label>

                        <input type="radio" id="contactChoice2-{{$key}}"
                        name="risk_chance_radio2" value="O" {{ ($riesgos->risk_chance_radio == "O") ? 'checked' : '' }}>
                        <label for="contactChoice2">oportunidad</label>

                    </div>

                    {!! Form::text('risk_chance_text', $riesgos->risk_chance_text, ['class' => 'form-control']) !!}

                </div>

                <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

                <script type="text/javascript">

                $(document).ready(function() {


                    var key = '<?php echo $key; ?>';

                    //$("#contactChoice1-"+key).attr( 'checked', true )
                    //$("#contactChoice22").attr( 'checked', true )
                    
                });

                </script>


                <!-- Process Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('process', 'Proceso:') !!}
                    {!! Form::text('process', $riesgos->process, ['class' => 'form-control']) !!}
                </div>

                <!-- Probability Field -->
                <div class="form-group col-sm-6">
                    
                    {!! Form::label('probability', 'Probabilidad:') !!}
                    {!! Form::text('probability', $probability[$riesgos->probability], ['class' => 'form-control','empty'=>'Seleccionar','autocomplete'=>'off','id'=>'probability']) !!}
                    
                    

                </div>

                <!-- Probability Field -->
                <div class="form-group col-sm-6">

                    {!! Form::label('impact', 'Impacto:') !!}
                    {!! Form::text('impact', $impact[$riesgos->impact], ['class' => 'form-control','empty'=>'Seleccionar','autocomplete'=>'off','id'=>'impact']) !!}


                     
                </div>

                <!-- Risk Level Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('risk_level', 'Nivel de riesgo:') !!}
                    {!! Form::text('risk_level', $riesgos->risk_level, ['class' => 'form-control',"readonly"=>"readonly",'id'=>'risk_level']) !!}
                </div>

                <!-- Interested Part Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('interested_part', 'Partes Interesadas:') !!}
                    {!! Form::text('interested_part', json_encode(unserialize($riesgos->interested_part)), ['class' => 'form-control',"readonly"=>"readonly",'id'=>'interested_part']) !!}

                </div>

                <!-- Foda Reference Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('foda_reference', 'Foda Referencia:') !!}

                <table class="table table-striped mytable" id="dataTable-{{$key}}" >
                        <thead>
                            <th id="theadCol1" scope="col" width="1%">Fortalezas</th>
                            <th id="theadCol2" scope="col" width="1%">Debilidades</th>
                            <th id="theadCol1" scope="col" width="1%">Oportunidades</th>
                            <th id="theadCol2" scope="col" width="1%">Amenazas</th>
                        </thead>
                        <tbody id="tbl_posts_body">

                            <tr style="display:none">
                                <td  sytle="max-width:10px">   </td>
                                <td class="cell">ww </td>
                                <td class="cell"> ww</td>
                                <td class="cell"> ww</td>
                                <td class="cell"> ww</td>
                                <td class="cell">ww</td>
                        </tr>


                        </tbody>    


                    </table>
                        
                    






<script type="text/javascript">

    
$(document).ready(function() {
    

    var key = '<?php echo $key; ?>';

    const myArray = {};
    myArray.weaknesses = "debilidades";
    myArray.opportunities = "oportunidades";
    myArray.strengths = "fortalezas";
    myArray.threats = "amenazas";

    var weaknesses = '<?php echo $allFoda["weaknesses"]; ?>';
    var strengths = '<?php echo json_encode($allFoda["strengths"]); ?>';
    var opportunities = '<?php echo $allFoda["opportunities"]; ?>';
    var threats = '<?php echo $allFoda["threats"]; ?>';

    var largest = '<?php echo $largest; ?>';
    var checkboxList = '<?php echo json_encode(unserialize($riesgos->foda_reference)); ?>';

    for (i=0; i < largest; i++)  { 

        addRow( ((typeof JSON.parse(strengths)[i] != 'undefined')? JSON.parse(strengths)[i]:null),
                ((typeof JSON.parse(weaknesses)[i] != 'undefined')? JSON.parse(weaknesses)[i]:null),
                ((typeof JSON.parse(opportunities)[i] != 'undefined')? JSON.parse(opportunities)[i]:null),
                ((typeof JSON.parse(threats)[i] != 'undefined')? JSON.parse(threats)[i]:null)
            ,i,checkboxList);
    } 


    function addRow(element_1,element_2,element_3,element_4,index,checkboxList){

        var table = document.getElementById('dataTable-'+key);
        var rowCount = table.rows.length;
        var cellCount = 3; 
        var row = table.insertRow(rowCount);

        var json_arr = {};
        json_arr[0] =  element_1;
        json_arr[1] =  element_2;
        json_arr[2] =  element_3;
        json_arr[3] =  element_4;
        console.log(element_3)
        for(var i = 0; i <= cellCount; i++){

            var htmlLabelInput = "";
             
            if((json_arr[i] != null)){
                
                    htmlLabelInput = '<label class="label-table">'+
                                    '<input type="checkbox"  ischecked="'+((checkboxList.includes(parseInt(json_arr[i].id))) ? json_arr[i].id :"false")+'"'+
                                    'name="foda_reference['+json_arr[i].id+']"'+
                                    'class="customCheckBox"> '+myArray[json_arr[i].name].charAt(0).toUpperCase()+(index +1)+
                                    '</label>';

                    var cell = row.insertCell(i);
                    cell.innerHTML = htmlLabelInput;
                   $('[ischecked="'+json_arr[i].id+'"]').attr('checked', true);

            }else{
                row.insertCell(i);
            }
        }
    }


     



     



    
});

 
</script>



                </div>

                <!-- Action To Take Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('action_to_take', 'Acción a tomar:') !!}
                    {!! Form::text('action_to_take', $riesgos->action_to_take, ['class' => 'form-control']) !!}
                </div>

                <!-- Responsible Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('responsible', 'Responsable:') !!}
                    {!! Form::text('responsible', json_encode(unserialize($riesgos->responsible)), ['class' => 'form-control']) !!}

                </div>

                <!-- Resources Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('resources', 'Recursos:') !!}
                    {!! Form::text('resources', $riesgos->resources, ['class' => 'form-control']) !!}
                </div>

                <!-- Execution Time Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('execution_time', 'Tiempo de ejecución:') !!}
                    {!! Form::text('execution_time',$riesgos->execution_time, ['class' => 'form-control','id'=>"execution_time"]) !!}
                    
                </div>



                <!-- Responsible For Monitoring Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('responsible_for_monitoring', 'Responsable de Seguimiento:') !!}
                    {!! Form::text('responsible_for_monitoring', json_encode(unserialize($riesgos->responsible_for_monitoring)), ['class' => 'form-control']) !!}

                </div>

                <!-- Execution Time Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('tracking_status', 'Estado de seguimiento:') !!}
                    {!! Form::text('tracking_status',$riesgos->tracking_status, ['class' => 'form-control','id'=>'tracking_status']) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('Es_eficaz', 'Es eficaz:') !!}

                    <div>
                        <input type="radio" id="is_effective_1"
                        name="is_effective1" value="SI" {{ ($riesgos->is_effective == "SI") ? 'checked' : '' }}>
                        <label for="is_effective_1">SI</label>

                        <input type="radio" id="is_effective_2"
                        name="is_effective2" value="NO" {{ ($riesgos->is_effective == "NO") ? 'checked' : '' }}>
                        <label for="is_effective_2">NO</label>
                    </div>

                    <br>

                    {!! Form::label('Expectations', 'Comentario eficacia:') !!}
                    <br>

                    {!! Form::textarea('comment_on_effectiveness', $riesgos->comment_on_effectiveness, ['class' => 'form-control']) !!}
                </div>


            {{-- 
                    <td>{{ (($riesgos->risk_chance_radio == "R") ?"Riesgo": (($riesgos->risk_chance_radio == "O") ?"Oportunidad":"") ) }}</td>
                    <td>{{ $riesgos->process }}</td>
                    <td>{{ $probability[$riesgos->probability] }}</td>
                    <td>{{ $impact[$riesgos->impact] }}</td>
                    <td>{{ $riesgos->risk_level }}</td>
                    <td>{{ $riesgos->interested_part }}</td>
                    <td>{{ $riesgos->foda_reference }}</td>
                    <td>{{ $riesgos->action_to_take }}</td>
                    <td>{{ $riesgos->responsible }}</td>
                    <td>{{ $riesgos->resources }}</td>
                    <td>{{ $riesgos->execution_time }}</td>
                    <td>{{ $riesgos->responsible_for_monitoring }}</td>
                    <td>{{ $riesgos->tracking_status }}</td>
                    <td>{{ $riesgos->is_effective }}</td>
                    <td>{{ $riesgos->comment_on_effectiveness }}</td> 

                    --}}
                
            @endforeach





                                

                                            
            


        </div>
    </div>
 
</body>
 

</html>

<script type="text/javascript">

  
    document.getElementById("date").innerHTML = "";
    var today = new Date();
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var str = "FECHA DE ENVIO: "+today.toLocaleDateString('es-ES', options)
    document.getElementById("date").innerHTML = str.toUpperCase();

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
     




  

     


  .custom-td {
        border: 1px solid black;
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