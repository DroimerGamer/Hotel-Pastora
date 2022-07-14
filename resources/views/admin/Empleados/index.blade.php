
<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
    
        <p>Vista de la tabla empleados</p>
<!-- Hover Rows -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body table-responsive">

                <!-- Buscador  -->
                <div class="row">
                    <
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <h5><strong>{{$data->total()}}</strong> Registro(s) encontrado(s).
                            P&aacute;gina
                            <strong>{{($data->total()==0) ? '0' : $data->currentPage()}}</strong> de
                            <strong> {{$data->lastPage()}}</strong>.
                            Registros por p&aacute;gina
                            <strong>{{($data->total()==0) ? '0' : $data->perPage()}}</strong></h5>
                    </div>
                    <div class="title_right">
                        <div class="col-md-12 col-sm-5 col-xs-12 form-group pull-right top_search">

                            <form action="{{route('Empleados.index')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                           value="{{$search}}"
                                           placeholder="Buscar por nombre o CURP..." style="border: 1px solid #ccc!important;width: 98%;">
                                    <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Buscar</button>
                                            </span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <a style="margin: 0 0 10px 85%" type="button" href="{{ route('Empleados.create')}}" class="btn btn-outline-success">Nuevo registro</a>
                <!-- Finalizar buscador  -->

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Edad</th>
                        <th style="text-align: center;">Telefono</th>
                        <th style="text-align: center;">NSS</th>
                        <th style="text-align: center;">CURP</th>
                        <th style="text-align: center;">Hora de entrada</th>
                        <th style="text-align: center;">Hora de salida</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td style="text-align: center;">{{$row->nombre}}</td>
                            <td style="text-align: center;">{{$row->edad}}</td>
                            <td style="text-align: center;">{{$row->telefono}}</td>
                            <td style="text-align: center;">{{$row->nss}}</td>
                            <td style="text-align: center;">{{$row->curp}}</td>
                            <td style="text-align: center;">{{$row->horario_entrada}}</td>
                            <td style="text-align: center;">{{$row->horario_salida}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group" style="display: inline!important;">
                                    <a class='btn btn-outline-warning' style="float: none!important;" href="{{route('Empleados.show', $row->id_empleado)}}" title='Mostrar registro'><i class="material-icons">Mostrar</i></a>
                                    <a class='btn btn-outline-danger' style="float: none!important;" href="{{route('Empleados.delete', $row->id_empleado)}}" title='Eliminar Registro'><i class="material-icons">Eliminar</i></a>
                                    
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginador -->
            {!! $data->setPath(route('Empleados.index'))->appends(Request::except('page'))->render() !!}
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
@stop
