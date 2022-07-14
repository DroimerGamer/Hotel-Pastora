
@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
    <h1>Estadísticas en <?php echo date("20y") ?></h1>
@stop

@section('content')
<div class="card">
        {!! Form::open(['route' => 'estadisticas.generar', 'enctype' => "multipart/form-data"]) !!}
        <div class="card-header">
            <h1 class="card-title">Generador de gráficas</h1>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <fieldset><legend>Escoja las opciones que desee para generar una gráfica:</legend><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTList('por', 'Estadisticas', 'Filtro para saber tipo de estadisticas',['tipo' => 'Por tipo de habitación', 'estado' => 'Por estado de reservación'], null, $errors, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTList('mes', 'Mes', 'mes del cual desea saber estadisticas',['01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'],null, $errors, true) !!}
                    </div>
                  
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button style="margin: 20px 0 10px 85%" type="submit" href="" class="btn btn-outline-info" title="Guardar">Generar gráficas</button>
                    </div>
                </div>
                </fieldset>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{URL::asset('js/validatorFields.js')}}"></script>
    <!-- 
    JC Zomboy Developper
    -->
@stop
