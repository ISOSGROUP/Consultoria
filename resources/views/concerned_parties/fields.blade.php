<!-- Type Field -->
<div class="form-group col-sm-2">
    {!! Form::label('type', 'Tipo:') !!}
    @php
        $list = ["internal"=>"interno","external"=>"externo"];

    @endphp
    {!! Form::select('type', $list, null, ['class' => 'form-control','empty'=>'Seleccionar']) !!}
</div>

<!-- Concerned Parties Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('concerned_parties', 'Partes interesadas:') !!}
    {!! Form::textarea('concerned_parties', null, ['class' => 'form-control']) !!}
</div>

<!-- Needs Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('needs', 'Necesidades:') !!}
    {!! Form::textarea('needs', null, ['class' => 'form-control']) !!}
</div>

<!-- Expectations Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Expectations', 'Expectativas:') !!}
    {!! Form::textarea('Expectations', null, ['class' => 'form-control']) !!}
</div>

<!-- Form Of Fulfillment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('form_of_fulfillment', 'Forma de cumplimiento:') !!}
    {!! Form::textarea('form_of_fulfillment', null, ['class' => 'form-control']) !!}
</div>

<!-- Related Legal Requirements Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('related_legal_requirements', 'Requisitos legales vinculados:') !!}
    {!! Form::textarea('related_legal_requirements', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ConcernedParties.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
