@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category"></h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                    <input type="radio" name="options" checked>
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Products</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                             
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="chart-area">
                        <canvas id="canvas"></canvas>
                    </div>
                    
                    <div class="chart-area">
                        <canvas id="canvas2"></canvas>
                    </div>

                </div>


                 
            </div>
        </div>
    </div>



















     {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('controlOfQualityObjectives.index') }}">Control Of Quality Objectives</a>
            </li>
            <li class="breadcrumb-item active">Detalle</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('controlOfQualityObjectives.index') }}" class="btn btn-light">Atrás</a>
                             </div>
                             <div class="card-body">
                                 @include('control_of_quality_objectives.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>--}}


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

<script type="text/javascript">

$(document).ready(function() {
        

    var indicator = '<?php echo $controlOfQualityObjectives->indicator; ?>';
     

    var line1 = '<?php echo json_encode($list["events"]); ?>';
        line1 = JSON.parse(line1);

        
    //var MONTHS = ["Enero", "Febrero", "Marzo", "April", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
    var MONTHS = '<?php echo json_encode($list["meses"]); ?>';
    MONTHS = JSON.parse(MONTHS);

    var goals = '<?php echo json_encode($list["goals"]); ?>';
    goals = JSON.parse(goals);

    var good = '<?php echo json_encode($list["good"]); ?>';
    good = JSON.parse(good);

    var regular_1 = '<?php echo json_encode($list["regular_1"]); ?>';
    var regular_2 = '<?php echo json_encode($list["regular_2"]); ?>';

    regular_1 = JSON.parse(regular_1);
    regular_2 = JSON.parse(regular_2);


    var bad = '<?php echo json_encode($list["bad"]); ?>';
    bad = JSON.parse(bad);
    //((good[0] == 100) ? good[0] : bad[0]) 
    var max = ((good[0] == 0) ? bad[0] : good[0]) 
    var number_max = parseInt(max);

/*
    gradientChartOptionsConfigurationWithTooltipPurple = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            tooltips: {
                backgroundColor: '#f5f5f5',
                titleFontColor: '#333',
                bodyFontColor: '#666',
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest"
            },
            responsive: true,
            scales: {
                yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#9a9a9a"
                    }
                }],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(225,78,202,0.1)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9a9a9a"
                    }
                }]
            }
        };

*/
        var options2 =  {
                responsive: true,
                    title:{
                    display:true,
                    text:'test'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                    },
                scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                    display: true,
                    labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                    display: true,
                    },
                    ticks: {
                        beginAtZero: true,
                        max: number_max
                    },
                }]
                }
            }

        window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)'
        };


       

        var config = {
        type: 'bar',
        data: {
            labels: MONTHS,
            datasets: [{
                            label: indicator,
                            backgroundColor: window.chartColors.blue,
                            borderColor: window.chartColors.green,
                            //hoverBackgroundColor: ["#669911", "#669911","#669911","#669911","#669911","#669911","#669911","#669911","#669911","#669911","#669911","#669911"],
                            data: line1,
                            fill: false,
                        },  {
                            type: 'line',

                            label: "Meta",
                            backgroundColor: "green",
                            borderColor: "green",

                            data: goals,
                            fill: false
                        } 
                    ]
        },
            options:options2
        };

        //var ctx = document.getElementById("canvas").getContext("2d");
        //var myLine = new Chart(ctx, config);

        var options3 =  {
                responsive: true,
                    title:{
                    display:true,
                    text:'test'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                    },
                scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                    display: true,
                    padding: -8
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                    display: true,
                    },
                    ticks: {
                        beginAtZero: true,
                        max: number_max
                    },
                }]
                }
            }


       // var line1 = [100];

        var config = {
        type: 'bar',
        data: {
            labels: MONTHS,
            datasets: [{
                            type: 'line',

                            label: "Meta",
                            backgroundColor: "#1f68a8",
                            borderColor: "#1f68a8",

                            data: goals,
                            fill: false
                        } ,{
                            type: 'bar',
                            label:  indicator,
                            backgroundColor:  "#75b1e6"  ,
                            data:  line1,
                        },
                        {
                            type: 'line',
                            label: ((bad[0] == 0) ? "malo" : "bueno")  ,
                            backgroundColor: ((bad[0] == 0) ? "#e84747" : "#5fe14b"),
                            data: regular_1
                        },
                        {
                            type: 'line',
                            label: "regular",
                            backgroundColor: "#efea5c",
                            data: regular_2
                        },
                        {
                            type: 'line',
                            label:  ((good[0] == 0) ? "malo" : "bueno"),
                            backgroundColor: ((good[0] == 0) ? "#e84747" : "#5fe14b"),
                            data:  ((good[0] == 0) ? bad : good),
                        }
                             
                    ]
        },
            options:options3
        };

        var ctx = document.getElementById("canvas2").getContext("2d");
        var myLine = new Chart(ctx, config);


    });
 </script>