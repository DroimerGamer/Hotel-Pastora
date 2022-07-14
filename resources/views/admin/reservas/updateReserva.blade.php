
@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1>Editar Reservación</h1>
@stop

@section('content') 
    <div class="card">
        {!! Form::model($data,['route' => ['reservas.edit_reserva', $data->id_reservacion], 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'put']) !!}
        {!! Form::hidden('id_reservacion', $data->id_reservacion)!!} 
        {!! Form::hidden('last_modification_by', Auth::user()->name)!!}    

        <div class="card-header">
            <h1 class="card-title">Datos de reservación</h1>
        </div>
        <div class="card-body">
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Reservación / Hospedaje:</Legend>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTCalendar('fecha_entrada', 'Fecha de entrada', 'Fecha de entrada del húesped', $data->fecha_entrada, $errors, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTCalendar('fecha_salida', 'Fecha de salida', 'Fecha de salida del húesped', $data->fecha_salida, $errors, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('hora_entrada', 'Check in', 'Hora de entrada del húesped', $data->hora_entrada, $errors, 8) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('hora_salida', 'Check out', 'Hora de salida del húesped', $data->hora_salida, $errors, 8) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('cant_personas', 'Cantidad de personas', 'Cantidad de personas a hospedarse', $data->cant_personas, $errors, 1, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        
                    </div>
                    <!--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Numero de habitación: </label><p> {{ $data->ha }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Tipo: </label><p>{{ $data->tipo }}</p>
                    </div>-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTList('estado', 'Estado de la reservación', 'Estado de la reservación',['Pendiente' => 'Pendiente', 'Confirmada' => 'Confirmada', 'Realizada' => 'Realizada', 'Pospuesta' => 'Pospuesta'],$data->estado, $errors, true) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" href="" class="btn btn-outline-info" title="Guardar">Guardar</button>
                    </div>
                </div>
                </fieldset>
            </div>
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>Los estados de la reservación son los siguientes:</p>
                        <ul>
                            <li><a class="text-gray">Pendiente</a>: Cuando el cliente puede o no realizar la reservación</li>
                            <li><a class="text-orange">Confirmada</a>: Cuando el cliente ya acepta hacer la reservación pide datos de pago.</li>
                            <li><a class="text-green">Realizada</a>: Cuando el cliente ya realizo el pago y ya se encuentra en el hotel.</li>
                            <li><a class="text-yellow">Pospuesta</a>: Cuando el cliente ya pago, pero no pudo el día propuesto y debe cambiar la fecha</li>
                        </ul>
                    </div>
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
@stop
