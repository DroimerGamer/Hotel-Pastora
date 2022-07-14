
@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
    <h1>Estadísticas por tipo de habitación</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header">
          <p>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>Se presentan las gráficas donde se distingue la cantidad de reservaciones hechas en un mes diferenciándolas por el tipo de habitación elegida por el húesped y solo si la reservación terminó en estado de realizada: </p>
        <li><a class="text-green">Realizada</a>: Cuando el cliente ya realizo el pago y ya se encuentra en el hotel.</li>
        </div>
        <h5></h5>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
         <canvas id="myChart"></canvas>
        </div>
</div>
        <br>
<div class="card">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
         <canvas id="myChart2"></canvas>
        </div>  
</div> 
<div class="card">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <canvas id="myChart3"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</div> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> 
    var datos = [<?=$tipo1?>, <?=$tipo1P?>, <?=$tipo2?>, <?=$tipo3?>, <?=$tipoP?>]

  const labels = [
    'Tipo 1',
    'Tipo 1 - Premium',
    'Tipo 2',
    'Tipo 3',
    'Tipo Premium',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Reservaciones',
      backgroundColor: [
      'rgb(84, 182, 255)',
      'rgb(65, 142, 219)',
      'rgb(52, 113, 175)',
      'rgb(38, 83, 128)',
      'rgb(27, 53, 108)'
    ],
    data: datos,
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function(value) {if (value % 1 === 0) {return value;}}
                }
            }],
        },
    }
  };

  
  const config2 = {
    type: 'doughnut',
    data: data
  };

  const config3 = {
    type: 'polarArea',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );

  const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config3
  );

  
</script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
@stop
