
@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Habitaciones -> Cambiar estado</h1>
@stop

@section('content') <!--style="background-color: red; padding: 2rem;"-->
    <div class="card">
        {!! Form::model($data,['route' => ['habitaciones.edit', $data->id_habitacion], 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'put']) !!}
        {!! Form::hidden('id_habitacion', $data->id_habitacion)!!}
        {!! Form::hidden('numero', $data->numero)!!}
        {!! Form::hidden('tipo', $data->tipo)!!}
        <div class="card-header">
            <h1 class="card-title">Datos de las habitaciones</h1>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <fieldset><legend>Datos generales:</legend>
                <div class="row">
                
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTList('estado', 'Estado de la habitacion', 'Estado de la habitacion',['Activa' => 'Activa', 'No activa' => 'No activa'],$data->estado, $errors, true) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" href="" class="btn btn-outline-info" title="Guardar">Guardar</button>
                    </div>
                </div>
                </fieldset>
            </div>
            <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>Los estados son los siguientes:</p>
                        <ul>
                            <li>Activa: La habitación puede ser usada por cualquer húesped</li>
                            <li>No activa: La habitación no esta disponible para uso(reparación, mejora, etc.)</li>
                        </ul>
                    </div>
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
