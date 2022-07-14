
@extends('adminlte::page')

@section('title', 'Domicilio')

@section('content_header')
    <h1>Editar domicilio del cliente</h1>
@stop

@section('content') 
    <div class="card">
        {!! Form::model($data,['route' => ['reservas.edit_domicilio', $data->id_domicilio], 'enctype' => "multipart/form-data", 'file' => true, 'method' => 'put']) !!}
        {!! Form::hidden('id_domicilio', $data->id_domicilio)!!}
        {!! Form::hidden('last_modification_by', Auth::user()->name)!!}    
   

        <div class="card-header">
            <h1 class="card-title">Domicilio</h1>
        </div>
        <div class="card-body">
        
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Domicilio:</Legend>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('ciudad', 'Ciudad', 'Ciudad donde reside', $data->ciudad, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('estado', 'Estado', 'Estado donde reside', $data->estado, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTNumeric('cp', 'Codigo Postal', 'Codigo Postal donde reside', $data->cp, $errors, 5) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('colonia', 'Colonia', 'Colonia donde reside', $data->colonia, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('calle', 'Calle', 'Calle donde reside', $data->calle, $errors, 40) !!}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::UTText('numero', 'Numero', 'Numero de casa donde reside', $data->numero, $errors, 8) !!}
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
