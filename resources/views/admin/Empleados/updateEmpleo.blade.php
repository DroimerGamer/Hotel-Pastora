<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Empleo')

@section('content_header')
    <h1>Editar datos de empleo.</h1>
@stop

@section('content') 
    <div class="card">
        {!! Form::model($data,['route' => ['Empleados.edit_empleo', $data->id_empleo], 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'put']) !!}
        {!! Form::hidden('id_empleo', $data->id_empleo)!!}   

        <div class="card-header">
            <h1 class="card-title">Empleo</h1>
        </div>
        <div class="card-body">
        
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Empleo:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('puesto', 'Puesto', 'Puesto del empleado', $data->puesto, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('horario_entrada', 'Horario de entrada', 'Horario de entrada del empleado', $data->horario_entrada, $errors, 5) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('horario_salida', 'Horario de salida', 'Horario de salida del empleado', $data->horario_salida, $errors, 40) !!}
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" href="" class="btn btn-outline-info" title="Guardar">Guardar</button>
                    </div>
                </div>
                </fieldset>
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