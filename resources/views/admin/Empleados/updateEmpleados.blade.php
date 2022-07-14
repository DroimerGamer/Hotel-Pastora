<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Editar datos del empleado</h1>
@stop

@section('content') 
    <div class="card">
        {!! Form::model($data,['route' => ['Empleados.edit_empleados', $data->id_empleado], 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'put']) !!}
        {!! Form::hidden('id_empleado', $data->id_empleado)!!}   

        <div class="card-header">
            <h1 class="card-title">Empleados</h1>
        </div>
        <div class="card-body">
        
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Empleado:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('rfc', 'RFC', 'RCF del empleado', $data->rfc, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('nss', 'NSS', 'NSS del empleado', $data->nss, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('nivel_de_estudio', 'Nivel de estudio', 'Nivel de estudio del empleado', $data->nivel_de_estudio, $errors, 5) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('curp', 'CURP', 'CURP del empleado', $data->curp, $errors, 40) !!}
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