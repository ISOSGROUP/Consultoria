@php
    $measurement_frequency = ["1"=> "Mensual","2"=>"Bimestral","3"=>"Trimestral","4"=>"cuatrimestre","6"=>"Semestral","12"=>"Anual"];
    $formula = ["1"=> " ⬆ (N eventos ejecutados * 100) / N eventos programados ","2"=>" ⬇ (N eventos ejecutados * 100) / N eventos programados","3"=>" ⬆ Conteo de N eventos","4"=>" ⬇ Conteo de N eventos"];

@endphp
<!-- Quality Politics Field ` -->
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


 



<!-- Formula Field -->
<div class="form-group col-lg-5">
    {!! Form::label('formula', 'Formula:') !!}
     {!! Form::select('formula', $formula, null, ['class' => 'form-control','id'=>'formula','onchange'=>"val()"]) !!} 
 
<!--
    <select name="formula"   class="form-control" id="formula">
        
        @foreach($formula as $key => $value)

            @if($id_formula == $key)

                <option value="{{ $key }}" selected>⬆  &nbsp; {{ $value }}</option>

            @else
                <option value="{{ $key }}">{{ $value }}</option>
            @endif


        @endforeach 

    </select> 
-->

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

<div class="">

    <div  class="form-inline">
        <label > &nbsp;&nbsp; Cambios de rango &nbsp;</label>
        <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="info_rango" ></i>
    </div>

<div class="wrapper">
        <div class="limit-1">
            <input type="text" readonly style="width:100px" class="form-control" id="number-min" value="0">
        </div>

        <div class="container">
            <div class="slider-track"></div>
            <input type="range" min="0" max="100" value="20" id="slider-1" oninput="slideOne()">
            <input type="range" min="0" max="100" value="40" id="slider-2" oninput="slideTwo()">

            <div class="box-1">
                <div class="number-1">50</div>
            </div>

            <div class="box-2">
                <div class="number-2">50</div>
            </div>

        </div>

        <div class="limit-2">    
            <input type="text"  onKeyUp="val()" id="number-max"style="width:100px" class="form-control" value="100">
        </div>

    </div>

    {!! Form::Number('bueno', null, ['class' => 'form-control',"style"=>"width:100px;display:none;","id"=>"bueno"]) !!}
    {!! Form::Number('regular_1', null, ['class' => 'form-control',"style"=>"width:100px;display:none;","id"=>"regular_1"]) !!}
    {!! Form::Number('regular_2', null, ['class' => 'form-control',"style"=>"width:100px;display:none;","id"=>"regular_2"]) !!}
    {!! Form::Number('malo', null, ['class' => 'form-control',"style"=>"width:100px;display:none;","id"=>"malo"]) !!}

    

    {{-- 

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

    --}}
</div>

<br>


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
<div class="well clearfix">
        <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
      </div>
    {!! Form::label('effectiveness_verification', 'Planificación de actividades para el logro de objetivos:') !!}
      

<div class="form-group col-sm-12 tbl_posts">


     {!! Form::text('activities', null, ['class' => 'form-control',"readonly"=>"readonly","style"=>"display:none","id"=>"activities"]) !!}


          <!-- <div id="www" ></div> -->

    <div style="display:none;">
        <table id="sample_table">
        <tr id="" class="custom-row" style="height:2px;">
        <td  style="max-width:1px;padding:5px;"><span class="sn"></span>.</td>
        <td class="actividades" style="max-width:30px;padding:5px;" contenteditable>test</td>
        <td class="recursos" style="max-width:30px;padding:5px;" contenteditable>test</td>
         <td class="responsable volunteer " style="max-width:20px;padding:5px;" >
         <!--
            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
                </select>
            </td>-->
        <td class="plazo" style="max-width:30px;padding:5px;"><input type="date" class="datepick" /></td>
        <!-- <td class="plazo " style="max-width:30px;padding:5px;"contenteditable>test</td>-->
        <td class="verificacion" style="max-width:20px;min-height:30px;padding:5px;" contenteditable>test</td>

       
        <td >
            <div class="input-group-prepend">
                <!-- <a class="btn btn-xs " data-id="0"> <i class="fa fa-edit fa-lg"></i></a> -->
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
            <th class="verificacion"   style="min-width:30px;">Verificacion </th>
            <th class="action"  style="width:10px"style="min-width:30px;">Action</th>
           
        </thead>

        <tbody id="tbl_posts_body">
             <!-- <tr>
                <td class="volunteer" id="47">Click Me</td>
                <td class=""></td> 
            </tr> -->
        </tbody>

    </table>


   <!--  {!! Form::label('activities', 'Actividades:') !!} -->
    <!-- {!! Form::text('activities', null, ['class' => 'form-control']) !!} -->
</div>


 

 





{{--
<!-- Resources Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resources', 'Recursos:') !!}
    {!! Form::text('resources', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible', 'Responsable:') !!}
    <!-- {!! Form::text('responsible', null, ['class' => 'form-control']) !!} -->

    <select multiple name="responsiblew[]" style="width:500px" class=""  id="wresponsible">
        
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
--}}
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
 

(function($) {
  $(document).ready(function() {
    var state = "";
    $(".volunteer").on("click ","td", function(event) {

        // Check if select is already loaded
      if(!$(this).has("select").length) {
        // Populate select element
        $(this).html(`<select class="js-example-basic-multiple" name="states[]" multiple="multiple">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
            </select>`);      
              
        // Initialise select2
        $(this).children("select").select2();
      }
    });



    $("#tbl_posts_body").on("click", "td.responsable", function() {

        if(!$(this).has("select").length) {
            // Populate select element
            var select = `<select style="width:104px" class="js-example-basic-multiple" name="states[]" multiple="multiple">`;

            //$(this).html(`<select class="js-example-basic-multiple" name="states[]" multiple="multiple">
              //  <option value="AL">Alabama</option>
                //<option value="WY">Wyoming</option>
                //</select>`);      
                
           // $(this).children("select").select2();

            var users = ""
            users = '<?php echo $users; ?>';
            users = ((users != "") ? JSON.parse(users):[]);


            for(var key in users) {

                select += `<option value="`+users[key]["name"]+`">`+users[key]["name"]+`</option>`

            }   
            select += `</select>`;
            $(this).html(select);
            $(this).children("select").select2();


            var r = [1,2];
            //$(this).children("select").select2().select2('val',["isos"])

            //$(this).children("select").select2();


           

            //console.log(select);
            //$('#responsible').select2().select2('val',responsible)


        }


    });


  });
})(jQuery)





/*
 
$('#www').select2({
    width: '100%',
    allowClear: true,
    multiple: true,
    maximumSelectionSize: 1,
    placeholder: "Start typing",
    data: [
            { id: 1, text: "Nikhilesh"},
            { id: 2, text: "Raju"    }
          ]    
    });

    */
jQuery(document).delegate('a.add-record', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table tr'),
     size = jQuery('#tbl_posts >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', size);
     element.find('.delete-record').attr('data-id', size);
     element.appendTo('#tbl_posts_body');
     element.find('.sn').html(size);

/*
     var tbody = "";
    // tbody += '<tr>'+
      //                          '<td class="volunteer" >' + 'Click Me '+ '</td>'+
        //                    '</tr>';

    tbody ='<tr>'+
      '<td class="volunteer" id="47">'+'Click Me'+'</td>+'
      '<td class=""></td>'+
    '</tr>';

     $('#tbl_posts_body').html(tbody);
     */

   });

jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Estás seguro de que quieres eliminar?");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#'+id).remove();

    //regnerate index number on table
    $('#tbl_posts_body tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});


 
    
$(document).ready(function() {
   
    var good = '<?php echo $bueno; ?>';
    var regular_1 = '<?php echo $regular_1; ?>';
    var regular_2 = '<?php echo $regular_2; ?>';
    var bad = '<?php echo $malo; ?>';

    var slider_1 = document.getElementById("slider-1");
    var slider_2 = document.getElementById("slider-2");
    var number_max = document.getElementById("number-max");


    slider_1.setAttribute("value",((regular_1 != "")? regular_1: 20));
    slider_2.setAttribute("value",((regular_2 != "")? regular_2: 60));
    slider_1.setAttribute("max",((good != 0) ? good: bad));
    slider_2.setAttribute("max",((good != 0) ? good: bad));
    number_max.setAttribute("value",((good != 0) ? good: bad));
    document.querySelector(".number-1").innerHTML = regular_1;
    document.querySelector(".number-2").innerHTML = regular_2;




     
    function isNumeric(val) {
        return /^-?\d+$/.test(val);
    }


    $("#customform").submit(function(){

        var list = {};

        $("tr.custom-row").each(function() {

            var row = $(this).prop("id");
            var data = {}

            var actividades = $(this).find("td.actividades").text();
            var recursos = $(this).find("td.recursos").text();
            var responsable = $(this).find("td.responsable").find("select").val();
            var plazo = $(this).find("td.plazo").find("input").val();
            var verificacion = $(this).find("td.verificacion").text();
            data.actividades = actividades;
            data.recursos = recursos;
            data.responsable = responsable;
            data.plazo = plazo;
            data.verificacion = verificacion;

            ((isNumeric(row) ? list[row] = data:""))
        
        });

        //$("#activities").val((JSON.parse(JSON.stringify(list))) );
        $("#activities").val(JSON.stringify(list));


        //$("#slider-1").css("max");
        //$("#slider-1").css("value");
        //$("#slider-2").css("value");



        var number_max = document.getElementById("number-max");
        var number_min = document.getElementById("number-min");

        //var slider_1 = document.getElementById("slider-1");
        //var slider_2 = document.getElementById("slider-2");

        //slider_1 = slider_1.getAttribute("value");
        //slider_2 = slider_2.getAttribute("value");




        if($("#formula").val() == 1 || $("#formula").val() == 3 ){
            $("#bueno").val(number_max.value);
            $("#malo").val(0);

        }else{
            $("#bueno").val(0);
            $("#malo").val(number_max.value);
        }
        //alert($(".number-1").html());
        $("#regular_1").val($(".number-1").html());
        $("#regular_2").val($(".number-2").html());

        //return false;


    });

    $("tr.custom-row").each(function() {


        var jsonData = '<?php echo $activities; ?>';
        var jsonData = JSON.parse(jsonData);
        var users = '<?php echo $users; ?>';
        var users = JSON.parse(users);

        

        var select = `<select class="js-example-basic-multiple" name="states[]" multiple="multiple">`;

        for(var index in users) {

            select += `<option value="`+users[index]["name"]+`">`+users[index]["name"]+`</option>`

        }   

        select += `</select>`;

        for(var key in jsonData) {

            //alert(jsonData[key]["actividades"]);
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

            //element.find("td.responsable").html(select);
            //element.find("td.responsable").children("select").select2();
            //element.find("td.responsable").children("select").select2().select2('val',["isos"])



            
            element.find("td.responsable").append(responsable);
            


            
            element.find("td.plazo").append(`<input type="date" class="datepicks" />`);




            element.find("td.plazo").find("input").val(plazo);//append(plazo);
            element.find("td.verificacion").append(verificacion);

            element.attr('id', size);
            element.find('.delete-record').attr('data-id', size);
            element.appendTo('#tbl_posts_body');
            element.find('.sn').html(size);



            






        }




    });

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
                    ((formula == 1 ||  formula == 2)? '<th>Events realizados</th>':"")
                    '</tr>'+
                '</thead>';

        $('#dataTable').append(thead);

         

        var today = new Date()
        var options = { month: 'long'};
        var month = today.toLocaleDateString('es-ES', options);
        month = month.charAt(0).toUpperCase()+ month.slice(1);

        //alert(today);


        var monthlist = '<?php echo json_encode($month_list); ?>';
        var monthlist = JSON.parse(monthlist);

        month_list.map((value,index) => {

            //alert(value.toString().includes(month));

            tbody += '<tr class="item">'+
                                '<td>' + value + '</td>'+
                                '<td>' + '<input type="Number"'+
                                            'name="values['+value+',data_1]"'+
                                            'class="form-control data_1"'+ 

                                            //(value.toString().includes(month) ? "readonly":"")
                                            
                                            'value="'+ ((monthlist[value] != undefined)? monthlist[value].toString().split(',')[0]:0)+'">'+
                                '</td>'+
                                
                                ((formula == 1 ||  formula == 2 )? '<td>' +'<input type="Number"'+
                                            'name="values['+value+',data_2]"'+
                                        'class="form-control data_2"'+ 
                                        'value="'+ ((monthlist[value] != undefined)? monthlist[value].toString().split(',')[1]:0)+'">'+

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


    $("tr.custom-row").each(function() {

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


<script  type="text/javascript">

    window.onload = function(){


        
        slideOne();
        slideTwo();
    }

    let formula = document.getElementById("formula");
    let sliderOne = document.getElementById("slider-1");
    let sliderTwo = document.getElementById("slider-2");
    let minGap = 0;
    let sliderTrack = document.querySelector(".slider-track");
    let sliderMaxValue = document.getElementById("slider-1").max;
    let box_1 = document.querySelector(".box-1");
    let number_1 = document.querySelector(".number-1");

    let box_2 = document.querySelector(".box-2");
    let number_2 = document.querySelector(".number-2");
    let number_max = document.getElementById("number-max");

    var red = "#c8422d";
    var green = "#0ea70e";
    var percent1 = 0;
    var percent2 = 0;


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
        
        
        //alert();
        var is_percentage = false;
        var r = ((formula.value == 1 ) ? customize_bar_values(red,green,is_percentage = true): "")
        var r = ((formula.value == 2 ) ? customize_bar_values(green,red,is_percentage = true): "")
        var r = ((formula.value == 3 ) ? customize_bar_values(red,green,is_percentage = false): "")
        var r = ((formula.value == 4 ) ? customize_bar_values(green,red,is_percentage = false): "")

        //((id_formula == 3 || id_formula == 4 ) ? sliderMaxValue = 100: "")

        //percent1 = (sliderOne.value / sliderMaxValue) * 100;
        //percent2 = (sliderTwo.value / sliderMaxValue) * 100;
        //sliderTrack.style.background = `linear-gradient(to right, #c8422d ${percent1}% , #ceca40 ${percent1}% , #ceca40 ${percent2}%, #0ea70e ${percent2}%)`;

        //box_1.style.left = (Math.trunc(percent1) - 2)+ '%';
        //number_1.textContent = Math.trunc(percent1);

        //box_2.style.left = (Math.trunc(percent2) - 4)+ '%';
        //number_2.textContent = Math.trunc(percent2);

    }

    function customize_bar_values(data_1,data_2,is_percentage){

       var sliderMaxValue = document.getElementById("slider-1").max;
       var sliderOne = document.getElementById("slider-1");
       var sliderTwo = document.getElementById("slider-2");

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
            //number_1.textContent = String(Math.trunc(percent1)).slice(0, 1);
            number_1.textContent = sliderOne.value;


            box_2.style.left = (Math.trunc(percent2) - 4)+ '%';
            //number_2.textContent = String(Math.trunc(percent2)).slice(0, 1);
            number_2.textContent = sliderTwo.value;

        }
        //sliderMaxValue = number_max.value;
        //percent1 = (sliderOne.value / sliderMaxValue) * 100;
        //percent2 = (sliderTwo.value / sliderMaxValue) * 100;
        sliderTrack.style.background = `linear-gradient(to right, ${data_1} ${percent1}% , #ceca40 ${percent1}% , #ceca40 ${percent2}%, ${data_2} ${percent2}%)`;
      
    }
    function val() {
        var d = document.getElementById("formula").value;

        var number_max = document.getElementById("number-max");
        

        var sliderMaxValue = document.getElementById("slider-1").max;
        var sliderOne = document.getElementById("slider-1");
        var sliderTwo = document.getElementById("slider-2");
        sliderOne.setAttribute("max", number_max.value);
        sliderTwo.setAttribute("max", number_max.value);
        sliderOne.value = 0;
        sliderTwo.value = number_max.value;
        fillColor()
    }

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
    .tbl_posts{
        border: 2px solid #6d6d6f;
        border-radius:5px;
        width: 1100px;
        height: 250px;
        padding:5px;
        overflow-y: auto;
    }

    #info_rango[title]:hover:after {

        content: "el rango se identificará en el gráfico mediante lo siguiente: bueno -> verde; regular -> amarillo; malo -> rojo;";
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

    .cell{
        /* min-width: 20px; */

        word-wrap: break-word;
       /* max-width: 20px; */

        /*min-height: 20px;
        max-height: 20px; */


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


   


</style>