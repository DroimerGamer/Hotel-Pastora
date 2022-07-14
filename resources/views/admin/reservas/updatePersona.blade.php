
@extends('adminlte::page')

@section('title', 'Datos Personales')

@section('content_header')
    <h1>Editar datos personales</h1>
@stop

@section('content') 
    <div class="card">
        {!! Form::model($data,['route' => ['reservas.edit_persona', $data->id_persona], 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'put']) !!}
        {!! Form::hidden('id_persona', $data->id_persona)!!}
        {!! Form::hidden('last_modification_by', Auth::user()->name)!!}    

        <div class="card-header">
            <h1 class="card-title">Datos Personales del cliente</h1>
        </div>
        <div class="card-body">
        
                <div class="row">
             
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('nombre', 'Nombre', 'Nombre del cliente', $data->nombre, $errors, 40, true) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('apellido_paterno', 'Apellido Paterno', 'Apellido paterno del cliente', $data->apellido_paterno, $errors, 40, true) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('apellido_materno', 'Apellido Materno', 'Apellido materno del cliente', $data->apellido_materno, $errors, 40, true) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('edad', 'Edad', 'Edad del cliente', $data->edad, $errors, 2) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('telefono', 'Teléfono', 'Numero de teléfono del cliente', $data->telefono, $errors, 10, true) !!}
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
