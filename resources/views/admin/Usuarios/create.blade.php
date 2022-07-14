<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios -> Guardar nuevo usuarios</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => 'Usuarios.store', 'enctype' => "multipart/form-data", 'method' => 'post']) !!}
        <div class="card-header">
            <h1 class="card-title">Datos de usuario.</h1>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <fieldset><legend>Datos de cuenta:</legend>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('name', 'Nombre de usuario', 'Nombre ', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTEmail('email', 'Correo electronico', 'correo', null, $errors, 150, true) !!}
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTPassword('password', 'Contraseña', 'Contraseña', null, $errors, 150, true); !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTList('roles', 'Rol de usuario', 'Rol de usuario',['Seleccione uno...'=> 'Seleccione uno...','Admin' => 'Administrador', 'Auxiliar' => 'Auxiliar', 'Recepcionista' => 'Recepcionista', ],'Seleccione uno...', $errors, true) !!}
                    </div>
                    
              
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" href="" class="btn btn-outline-success" title="Guardar">Guardar</button>
                    </div>
                </div>
                </fieldset>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>Rol de usuario:</p>
                        <ul>
                            <li>Administrador: Agregar y eliminar usuarios, visualización de reservaciones y visualizacón de estadísticas. </li>
                            <li>Auxiliar: Agregar, editar y eliminar empleados, visualizacón de reservaciones y visualización de estadísticas.</li>
                            <li>Recepcionista: Agregar, editar y eliminar información de reservaciones.</li>
                        </ul>
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
