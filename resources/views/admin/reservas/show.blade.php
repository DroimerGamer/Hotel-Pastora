@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1>Reservaciones</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #A2138A;">
        <h1 class="text-white">Datos de la reservación</h1>
        <div class="row">
            <a style="margin: 0 0 10px 85%" type="button" href="{{ route('reservas.index')}}" class="btn btn-outline-light">Regresar</a>
        </div>
    </div>
    <div class="card-body">
                @foreach($data as $row)
                <div class="card">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Reservación hecha por: </label><p>{{ $row->created_by }}</p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Última modificación hecha por: </label><p>{{ $row->last_modification_by }}</p>
                </div>
                </div>
                </div>

                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Datos del cliente:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Nombre completo: </label><p>{{ $row->nombre }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Edad: </label><p>{{ $row->edad }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Telefono: </label><p>{{ $row->telefono }}</p>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    @can('recepcionista')
                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('reservas.update_persona', $row->id_persona)}}" title='Editar registro'><i class="material-icons">Editar</i></a>
                    @endcan
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Correo Electronico: </label><p>{{ $row->correo_electronico }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Empresa: </label><p>{{ $row->empresa }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Automovil: </label><p>{{ $row->automovil }}</p>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    @can('recepcionista')
                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('reservas.update_cliente', $row->id_cliente)}}" title='Editar registro'><i class="material-icons">Editar</i></a>
                      @endcan
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <fieldset><Legend>Domicilio:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Ciudad: </label><p>{{ $row->ciudad }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Estado: </label><p>{{ $row->estado }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Codigo Postal: </label><p>{{ $row->cp }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Colonia: </label><p>{{ $row->colonia }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Calle: </label><p>{{ $row->calle }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Numero: </label><p>{{ $row->numero }}</p>
                    </div>
                    @can('recepcionista')
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('reservas.update_domicilio', $row->id_domicilio)}}" title='Editar registro'><i class="material-icons">Editar</i></a>
                    </div>
                  @endcan
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <fieldset><Legend>Datos de hospedaje:</Legend>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Fecha de entrada: </label><p>{{ $row->fecha_entrada }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Fecha de salida: </label><p>{{ $row->fecha_salida }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Check in: </label><p>{{ $row->hora_entrada }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Check out: </label><p>{{ $row->hora_salida }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Cantidad de personas: </label><p>{{ $row->cant_personas }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Estado de reservación: </label><p>{{ $row->estado_reserva }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Numero de habitación: </label><p># {{ $row->habitacion }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label>Tipo: </label><p>{{ $row->tipo }}</p>
                    </div>
                    @can('recepcionista')
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('reservas.update_reserva', $row->id_reservacion)}}" title='Editar registro'><i class="material-icons">Editar</i></a>
                    </div>
               @endcan
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    </div>
                </div>
                @endforeach
            </fieldset>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
