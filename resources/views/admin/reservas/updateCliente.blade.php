
@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>Editar Datos</h1>
@stop

@section('content') 
    <div class="card">
        {!! Form::model($data,['route' => ['reservas.edit_cliente', $data->id_cliente], 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'put']) !!}
        {!! Form::hidden('id_cliente', $data->id_cliente)!!}
        {!! Form::hidden('last_modification_by', Auth::user()->name)!!}    
   

        <div class="card-header">
            <h1 class="card-title">Datos del cliente</h1>
        </div>
        <div class="card-body">
        
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Datos del cliente:</Legend>
                    </div>
                   
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTEmail('correo_electronico', 'Correo Electronico', 'Correo electronico del cliente', $data->correo_electronico, $errors, 50) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('empresa', 'Empresa', 'Empresa del cliente(si aplica)', $data->empresa, $errors, 30) !!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('automovil', 'Datos de automovil', 'Caracteristicas del automovil cliente', $data->automovil, $errors, 60) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" href="" class="btn btn-outline-info" title="Guardar">Guardar</button>
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
