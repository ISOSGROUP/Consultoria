@php
    $probability = ["0"=>"Elevado","1"=>"Medio","2"=>"Bajo"];
    $impact = ["0"=>"Bajo","1"=>"Medio","2"=>"Alto"];
    $tracking_status = ["Abierto"=>"Abierto","Cerrado"=>"Cerrado"];
@endphp

<!-- Process Field -->
<div class="form-group col-sm-6">
   

    <div>
        <input type="radio" id="contactChoice1"
        name="risk_chance_radio" value="R" {{ ($risk_chance_radio == "R") ? 'checked' : '' }}>
        <label for="contactChoice1">riesgo</label>

        <input type="radio" id="contactChoice2"
        name="risk_chance_radio" value="O" {{ ($risk_chance_radio == "O") ? 'checked' : '' }}>
        <label for="contactChoice2">oportunidad</label>
    </div>

    {!! Form::text('risk_chance_text', null, ['class' => 'form-control']) !!}

</div>

<!-- Process Field -->
<div class="form-group col-sm-6">
    {!! Form::label('process', 'Proceso:') !!}
    {!! Form::text('process', null, ['class' => 'form-control']) !!}
</div>

<!-- Probability Field -->
<div class="form-group col-sm-6">
    {!! Form::label('probability', 'Probabilidad:') !!}
    {!! Form::select('probability', $probability, null, ['class' => 'form-control','empty'=>'Seleccionar','autocomplete'=>'off','id'=>'probability']) !!}
</div>

<!-- Probability Field -->
<div class="form-group col-sm-6">

    {!! Form::label('impact', 'Impacto:') !!}
    {!! Form::select('impact', $impact, null, ['class' => 'form-control','empty'=>'Seleccionar','autocomplete'=>'off','id'=>'impact']) !!}
</div>

<!-- Risk Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('risk_level', 'Nivel de riesgo:') !!}
    {!! Form::text('risk_level', null, ['class' => 'form-control',"readonly"=>"readonly",'id'=>'risk_level']) !!}
</div>

<!-- Interested Part Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interested_part', 'Partes Interesadas:') !!}
    {!! Form::select('interested_part', $filledArray, null, ['class' => 'form-control','empty'=>'Seleccionar','autocomplete'=>'off']) !!}

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
    {!! Form::text('action_to_take', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible', 'Responsable:') !!}
    {!! Form::text('responsible', null, ['class' => 'form-control']) !!}
</div>

<!-- Resources Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resources', 'Recursos:') !!}
    {!! Form::text('resources', null, ['class' => 'form-control']) !!}
</div>

<!-- Execution Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('execution_time', 'Tiempo de ejecución:') !!}
    {!! Form::text('execution_time',$execution_time, ['class' => 'form-control','id'=>"execution_time"]) !!}
    
</div>


<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

@push('scripts')
   <script type="text/javascript">
           $('#execution_times').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Responsible For Monitoring Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_for_monitoring', 'Responsable de Seguimiento:') !!}
    {!! Form::text('responsible_for_monitoring', null, ['class' => 'form-control']) !!}
</div>

<!-- Execution Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tracking_status', 'Estado de seguimiento:') !!}
    {!! Form::select('tracking_status',$tracking_status, null, ['class' => 'form-control','id'=>'tracking_status']) !!}
</div>


    

<div class="form-group col-sm-6">
    {!! Form::label('Es_eficaz', 'Es eficaz:') !!}
    <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="message" ></i>

    <div>
        <input type="radio" id="is_effective_1"
        name="is_effective" value="SI" {{ ($is_effective == "SI") ? 'checked' : '' }}>
        <label for="is_effective_1">SI</label>

        <input type="radio" id="is_effective_2"
        name="is_effective" value="NO" {{ ($is_effective == "NO") ? 'checked' : '' }}>
        <label for="is_effective_2">NO</label>
    </div>
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Expectations', 'Comentario eficacia:') !!}
    {!! Form::textarea('comment_on_effectiveness', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guadar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('riesgos.index') }}" class="btn btn-secondary">Cancelar</a>
</div>

<script type="text/javascript">

    
    $(document).ready(function() {
        

        $("#customform").submit(function(){


           /* 

            var table = document.getElementById("dataTable");
            var checkboxList = [];

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

            //alert(checkboxList);
            var foda_reference = document.getElementById("foda_reference");
            foda_reference.value = checkboxList;
            //return false;


            */
        });

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
        var checkboxList = '<?php echo $foda_reference; ?>';
        //var risks_opportunities_foda = JSON.parse(risks_opportunities_foda);
        //checkboxList = [];
       // for (var key in risks_opportunities_foda) {
         //   checkboxList[key] = risks_opportunities_foda[key].id;
        //}

        for (i=0; i < largest; i++)  { 

            addRow( ((typeof JSON.parse(strengths)[i] != 'undefined')? JSON.parse(strengths)[i]:null),
                    ((typeof JSON.parse(weaknesses)[i] != 'undefined')? JSON.parse(weaknesses)[i]:null),
                    ((typeof JSON.parse(opportunities)[i] != 'undefined')? JSON.parse(opportunities)[i]:null),
                    ((typeof JSON.parse(threats)[i] != 'undefined')? JSON.parse(threats)[i]:null)
                ,i,checkboxList);
        } 


        function addRow(element_1,element_2,element_3,element_4,index,checkboxList){

            var table = document.getElementById('dataTable');
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
                                        'class="customCheckBox"> '+myArray[json_arr[i].name].charAt(0).toUpperCase()+(1)+
                                        '</label>';

                        var cell = row.insertCell(i);
                        cell.innerHTML = htmlLabelInput;
                       //( (json_arr[i].id != null)? $('[ischecked="'+json_arr[i].id+'"]').attr('checked', true):"")
                       $('[ischecked="'+json_arr[i].id+'"]').attr('checked', true);

                }else{
                    row.insertCell(i);
                }
            }
        }


         var data = [
                        ["INPORTANTE (3),#e5db0f", "INPORTANTE (6),#f41b0a","ALTA (9),#f14b3d  "],
                        ["BAJA (2), #17bd1a", "INPORTANTE (4),#e5db0f","INPORTANTE (6),#e5db0f"],
                        ["BAJA (1),#17bd1a", "BAJA (2),#17bd1a","INPORTANTE (3),#e5db0f"]
                    ];
                     
         

          
    
        var str = data[$('#probability').val()][$('#impact').val()];
        str = str.split(',');
        $('#risk_level').val(str[0]).css("background-color", str[1])
        $('#risk_level').val(str[0]).css("color", "#080707")

        $('#probability').on('change', function() {

            var str = data[this.value][$('#impact').val()];
            str = str.split(',');
            $('#risk_level').val(str[0]).css("background-color", str[1])
            $('#risk_level').val(str[0]).css("color", "#080707")


        });
        $('#impact').on('change', function() {

            var str = data[$('#probability').val()][this.value];
            str = str.split(',');
            $('#risk_level').val(str[0]).css("background-color", str[1])
            $('#risk_level').val(str[0]).css("color", "#080707")

        });

        /*
        $("#message").hover(function() {
            $(this).css('cursor','pointer').attr('title-new', 'This is a hover text.');
            //$(this).css('color','red');
        }, function() {
               // $(this).css('cursor','auto');
        });
            */

        $(".tool-tip").attr('title', '');
        
    });
</script>
<style>

   
    .tool-tip[title]:hover:after {

      content: "se considerará eficaz si el riesgo no se ha materializado o si la oportunidad se ha aprovechado al máximo";
      position: absolute;
      border-radius:5px;
      padding: 6px;
      display: block;
      background-color: #459fc6;
      color: #ffffff;
      max-width: 350px;
      height: 300px;
      text-align:center;
      line-height: 20px;

    }

</style>