<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Empleados -> Guardar nuevo empleado</h1>
@stop

@section('content') <!--style="background-color: red; padding: 2rem;"-->
    <div class="card">
        {!! Form::open(['route' => 'Empleados.persona', 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'post']) !!}
        <div class="card-header">
            <h1 class="card-title">Datos de empleados.</h1>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <fieldset><legend>Datos generales:</legend>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('nombre', 'Nombre', 'Nombre del empleado', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('apellido_paterno', 'Apellido paterno', 'Apellido paterno del empleado', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('apellido_materno', 'Apellido materno', 'Apellido materno del empleado', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('edad', 'Edad', 'Edad del empleado', null, $errors, 2, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('telefono', 'Teléfono celular', 'Teléfono del empleado', null, $errors, 10, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('curp', 'CURP', 'CURP del empleado', null, $errors, 18, true) !!}
                    </div>
                    <fieldset>
                </div>
                <fieldset><legend>Datos del domicilio:</legend>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('ciudad', 'Ciudad', 'Ciudad del empleado', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('estado', 'Estado', 'Ciudad del empleado', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('cp', 'CP', 'Codigo postal del empleado', null, $errors, 5, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('colonia', 'Colonia', 'Colonia del empleado', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('calle', 'Calle', 'Calle del empleado', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('numero', 'Número', 'Número de casa del empleado', null, $errors, 150, true) !!}
                    </div>
                    <fieldset>
                </div>
                <fieldset><legend>Datos de empleo:</legend>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('rfc', 'RFC', 'RFC del empleado', null, $errors, 13, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('nss', 'NSS', 'NSS del empleado', null, $errors, 11, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTList('nivel_de_estudio', 'Ultimo nivel de estudio', 'Nivel de estudio del empleado',['Seleccione uno...'=> 'Seleccione uno...','Prescolar' => 'Prescolar', 'Primaria' => 'Primaria', 'Secundaria' => 'Secundaria', 'Bachiller' => 'Bachiller','Tecnico superior universitario' => 'Tecnico superior universitario','Licenciatura' => 'Licenciatura', 'Maestria' => 'Maestria','Doctorado' => 'Doctorado', ],'Seleccione uno...', $errors, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('puesto', 'Puesto de empleo', 'Puesto de empleo', null, $errors, 150, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText(' horario_entrada', 'Horario de entrada', 'Horario de entrada del empleado', '00:00', $errors, 5, true) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('horario_salida', 'Horario de salida', 'Horario de salida del empleado', '00:00', $errors, 5, true) !!}
                    </div>
                    <fieldset>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" href="" class="btn btn-outline-success" title="Guardar">Guardar</button>
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
@stop
