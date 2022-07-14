
@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1>Reservaciones -> Nueva Reservación</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => 'reservas.store', 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'post']) !!}
        {!! Form::hidden('created_by', Auth::user()->name)!!} 
        <div class="card-header">
            <h1 class="card-title">Datos de reservación</h1>
        </div>
        <div class="card-body">
        
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Datos del cliente:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('nombre', 'Nombre', 'Nombre del cliente', null, $errors, 40, true) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('apellido_paterno', 'Apellido Paterno', 'Apellido paterno del cliente', null, $errors, 40, true) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('apellido_materno', 'Apellido Materno', 'Apellido materno del cliente', null, $errors, 40, true) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('edad', 'Edad', 'Edad del cliente', null, $errors, 2) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('telefono', 'Teléfono', 'Numero de teléfono del cliente', null, $errors, 10, true) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTEmail('correo_electronico', 'Correo Electronico', 'Correo electronico del cliente', null, $errors, 50) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('empresa', 'Empresa', 'Empresa del cliente(si aplica)', null, $errors, 30) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('automovil', 'Datos de automovil', 'Caracteristicas del automovil cliente', null, $errors, 60) !!}
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Domicilio:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('ciudad', 'Ciudad', 'Ciudad donde reside', null, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('estado', 'Estado', 'Estado donde reside', null, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('cp', 'Codigo Postal', 'Codigo Postal donde reside', null, $errors, 5) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('colonia', 'Colonia', 'Colonia donde reside', null, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('calle', 'Calle', 'Calle donde reside', null, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('numero', 'Numero', 'Numero de casa donde reside', null, $errors, 8) !!}
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Reservación / Hospedaje:</Legend>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTCalendar('fecha_entrada', 'Fecha de entrada', 'Fecha de entrada del húesped', null, $errors, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTCalendar('fecha_salida', 'Fecha de salida', 'Fecha de salida del húesped', null, $errors, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('hora_entrada', 'Check in', 'Hora de entrada del húesped', '14:00', $errors, 8) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('hora_salida', 'Check out', 'Hora de salida del húesped', '13:00', $errors, 8) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('cant_personas', 'Cantidad de personas', 'Cantidad de personas a hospedarse', null, $errors, 1, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label class='form-label' title='Habitacion a reservar'>Habitacion para reservar<span class=\"required\" style='color:red!important;'>&nbsp;<strong>*</strong></span></label></label>
                    <select class="form-control" aria-label="Default select example" name="id_habitacion">
                    <option selected>Seleccione una habitacion</option>
                    @foreach($data as $row)
                    <option value="{{ $row->id_habitacion }}">{{ $row->habitaciones }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTList('estado_reserva', 'Estado de la reservación', 'Estado de la reservación',['Pendiente' => 'Pendiente', 'Confirmada' => 'Confirmada', 'Realizada' => 'Realizada', 'Pospuesta' => 'Pospuesta'],null, $errors, true) !!}
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
