<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
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
                    
                </div>
                <a style="margin: 0 0 10px 85%" type="button" href="{{ route('Usuarios.create')}}" class="btn btn-outline-success">Nuevo registro</a>
                <!-- Finalizar buscador  -->

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Correo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td style="text-align: center;">{{$row->name}}</td>
                            <td style="text-align: center;">{{$row->email}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group" style="display: inline!important;">
                                    <a class='btn btn-outline-danger' style="float: none!important;" href="{{route('Usuarios.delete', $row->id)}}" title='Eliminar Registro'><i class="material-icons">Eliminar</i></a>
                                    
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginador -->
            {!! $data->setPath(route('Usuarios.index'))->appends(Request::except('page'))->render() !!}
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
