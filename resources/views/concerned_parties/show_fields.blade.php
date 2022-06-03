<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Tipo:') !!}
    <p>{{ $concernedParties->type }}</p>
</div>

<!-- Concerned Parties Field -->
<div class="form-group">
    {!! Form::label('concerned_parties', 'Partes interesadas:') !!}
    <p>{{ $concernedParties->concerned_parties }}</p>
</div>

<!-- Needs Field -->
<div class="form-group">
    {!! Form::label('needs', 'Necesidades:') !!}
    <p>{{ $concernedParties->needs }}</p>
</div>

<!-- Expectations Field -->
<div class="form-group">
    {!! Form::label('Expectations', 'Expectativas:') !!}
    <p>{{ $concernedParties->Expectations }}</p>
</div>

<!-- Form Of Fulfillment Field -->
<div class="form-group">
    {!! Form::label('form_of_fulfillment', 'Forma de cumplimiento:') !!}
    <p>{{ $concernedParties->form_of_fulfillment }}</p>
</div>

<!-- Related Legal Requirements Field -->
<div class="form-group">
    {!! Form::label('related_legal_requirements', 'Requisitos legales vinculados:') !!}
    <p>{{ $concernedParties->related_legal_requirements }}</p>
</div>

 

