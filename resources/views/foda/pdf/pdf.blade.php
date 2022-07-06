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
                                    <label for="">MODULO: FODA</label>
                                    <br>
                                </div>

        <div class="form_container">
        @php
            $listfoda = ["weaknesses"=>"Debilidades","strengths"=>"Fortalezas","opportunities"=>"Oportunidades","threats"=>"Amenazas"];
            $ss = ["without_starting"=>"sin iniciar","in_process"=>"en proceso","executed"=>"ejecutado","cancelled"=>"cancelado"];

        @endphp

        <br>
        <label id="weaknesses">Debilidades</label>
        @foreach ($allFoda["weaknesses"] as $key => $weaknesses)

            <p>D{{ $key +1 }} :  {{ $weaknesses }}</p>

        @endforeach
        <br>
        <label id="strengths">Fortalezas</label>
        @foreach ($allFoda["strengths"] as $key => $strengths)

            <p>F{{ $key + 1 }} :  {{ $strengths }}</p>

        @endforeach
        <br>
        <label id="opportunities">Oportunidades</label>
        @foreach ($allFoda["opportunities"] as $key => $opportunities)

            <p>O{{ $key + 1}} :  {{ $opportunities }}</p>

        @endforeach
        <br>
        <label id="threats">Amenazas</label>
        @foreach ($allFoda["threats"] as $key => $threats)

            <p>A{{ $key + 1}} :  {{ $threats }}</p>

        @endforeach
        
        <!-- foda_strategies_details -->

        
        <br>
        <br>


        <label id="threats">Strategia oportunidades y fortalezas</label>

        <table class="table table-striped mytable" id="dataTable" > 

            <thead>
                            <th id="theadCol1" scope="col" width="1%">Foda referencia</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia</th>
                            <th id="theadCol1" scope="col" width="1%">responsable</th>
                            <th id="theadCol2" scope="col" width="1%">presupuesto</th>
                            <th id="theadCol2" scope="col" width="1%">estado</th>
                            <th id="theadCol2" scope="col" width="1%">descripcion</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia vinculada</th>

            </thead>

            <tbody id="tbl_posts_body">

 


            @for ($i = 0; $i < count($strengths_opportunities); $i++)

                <tr>


                    <td class="cell">

                        @for ($index = 0; $index < count($strengths_opportunities[$i]->foda_strategies_details); $index ++)

                            {{ substr($listfoda[$strengths_opportunities[$i]->foda_strategies_details[$index]->name], 0, 1) }}{{$index +1 }} :  {{ $strengths_opportunities[$i]->foda_strategies_details[$index]->description }}

                        @endfor

                    </td>

                    <td class="cell">{{ $strengths_opportunities[$i]->strategy }}</td>
                    <td class="cell">{{ $strengths_opportunities[$i]->responsible }}</td>
                    <td class="cell">{{ $strengths_opportunities[$i]->budget }}</td>
                    <td class="cell">{{ $ss[$strengths_opportunities[$i]->status] }}</td>
                    <td class="cell">{{ $strengths_opportunities[$i]->description }}</td>
                    <td class="cell">{{ $strengths_opportunities[$i]->linked_strategy }}</td>

                   

                </tr>


            @endfor




            </tbody>    
            
            
           


        </table>

        <br>
        <br>

        <label id="threats">Strategia oportunidades y debilidades </label>

        <table class="table table-striped mytable" id="dataTable" >

            <thead>
                            <th id="theadCol1" scope="col" width="1%">Foda referencia</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia</th>
                            <th id="theadCol1" scope="col" width="1%">responsable</th>
                            <th id="theadCol2" scope="col" width="1%">presupuesto</th>
                            <th id="theadCol2" scope="col" width="1%">estado</th>
                            <th id="theadCol2" scope="col" width="1%">descripcion</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia vinculada</th>

            </thead>

            <tbody id="tbl_posts_body">

 


            @for ($i = 0; $i < count($weaknesses_opportunities); $i++)

                <tr>


                    <td class="cell">
                        
                        @for ($index = 0; $index < count($weaknesses_opportunities[$i]->foda_strategies_details); $index ++)

                            {{ substr($listfoda[$weaknesses_opportunities[$i]->foda_strategies_details[$index]->name], 0, 1) }}{{$index +1 }} :  {{ $weaknesses_opportunities[$i]->foda_strategies_details[$index]->description }}

                        @endfor

                    </td>

                    <td class="cell">{{ $weaknesses_opportunities[$i]->strategy }}</td>
                    <td class="cell">{{ $weaknesses_opportunities[$i]->responsible }}</td>
                    <td class="cell">{{ $weaknesses_opportunities[$i]->budget }}</td>
                    <td class="cell">{{ $ss[$weaknesses_opportunities[$i]->status] }}</td>
                    <td class="cell">{{ $weaknesses_opportunities[$i]->description }}</td>
                    <td class="cell">{{ $weaknesses_opportunities[$i]->linked_strategy }}</td>

                   

                </tr>


            @endfor




            </tbody>    
            
            
           


        </table>
 
        <br>
        <br>


        <label id="threats">Strategia amenazas y fortalezas</label>

        <table class="table table-striped mytable" id="dataTable" >

            <thead>
                            <th id="theadCol1" scope="col" width="1%">Foda referencia</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia</th>
                            <th id="theadCol1" scope="col" width="1%">responsable</th>
                            <th id="theadCol2" scope="col" width="1%">presupuesto</th>
                            <th id="theadCol2" scope="col" width="1%">estado</th>
                            <th id="theadCol2" scope="col" width="1%">descripcion</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia vinculada</th>

            </thead>

            <tbody id="tbl_posts_body">



            @for ($i = 0; $i < count($strengths_threats); $i++)

                <tr>
                    <td class="cell">
                        @for ($index = 0; $index < count($strengths_threats[$i]->foda_strategies_details); $index ++)

                            {{ substr($listfoda[$strengths_threats[$i]->foda_strategies_details[$index]->name], 0, 1) }}{{$index +1 }} :  {{ $strengths_threats[$i]->foda_strategies_details[$index]->description }}

                        @endfor
                    </td>
                    <td class="cell">{{ $strengths_threats[$i]->strategy }}</td>
                    <td class="cell">{{ $strengths_threats[$i]->responsible }}</td>
                    <td class="cell">{{ $strengths_threats[$i]->budget }}</td>
                    <td class="cell">{{ $ss[$strengths_threats[$i]->status] }}</td>
                    <td class="cell">{{ $strengths_threats[$i]->description }}</td>
                    <td class="cell">{{ $strengths_threats[$i]->linked_strategy }}</td>
                </tr>

            @endfor

            </tbody>    

        </table>

        <br>
        <br>


        <label id="threats">Strategia amenazas y debilidades</label>

        <table class="table table-striped mytable" id="dataTable" >

            <thead>
                            <th id="theadCol1" scope="col" width="1%">Foda referencia</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia</th>
                            <th id="theadCol1" scope="col" width="1%">responsable</th>
                            <th id="theadCol2" scope="col" width="1%">presupuesto</th>
                            <th id="theadCol2" scope="col" width="1%">estado</th>
                            <th id="theadCol2" scope="col" width="1%">descripcion</th>
                            <th id="theadCol2" scope="col" width="1%">estrategia vinculada</th>

            </thead>

            <tbody id="tbl_posts_body">

            @for ($i = 0; $i < count($weaknesses_threats); $i++)

                <tr>
                    <td class="cell">
                        @for ($index = 0; $index < count($weaknesses_threats[$i]->foda_strategies_details); $index ++)

                            {{ substr($listfoda[$weaknesses_threats[$i]->foda_strategies_details[$index]->name], 0, 1) }}{{$index +1 }} :  {{ $weaknesses_threats[$i]->foda_strategies_details[$index]->description }}

                        @endfor
                    </td>
                     
                    <td class="cell">{{ $weaknesses_threats[$i]->strategy }}</td>
                    <td class="cell">{{ $weaknesses_threats[$i]->responsible }}</td>
                    <td class="cell">{{ $weaknesses_threats[$i]->budget }}</td>
                    <td class="cell">{{ $ss[$weaknesses_threats[$i]->status] }}</td>
                    <td class="cell">{{ $weaknesses_threats[$i]->description }}</td>
                    <td class="cell">{{ $weaknesses_threats[$i]->linked_strategy }}</td>

                

                </tr>


            @endfor

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
    }

    .mytable tbody tr {
        border-bottom: 1px solid #dddddd;

    }

    .mytable tbody tr {
        background-color: #f3f3f3;
    }



</style>