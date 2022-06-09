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
    {!! Form::text('concerned_parties', null, ['class' => 'form-control']) !!}
</div>

<!-- Needs Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('needs', 'Necesidades:') !!}
    <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="needs" ></i>

    {!! Form::textarea('needs', null, ['class' => 'form-control']) !!}
</div>

<!-- Expectations Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Expectations', 'Expectativas:') !!}
    <i class="fa fa-info-circle fa-lg tool-tip" style="color: #eb3526 " id="Expectations" ></i>
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

<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

<script>


    $(document).ready(function() {
        


        $("#needs").attr('title', '');
        $("#Expectations").attr('title', '');


    });

</script>

<style>

   
    #needs[title]:hover:after {

        content: "son requisitos especificados por la parte interesada que se espera que se cumplan";
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

    }
    #Expectations[title]:hover:after {

        content: "aquello que la parte interesado puede esperar pero que la organización no está obligada a cumplir";
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

    }

</style>
