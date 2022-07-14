
@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1>Todas las reservaciones</h1>
@stop

@section('content')
<div class="card">
        <div class="header">
        <div class="col-md-5 col-sm-5 col-xs-6">
                            <form action="{{route('reservas.index2')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                           value="{{$search}}"
                                           placeholder="Nombre" style="border: 1px solid #ccc!important;width: 98%;">
                                    <span class="input-group-btn">
                                                <button class="btn btn-outline-dark" type="submit">Buscar!</button>
                                            </span>
                                </div>
                            </form>
                            </div>
            
        </div>
       
<!-- Hover Rows -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body table-responsive">

                <!-- Buscador  -->
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <h5><strong>{{$data->total()}}</strong> Registro(s) encontrado(s).
                            P&aacute;gina
                            <strong>{{($data->total()==0) ? '0' : $data->currentPage()}}</strong> de
                            <strong> {{$data->lastPage()}}</strong>.
                            Registros por p&aacute;gina
                            <strong>{{($data->total()==0) ? '0' : $data->perPage()}}</strong></h5>
                    </div>
                    <div class="title_right">
                        <div class="col-md-12 col-sm-12 col-xs-12">

            
                            {!! Form::open(['route' => 'reservas.index2', 'enctype' => "multipart/form-data", 'method' => 'get']) !!}
                           
                                {!! Form::UTCalendar('search', 'Buscar por fecha', 'Fecha para busqueda', null, $errors) !!}
                                    
                                    <span class="input-group-btn">
                                                <button class="btn btn-outline-dark" type="submit">Buscar!</button>
                                            </span>
                                </div>
                                

                        </div>

                        
                    
                </div>

                <div class="btn-group" style="display: inline!important;">
                <a class='btn btn-outline-dark' style="float: none!important; margin: 10px 0 10px 10px" href="{{route('reservas.index')}}" title='mostrar reservaciones y hospedaje de hoy'><i class="material-icons">Reservaciones para hoy</i></a>
                @can('recepcionista')
                <a class='btn btn-outline-success' style="float: none!important; margin: 10px 0 10px 700px" href="{{route('reservas.create')}}" title='agregar nueva reservación'><i class="material-icons">Nueva reservación</i></a>
                @endcan
                </div>
        
                <!-- Finalizar buscador  -->

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Cliente</th>
                        <th style="text-align: center;">Telefono</th>
                        <th style="text-align: center;">Fecha de entrada</th>
                        <th style="text-align: center;">Hora de entrada</th>
                        <th style="text-align: center;">Fecha de salida</th>
                        <th style="text-align: center;">Habitacion</th>
                        <th style="text-align: center;">Estado</th>
                        <th style="text-align: center;">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td style="text-align: center;">{{$row->nombre}}</td>
                            <td style="text-align: center;">{{$row->telefono}}</td>
                            <td style="text-align: center;">{{$row->fecha_entrada}}</td>
                            <td style="text-align: center;">{{$row->hora_entrada}}</td>
                            <td style="text-align: center;">{{$row->fecha_salida}}</td>
                            <td style="text-align: center;"># {{$row->habitacion}}</td>
                            @if($row->estado_reserva === 'Pendiente')
                            <td class="text-gray" style="text-align: center;"><b>{{$row->estado_reserva}}</b></td>
                            @endif
                            @if($row->estado_reserva === 'Confirmada')
                            <td class="text-orange" style="text-align: center;"><b>{{$row->estado_reserva}}</b></td>
                            @endif
                            @if($row->estado_reserva === 'Realizada')
                            <td class="text-green" style="text-align: center;"><b>{{$row->estado_reserva}}</b></td>
                            @endif
                            @if($row->estado_reserva === 'Pospuesta')
                            <td class="text-yellow" style="text-align: center;"><b>{{$row->estado_reserva}}</b></td>
                            @endif
                            <td style="text-align: center;">
                                <div class="btn-group" style="display: inline!important;">
                                <a class='btn btn-outline-warning' style="float: none!important;" href="{{route('reservas.show', $row->id_reservacion)}}" title='mostrar registro'><i class="material-icons">Mostrar</i></a>
                                @can('recepcionista')

                                <a class='btn btn-outline-danger' style="float: none!important;" href="{{route('reservas.delete', $row->id_reservacion)}}" title='cancelar reservacion'><i class="material-icons">Cancelar</i></a>

                                @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginador -->
            {!! $data->setPath(route('reservas.index2'))->appends(Request::except('page'))->render() !!}
            <!-- Finalizar paginador -->

            </div>
        </div>
    </div>
</div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <!-- 
    JC Zomboy Developper
    -->
@stop
