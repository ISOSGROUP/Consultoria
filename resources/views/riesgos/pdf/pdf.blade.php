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
                        name="risk_chance_radio"  value="R" {{ ($riesgos->risk_chance_radi == "R") ? 'checked' : '' }}>
                        <label for="contactChoice1">riesgo</label>

                        <input type="radio" id="contactChoice2"
                        name="risk_chance_radio" value="O" {{ ($riesgos->risk_chance_radi == "O") ? 'checked' : '' }}>
                        <label for="contactChoice2">oportunidad</label>
                    </div>

                    {!! Form::text('risk_chance_text', $riesgos->risk_chance_text, ['class' => 'form-control']) !!}

                </div>

                <script type="text/javascript">

                    var key = '<?php echo $key; ?>';

                    document.getElementById("contactChoice1-"+key).setAttribute("checked","true");

                </script>


                <!-- Process Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('process', 'Proceso:') !!}
                    {!! Form::text('process', $riesgos->process, ['class' => 'form-control']) !!}
                </div>

                <!-- Probability Field -->
                <div class="form-group col-sm-6">
                    
                    {!! Form::label('probability', 'Probabilidad:') !!}
                    <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="info_probability" ></i>
                    {!! Form::text('probability', $probability[$riesgos->probability], ['class' => 'form-control','empty'=>'Seleccionar','autocomplete'=>'off','id'=>'probability']) !!}
                    
                    <div class="form-group">
                        <table id="mytable" class="mytable">
                        </table>
                    </div>

                </div>

                <!-- Probability Field -->
                <div class="form-group col-sm-6">

                    {!! Form::label('impact', 'Impacto:') !!}
                    <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="info_impact" ></i>

                    {!! Form::text('impact', $impact[$riesgos->impact], ['class' => 'form-control','empty'=>'Seleccionar','autocomplete'=>'off','id'=>'impact']) !!}


                    <div class="form-group">
                        <table id="impact-table" class="mytable">
                        </table>
                    </div>
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
                <!--  {!! Form::text('foda_reference', null, ['class' => 'form-control','id'=>'foda_reference']) !!} -->

                    <table class="table table-striped" id="dataTable" >
                        <thead>
                            <th id="theadCol1" scope="col" width="1%">Fortalezas</th>
                            <th id="theadCol2" scope="col" width="1%">Debilidades</th>
                            <th id="theadCol1" scope="col" width="1%">Oportunidades</th>
                            <th id="theadCol2" scope="col" width="1%">Amenazas</th>
                        </thead>
                        
                    </table>
                                            
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
                    <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="info_is_effective" ></i>

                    <div>
                        <input type="radio" id="is_effective_1"
                        name="is_effective" value="SI" {{ ($riesgos->is_effective == "SI") ? 'checked' : '' }}>
                        <label for="is_effective_1">SI</label>

                        <input type="radio" id="is_effective_2"
                        name="is_effective" value="NO" {{ ($riesgos->is_effective == "NO") ? 'checked' : '' }}>
                        <label for="is_effective_2">NO</label>
                    </div>

                    <br>

                    {!! Form::label('Expectations', 'Comentario eficacia:') !!}
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
        border: 1px solid black;
        max-width: 60px;
        word-wrap: break-word;
    }



</style>