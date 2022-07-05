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

        
 


        <table class="table table-striped mytable" id="dataTable" >

            <thead>

                <th id="theadCol1" scope="col" width="1%">Tipo</th>
                <th id="theadCol2" scope="col" width="3%">Partes interesadas</th>
                <th id="theadCol1" scope="col" width="3%">Necesidades</th>
                <th id="theadCol2" scope="col" width="3%">Expectativas</th>
                <th id="theadCol2" scope="col" width="3%">Forma de cumplimiento</th>
                <th id="theadCol2" scope="col" width="3%">Requisitos legales vinculados</th>

            </thead>

            <tbody id="tbl_posts_body">

                @foreach($concernedParties as $concernedParties)

                    <tr>
                        
                        <td style="">{{ (($concernedParties->type == "internal") ? "interno" : "externo") }}</td>
                        <td class="cell">{{ $concernedParties->concerned_parties }}</td>
                        <td class="cell">{{ $concernedParties->needs }}</td>
                        <td class="cell">{{ $concernedParties->Expectations }}</td>
                        <td class="cell">{{ $concernedParties->form_of_fulfillment }}</td>
                        <td class="cell">{{ $concernedParties->related_legal_requirements }}</td>

                    </tr>


                @endforeach

            </tbody>    
        </table>

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
 
 
     

    .mytable {
        border-collapse: collapse;
        margin: 10px 0;
        font-size: 0.8em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .mytable thead tr {
        background-color: #1d97c3;
        color: #ffffff;
        text-align: left;
    }

    .mytable th,
    .mytable td {
        padding: 12px 15px;

        max-width: 60px;
        word-wrap: break-word;
    }

    .mytable tbody tr {
        border-bottom: 1px solid #dddddd;

    }

    .mytable tbody tr {
        background-color: #f3f3f3;
    }



</style>