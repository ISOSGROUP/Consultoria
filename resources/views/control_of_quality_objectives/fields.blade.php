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
    {!! Form::textarea('indicator', null, ['class' => 'form-control']) !!}
</div>

<!-- Formula Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('formula', 'Formula:') !!}
    {!! Form::textarea('formula', null, ['class' => 'form-control']) !!}
</div>

<!-- Measurement Frequency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('measurement_frequency', 'Frecuencia de medición:') !!}
    {!! Form::text('measurement_frequency', null, ['class' => 'form-control']) !!}
</div>

<!-- Goals Field -->
<div class="form-group col-sm-6">
    {!! Form::label('goals', 'Metas:') !!}
    {!! Form::text('goals', null, ['class' => 'form-control']) !!}
</div>

<!-- Status To Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_to_date', 'Estado hasta la fecha:') !!}
    {!! Form::text('status_to_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible For Providing Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_for_providing_data', 'Responsable de brindar datos:') !!}
    {!! Form::text('responsible_for_providing_data', null, ['class' => 'form-control']) !!}
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
    {!! Form::text('responsible', null, ['class' => 'form-control']) !!}
</div>

<!-- Plazo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plazo', 'Plazo:') !!}
    {!! Form::text('plazo', null, ['class' => 'form-control']) !!}
</div>

<!-- Effectiveness Verification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('effectiveness_verification', 'Verificación de la eficacia:') !!}
    {!! Form::text('effectiveness_verification', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('controlOfQualityObjectives.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
