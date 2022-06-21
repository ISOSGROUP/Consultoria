@php
    $measurement_frequency = ["1"=>"Mensual","2"=>"Bimestral","3"=>"Trimestral","4"=>"cuatrimestre","6"=>"Semestral","12"=>"Anual"];
    $formula = ["1"=>"(N eventos ejecutados * 100) / N eventos programados ","2"=>"Conteo de N eventos"];

@endphp

<!-- Quality Politics Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('quality_politics', 'Política de Calidad:') !!}
    {!! Form::textarea('quality_politics', null, ['class' => 'form-control']) !!}
</div>

<!-- Objectives Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('objectives', 'Objetivos:') !!}
    {!! Form::textarea('objectives', null, ['class' => 'form-control']) !!}
</div>

<!-- Indicator Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indicator', 'Indicador:') !!}
    {!! Form::text('indicator', null, ['class' => 'form-control']) !!}


  
    

   <!--  {!! Form::Number('indicatorw', null, ['class' => 'form-control',"style"=>"width:100px;"]) !!} -->

</div>


<div class="parent">
     <div id="area" class="area"></div>
     <div class="area cover"></div>
</div>


<div class="">

    <div  class="form-inline">
        <label > &nbsp;&nbsp; Cambios de rango &nbsp;</label>
        <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="info_rango" ></i>
    </div>


    <div class="form-inline col-sm-12">
            <div class="form-group">
                <label >Bueno >= &nbsp; </label>
                <!-- <input type="Number" name="bueno"style="width:100px;" class="form-control"> -->
                {!! Form::Number('bueno', null, ['class' => 'form-control',"style"=>"width:100px;"]) !!}
            </div>
    </div>

    <div class="form-inline col-sm-12">
            <div class="form-group">
                <label >Regular &nbsp;&nbsp;&nbsp;</label>
                {!! Form::Number('regular_1', null, ['class' => 'form-control',"style"=>"width:100px;"]) !!}

                <label >&nbsp; > x > &nbsp;</label>
                {!! Form::Number('regular_2', null, ['class' => 'form-control',"style"=>"width:100px;"]) !!}


            </div>
    </div>

    <div class="form-inline col-sm-12">
            <div class="form-group">
                <label >Malo <= &nbsp; &nbsp;</label>
                {!! Form::Number('malo', null, ['class' => 'form-control',"style"=>"width:100px;"]) !!}

            </div>
    </div>


</div>

<br>

<!-- Formula Field -->
<div class="form-group col-lg-5">
    {!! Form::label('formula', 'Formula:') !!}
    {!! Form::select('formula', $formula, null, ['class' => 'form-control','id'=>'formula']) !!}
</div>

<!-- Measurement Frequency Field -->
<div class="form-group col-sm-3">
    {!! Form::label('measurement_frequency', 'Frecuencia de medición:') !!}
    <br>
    {!! Form::select('measurement_frequency', $measurement_frequency,null, ['class' => 'form-control','empty'=>'Seleccionar','id'=>'measurement_frequency']) !!}

    {!! Form::text('month_list', null, ['class' => 'form-control','style'=>'display:none']) !!}

</div>

<div class="form-group custom-table">
    <table class="table table-striped" id="dataTable" >

    {{-- 
        <thead>
            <th id="Mes" scope="col" width="1%">Mes</th>
            <th id="Incluir" scope="col" width="1%">Incluir</th>
            <th id="Eventos" scope="col" width="1%"># Eventos</th>
            <th id="Eventos-realizados" scope="col" width="1%"># Eventos realizados</th>
        </thead>
        <tr class="item">
            <td class="mes">Enero</td>
            <td>
                <input type="checkbox" 
                name="values[Enero]"
                class='rrr checkbox'

                {{ ($month_list["Enero"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}>
            </td>
            <td>
                <input type="Number" 
                name="values[Enero,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Enero"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Enero,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Enero"][2] }}">
            </td>

        </tr>
        <tr class="item">
            <td class="mes">Febrero</td>
            <td>
                <input type="checkbox" 
                name="values[Febrero]"
                class='rrr checkbox'
                {{ ($month_list["Febrero"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}
                >
            </td>
            <td>
                <input type="Number" 
                name="values[Febrero,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Febrero"][1] }}">

            </td>
            <td>
                <input type="Number" 
                name="values[Febrero,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Febrero"][2] }}">

            </td>

        </tr>
        <tr class="item">
            <td class="mes">Marzo</td>
            <td>
                <input type="checkbox" 
                name="values[Marzo]"
                class='rrr checkbox'
                {{ ($month_list["Marzo"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}
                >
            </td>
            <td>
                <input type="Number" 
                name="values[Marzo,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Marzo"][1] }}">

            </td>
            <td>
                <input type="Number" 
                name="values[Marzo,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Marzo"][2] }}">
            </td>

        </tr>

        <tr class="item">
            <td class="mes">Abril</td>
            <td>
                <input type="checkbox" 
                name="values[Abril]"
                class='rrr checkbox'
                {{ ($month_list["Abril"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}
                >
            </td>
            <td>
                <input type="Number" 
                name="values[Abril,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Abril"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Abril,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Abril"][2] }}">
            </td>

        </tr>

        <tr class="item">
            <td class="mes">Mayo</td>
            <td>
                <input type="checkbox" 
                name="values[Mayo]"
                class='rrr checkbox'
                {{ ($month_list["Mayo"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}
                >
            </td>
            <td>
                <input type="Number" 
                name="values[Mayo,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Mayo"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Mayo,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Mayo"][2] }}">
            </td>

        </tr>

        <tr class="item">
            <td class="mes">Junio</td>
            <td>
                <input type="checkbox" 
                name="values[Junio]"
                class='rrr checkbox'
                {{ ($month_list["Junio"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}
                >
            </td>
            <td>
                <input type="Number" 
                name="values[Junio,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Junio"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Junio,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Junio"][2] }}">
            </td>

        </tr>
        <tr class="item">
            <td class="mes">Julio</td>
            <td>
                <input type="checkbox" 
                name="values[Julio]"
                class='rrr checkbox'
                {{ ($month_list["Julio"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}
                >
            </td>
            <td>
                <input type="Number" 
                name="values[Julio,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Julio"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Julio,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Julio"][2] }}">
            </td>

        </tr>
        <tr class="item">
            <td class="mes">Agosto</td>
            <td>
                <input type="checkbox" 
                name="values[Agosto]"
                class='rrr checkbox'
                {{ ($month_list["Agosto"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}
                >
            </td>
            <td>
                <input type="Number" 
                name="values[Agosto,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Agosto"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Agosto,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Agosto"][2] }}">
            </td>

        </tr>

        <tr class="item">
            <td class="mes">Setiembre</td>
            <td>
                <input type="checkbox" 
                name="values[Setiembre]"
                class='rrr checkbox'
                {{ ($month_list["Setiembre"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}>
            </td>
            <td>
                <input type="Number" 
                name="values[Setiembre,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Setiembre"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Setiembre,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Setiembre"][2] }}">
            </td>

        </tr>
        <tr class="item">
            <td class="mes">Octubre</td>
            <td>
                <input type="checkbox" 
                name="values[Octubre]"
                class='rrr checkbox'
                {{ ($month_list["Octubre"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}>
            </td>
            <td>
                <input type="Number" 
                name="values[Octubre,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Octubre"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Octubre,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Octubre"][2] }}">
            </td>

        </tr>
        <tr class="item">
            <td class="mes">Noviembre</td>
            <td>
                <input type="checkbox" 
                name="values[Noviembre]"
                class='rrr checkbox'
                {{ ($month_list["Noviembre"][0] == true) 
                                                    ? 'checked'
                                                    : '' }}>
            </td>
            <td>
                <input type="Number" 
                name="values[Noviembre,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Noviembre"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Noviembre,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Noviembre"][2] }}">
            </td>

        </tr>
        <tr class="item">
            <td class="mes">Diciembre</td>
            <td>
                <input type="checkbox" 
                name="values[Diciembre]"
                class='rrr checkbox'
                {{ ($month_list["Diciembre"][0] == true) 
                                                    ? 'checked'
                                                    : '' }} >
            </td>
            <td>
                <input type="Number" 
                name="values[Diciembre,data_1]"
                class='form-control data-1'
                value="{{ $month_list["Diciembre"][1] }}">
            </td>
            <td>
                <input type="Number" 
                name="values[Diciembre,data_2]"
                class='form-control data-2'
                value="{{ $month_list["Diciembre"][2] }}">
            </td>

        </tr>

                --}}


    </table>

</div>


<!-- Goals Field -->
<div class="form-group col-sm-6">
    {!! Form::label('goals', 'Meta:') !!}
    {!! Form::Number('goals', null, ['class' => 'form-control',"style"=>"width:100px;"]) !!}
</div>

<!-- Status To Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_to_date', 'Estado hasta la fecha:') !!}
    {!! Form::text('status_to_date', null, ['class' => 'form-control',"readonly"=>"readonly"]) !!}
</div>

<!-- Responsible For Providing Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_for_providing_data', 'Responsable de brindar datos:') !!}
    <!-- {!! Form::text('responsible_for_providing_data', null, ['class' => 'form-control']) !!} -->


    <select multiple name="responsible_for_providing_data[]" style="width:500px" class="" id="responsible_for_providing_data">
        
        @foreach($users as $key => $value)
            <option value="{{ $value->name }}">{{ $value->name }}</option>
        @endforeach 

     </select> 


</div>

<!-- Activities Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activities', 'Actividades:') !!}
    {!! Form::text('activities', null, ['class' => 'form-control']) !!}
</div>

<!-- Resources Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resources', 'Recursos:') !!}
    {!! Form::text('resources', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible', 'Responsable:') !!}
    <!-- {!! Form::text('responsible', null, ['class' => 'form-control']) !!} -->

    <select multiple name="responsible[]" style="width:500px" class="" id="responsible">
        
        @foreach($users as $key => $value)
            <option value="{{ $value->name }}">{{ $value->name }}</option>
        @endforeach 

     </select> 


</div>

<!-- Plazo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plazo', 'Plazo:') !!}
    {!! Form::text('plazo', null, ['class' => 'form-control']) !!}
</div>

<!-- Effectiveness Verification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('effectiveness_verification', 'Verificación de la eficacia:') !!}
    {!! Form::textarea('effectiveness_verification', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('controlOfQualityObjectives.index') }}" class="btn btn-secondary">Cancelar</a>
</div>

<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 


<!-- <link  href="{{ url('select2.css') }}" rel="stylesheet" />-->
<script src="{{ url('select2.js') }}"></script> 


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" />   
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>  -->


 <script type="text/javascript">

    
$(document).ready(function() {

    $("#info_rango").attr('title', '');

    //for (var key in month_list) {
       
        //var str_array1 = ((month_list[key] != undefined)? month_list[key].toString().split(',')[0]:"");
        //var str_array2 = ((month_list[key] != undefined)? month_list[key].toString().split(',')[1]:"");

       // alert(str_array2);
    //}

    function organizeTable(){


        var thead = "";
        var tbody = "";
        var formula = $('#formula').val();
        var measurement_frequency = $('#measurement_frequency').val();
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
                    ((formula == 1)? '<th>Events realizados</th>':"")
                    '</tr>'+
                '</thead>';

        $('#dataTable').append(thead);

         
        var monthlist = '<?php echo json_encode($month_list); ?>';
        var monthlist = JSON.parse(monthlist);

        month_list.map((value,index) => {

            tbody += '<tr class="item">'+
                                '<td>' + value + '</td>'+
                                '<td>' + '<input type="Number"'+
                                            'name="values['+value+',data_1]"'+
                                            'class="form-control data_1"'+ 
                                            'value="'+ ((monthlist[value] != undefined)? monthlist[value].toString().split(',')[0]:"")+'">'+
                                '</td>'+

                                ((formula == 1)? '<td>' +'<input type="Number"'+
                                            'name="values['+value+',data_2]"'+
                                        'class="form-control data_2"'+ 
                                        'value="'+ ((monthlist[value] != undefined)? monthlist[value].toString().split(',')[1]:"")+'">'+

                                '</td>' :"")
                            '</tr>';

        } );

        $('#dataTable').append(tbody);

    }
    organizeTable();

    $("#formula").change(function () {
        $("#dataTable").empty();
        organizeTable();
    });
    $("#measurement_frequency").change(function () {
        $("#dataTable").empty();
        organizeTable();
    });


    /*
    var thead = "";
    var tbody = "";
    var formula = $('#formula').val();
    var measurement_frequency = $('#measurement_frequency').val();
    var meses = "";
    
   var MONTHS = ["Enero", "Febrero", "Marzo", "April", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];


    var flat = 0; 
    var month_list = [];
    //alert(MONTHS.length);
    //alert(measurement_frequency);

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
                   ((formula == 1)? '<th>Events realizados</th>':"")
                '</tr>'+
            '</thead>';

    $('#dataTable').append(thead);

                 

        month_list.map((value,index) => {

            tbody += '<tr class="item">'+
                                '<td>' + value + '</td>'+
                                '<td>' + '<input type="Number"'+
                                            'name="values['+value+',data_1]"'+
                                            'class="form-control data_1">'+ 
                                '</td>'+

                                ((formula == 1)? '<td>' +'<input type="Number"'+
                                            'name="values['+value+',data_2]"'+
                                        'class="form-control data_2">'+ 
                                '</td>' :"")
                            '</tr>';

        } );

        $('#dataTable').append(tbody);
*/

                  /*  tbody += '<tr>'+
                                '<td>' + 'Alto '+ '</td>'+
                                '<td>' + 'El riesgo es altamente probable por la cantidad de veces que en el pasado han ocurrido '+ '</td>'+
                                '<td>' + 'La intervención es altamente probable por su pertinencia, disponibilidad de recursos y aceptabilidad '+ '</td>'+

                            '</tr>'+
                            '<tr>'+
                                '<td>' + 'Medio '+ '</td>'+
                                '<td>' + 'El riesgo es probable. Se han presentado algunas veces en el pasado '+ '</td>'+
                                '<td>' + 'La intervención es probable, si bien presenta algunas dificultades por la disponibilidad de recursos y/o aceptabilidad'+ '</td>'+


                            '</tr>'+
                            '<tr>'+
                                '<td>' + 'Bajo '+ '</td>'+
                                '<td>' + 'El riesgo es poco probable . Se han presentado pocos o casi ninguna vez en el pasado '+ '</td>'+
                                '<td>' + 'La intervención es poco probable con dificultades para llevarla a cabo '+ '</td>'+


                            '</tr>';
                            */

    //$('#dataTable').append(tbody);


    $("tr.item").each(function() {

        //var data_1 = $(this).find("input.Number").parent().siblings("td").children(".data-1");
        //var data_2 = $(this).find("input.Number").parent().siblings("td").children(".data-2");
        //data_1.attr("name","values["+nameMonth+",data_1]"); 

         
    });

    /*
    $("tr.item").each(function() {

        var data_1 = $(this).find("input.checkbox").parent().siblings("td").children(".data-1");
        var data_2 = $(this).find("input.checkbox").parent().siblings("td").children(".data-2");
        var nameMonth = $(this).find("input.checkbox").parent().siblings(".mes").text();
        var checkbox = $(this).find("input.checkbox").is(":checked");

        if (checkbox) {

            data_1.css('visibility', 'visible');
            data_2.css('visibility', 'visible');
            data_1.attr("name","values["+nameMonth+",data_1]"); 
            data_2.attr("name","values["+nameMonth+",data_2]"); 

        } else {

            data_1.css('visibility', 'hidden');
            data_2.css('visibility', 'hidden');
            data_1.removeAttr("name");
            data_2.removeAttr("name");
        }
    });
    */

    $('input[type=Number]').on('input',function(e){
        var input = $(this);
        var val = input.val();
        //console.log("lastval: "+input.data("lastval"));

        var data_1 = $(this).parent().siblings("td").children(".data-1").val();

        if(val > data_1){

            input.val(data_1)
        }
        //console.log(data_1);
        //if (input.data("lastval") != val) {
            //input.data("lastval", val);
            //your change action goes here 
            //console.log(val);
        //}

    });
    //$('input[type=Number]').keydown(function() { 
        //return false;
        //alert('Changed!')
    //});

    
    $(".rrr").change(function() {
    var checkboxes = $(this).parent().siblings("td").children(":checkbox");
    //var containers = $(this).parent().siblings("td:not(first-child)");
    //var containers = $(this).parent().siblings("td").children(".Number");
    var data_1 = $(this).parent().siblings("td").children(".data-1");
    var data_2 = $(this).parent().siblings("td").children(".data-2");


    var nameMonth = $(this).parent().siblings(".mes").text();
        console.log(nameMonth);
    if (this.checked) {
      //containers.css('visibility', 'visible');
      data_1.css('visibility', 'visible');
      data_2.css('visibility', 'visible');
      data_1.attr("name","values["+nameMonth+",data_1]"); 
      data_2.attr("name","values["+nameMonth+",data_2]"); 

      //checkboxes.prop("checked", true);
    } else {
      //containers.css('visibility', 'hidden');
      data_1.css('visibility', 'hidden');
      data_2.css('visibility', 'hidden');
      data_1.removeAttr("name");
      data_2.removeAttr("name");

     // checkboxes.prop("checked", false);
    }
  });


})
   
    var responsible = '<?php echo $responsible; ?>';
    var responsible = ((responsible != "")?JSON.parse(responsible):[]);


    var responsible_for_providing_data = '<?php echo $responsible_for_providing_data; ?>';
    var responsible_for_providing_data = ((responsible_for_providing_data != "")?JSON.parse(responsible_for_providing_data):[]);

    $('#responsible').select2().select2('val',responsible)
    $('#responsible_for_providing_data').select2().select2('val',responsible_for_providing_data)

</script>

<style>
   .select2-container-multi .select2-choices {
        min-height: 100px;
    }


    .custom-table{
        border: 2px solid #6d6d6f;
        border-radius:10px;
        width: 500px;
        height: 250px;
        padding:10px;
        overflow-y: auto;
    }

    #info_rango[title]:hover:after {

        content: "el rango se indenficara en la grafica con lo siguiente: bueno -> verde; regular -> amarillo; malo -> rojo;";
        position: absolute;
        border-radius:5px;
        padding: 6px;
        display: block;
        background-color: #459fc6;
        color: #ffffff;
        max-width: 350px;
        height: 100px;
        text-align:center;
        line-height: 20px; 
        z-index: 2;

    }

    .parent{
        
        position: relative;
       
    }
    .cover{

        position: absolute;
        display: block;
        z-index: 999;
        top: 5px;
        left: 130px;

    }

</style>