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
                                    <label for="">MODULO: PARTES INTERESADAS</label>
                                    <br>
                                </div>

        <div class="form_container">

        
        @foreach($concernedParties as $concernedParties)



        <div class="form-group col-sm-2">
            {!! Form::label('type', 'Tipo:') !!}

            {!! Form::text('type', (($concernedParties->type == "internal")?"interno":"externo"), ['class' => 'form-control','empty'=>'Seleccionar']) !!}
        </div>

        <!-- Concerned Parties Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('concerned_parties', 'Partes interesadas:') !!}
            {!! Form::text('concerned_parties', $concernedParties->concerned_parties, ['class' => 'form-control']) !!}
        </div>

        <!-- Needs Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('needs', 'Necesidades:') !!}
            <br>
            {!! Form::textarea('needs', $concernedParties->needs, ['class' => 'form-control']) !!}
        </div>

        <!-- Expectations Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('Expectations', 'Expectativas:') !!}
            <br>
            {!! Form::textarea('Expectations', $concernedParties->Expectations, ['class' => 'form-control']) !!}
        </div>

        <!-- Form Of Fulfillment Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('form_of_fulfillment', 'Forma de cumplimiento:') !!}
            <br>
            {!! Form::textarea('form_of_fulfillment', $concernedParties->form_of_fulfillment, ['class' => 'form-control']) !!}
        </div>

        <!-- Related Legal Requirements Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('related_legal_requirements', 'Requisitos legales vinculados:') !!}
            <br>
            {!! Form::textarea('related_legal_requirements', null, ['class' => 'form-control']) !!}
        </div>


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