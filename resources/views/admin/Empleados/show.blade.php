<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Empleados -> Mostrar empleado</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #A2138A ;">
        <h1 class="text-white">Datos del empleado.</h1>
        <div class="row">
            <a style="margin: 0 0 10px 85%" type="button" href="{{ route('Empleados.index')}}" class="btn btn-outline-light "> Regresar</a>
        </div>
    </div>
    <div class="card-body">
                @foreach($data as $row)
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Datos del personales:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Nombre completo: </label><p>{{ $row->nombre }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Edad: </label><p>{{ $row->edad }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Teléfono celular: </label><p>{{ $row->telefono }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>CURP: </label><p>{{ $row->curp }}</p>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    
                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('Empleados.update_persona', $row->id_persona)}}" title='Editar registro'><i class="material-icons">Editar</i></a>
                   
                    </div>
            
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <fieldset><Legend>Domicilio:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Ciudad: </label><p>{{ $row->ciudad }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>CP: </label><p>{{ $row->cp }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Colonia: </label><p>{{ $row->colonia }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Calle: </label><p>{{ $row->calle }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Número: </label><p>{{ $row->numero }}</p>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('Empleados.update_domicilio', $row->id_domicilio)}}" title='Editar registro'><i class="material-icons">Editar</i></a>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <fieldset><Legend>Datos de empleo:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>RFC: </label><p>{{ $row->rfc }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>NSS: </label><p>{{ $row->nss }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Ultimo nivel de estudio: </label><p>{{ $row->nivel_de_estudio }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Puesto de empleo: </label><p>{{ $row->puesto }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Horario de entrada: </label><p>{{ $row->horario_entrada }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label>Horario de salida: </label><p>{{ $row->horario_salida }}</p>
                    </div>
                    
                    
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('Empleados.update_empleados', $row->id_empleado)}}" title='Editar registro'><i class="material-icons">Editar</i></a>
                    </div>
               
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