@php
    $probability = ["0"=>"Elevado","1"=>"Medio","2"=>"Bajo"];
    $impact = ["0"=>"Bajo","1"=>"Medio","2"=>"Alto"];
    $tracking_status = ["Abierto"=>"Abierto","Cerrado"=>"Cerrado"];
@endphp

<!-- Risk Chance Radio Field -->
<div class="form-group">
    {!! Form::label('risk_chance_radio', 'Riesgo / Oportunidad:') !!}
    <p>{{ (($riesgos->risk_chance_radio == "R") ?"Riesgo": (($riesgos->risk_chance_radio == "O") ?"Oportunidad":"") ) }}</p>
</div>

<!-- Process Field -->
<div class="form-group">
    {!! Form::label('process', 'Proceso:') !!}
    <p>{{ $riesgos->process }}</p>
</div>

<!-- Probability Field -->
<div class="form-group">
    {!! Form::label('probability', 'Probabilidad:') !!}
    <p>{{ $probability[$riesgos->probability] }}</p>
</div>

<!-- Impact Field -->
<div class="form-group">
    {!! Form::label('impact', 'Impacto:') !!}
    <p>{{ $impact[$riesgos->impact] }}</p>
</div>

<!-- Risk Level Field -->
<div class="form-group">
    {!! Form::label('risk_level', 'Nivel de riesgo:') !!}
    <p>{{ $riesgos->risk_level }}</p>
</div>

<!-- Interested Part Field -->
<div class="form-group">
    {!! Form::label('interested_part', 'Partes Interesadas:') !!}
    <p>{{ $riesgos->interested_part }}</p>
</div>

<!-- Foda Reference Field -->
<div class="form-group">
    {!! Form::label('foda_reference', 'Foda Reference:') !!}
    <p>{{ $riesgos->foda_reference }}</p>
</div>

<!-- Action To Take Field -->
<div class="form-group">
    {!! Form::label('action_to_take', 'Acción a tomar:') !!}
    <p>{{ $riesgos->action_to_take }}</p>
</div>

<!-- Responsible Field -->
<div class="form-group">
    {!! Form::label('responsible', 'Responsable:') !!}
    <p>{{ $riesgos->responsible }}</p>
</div>

<!-- Resources Field -->
<div class="form-group">
    {!! Form::label('resources', 'Recursos:') !!}
    <p>{{ $riesgos->resources }}</p>
</div>

<!-- Execution Time Field -->
<div class="form-group">
    {!! Form::label('execution_time', 'Tiempo de ejecución:') !!}
    <p>{{ $riesgos->execution_time }}</p>
</div>

<!-- Responsible For Monitoring Field -->
<div class="form-group">
    {!! Form::label('responsible_for_monitoring', 'Responsable de Seguimiento:') !!}
    <p>{{ $riesgos->responsible_for_monitoring }}</p>
</div>

<!-- Tracking Status Field -->
<div class="form-group">
    {!! Form::label('tracking_status', 'Estado de seguimiento:') !!}
    <p>{{ $riesgos->tracking_status }}</p>
</div>

<!-- Is Effective Field -->
<div class="form-group">
    {!! Form::label('is_effective', 'Es eficaz:') !!}
    <p>{{ $riesgos->is_effective }}</p>
</div>

<!-- Comment On Effectiveness Field -->
<div class="form-group">
    {!! Form::label('comment_on_effectiveness', 'Comentario eficacia:') !!}
    <p>{{ $riesgos->comment_on_effectiveness }}</p>
</div>
 
