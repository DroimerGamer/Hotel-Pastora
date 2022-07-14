
@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Habitaciones -> Disponibilidad</h1>
@stop

@section('content')
<div class="card">
        <div class="header">
        
            
        </div>
       
<!-- Hover Rows -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
            <div class="card-body">

                <!-- Buscador  -->
                <div class="row">
                    
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul>
                    <li><a class="text-green">Verde</a>: Disponible</li>
                    <li><a class="text-yellow">Amarillo</a>: En limpieza</li>
                    <li><a class="text-red">Rojo</a>: Ocupada</li>
                        </ul>
                    </div>
        
                <!-- Finalizar buscador  -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Tipo 1:</Legend>
                    </div>
            <div class="row gx-4 gx-lg-5">
            @foreach($tipo1 as $row)
                <div class="col-md-2 mb-2">
                    <div class="card">
                        <div class="card-body">
                            @if($row->disponible == 1)
                            {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 2)!!}
                            <button type="submit" href="" class="btn btn-danger" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 2)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 3)!!}
                            <button type="submit" href="" class="btn btn-warning" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 3)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 1)!!}
                            <button type="submit" href="" class="btn btn-success" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        </div>
                        
                    </div>
                </div> 
                 @endforeach  
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Tipo 1 - Premium:</Legend>
                    </div>
            <div class="row gx-4 gx-lg-5">
            @foreach($tipo1P as $row)
                <div class="col-md-2 mb-2">
                    <div class="card">
                        <div class="card-body">
                        @if($row->disponible == 1)
                            {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 2)!!}
                            <button type="submit" href="" class="btn btn-danger" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 2)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 3)!!}
                            <button type="submit" href="" class="btn btn-warning" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 3)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 1)!!}
                            <button type="submit" href="" class="btn btn-success" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        </div>
                        
                    </div>
                </div> 
                 @endforeach  
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Tipo 2:</Legend>
                    </div>
            <div class="row gx-4 gx-lg-5">
            @foreach($tipo2 as $row)
                <div class="col-md-2 mb-2">
                    <div class="card">
                        <div class="card-body">
                        @if($row->disponible == 1)
                            {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 2)!!}
                            <button type="submit" href="" class="btn btn-danger" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 2)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 3)!!}
                            <button type="submit" href="" class="btn btn-warning" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 3)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 1)!!}
                            <button type="submit" href="" class="btn btn-success" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        </div>
                        
                    </div>
                </div> 
                 @endforeach  
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Tipo 3:</Legend>
                    </div>
            <div class="row gx-4 gx-lg-5">
            @foreach($tipo3 as $row)
                <div class="col-md-2 mb-2">
                    <div class="card">
                        <div class="card-body">
                        @if($row->disponible == 1)
                            {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 2)!!}
                            <button type="submit" href="" class="btn btn-danger" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 2)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 3)!!}
                            <button type="submit" href="" class="btn btn-warning" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 3)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 1)!!}
                            <button type="submit" href="" class="btn btn-success" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        </div>
                        
                    </div>
                </div> 
                 @endforeach  
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <fieldset><Legend>Tipo Premium:</Legend>
                    </div>
            <div class="row gx-4 gx-lg-5">
            @foreach($tipoP as $row)
                <div class="col-md-2 mb-2">
                    <div class="card">
                        <div class="card-body">
                        @if($row->disponible == 1)
                            {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 2)!!}
                            <button type="submit" href="" class="btn btn-danger" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 2)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 3)!!}
                            <button type="submit" href="" class="btn btn-warning" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        @if($row->disponible == 3)
                        {!! Form::model($row,['route' => ['habitaciones.edit2', $row->id_habitacion], 'enctype' => "multipart/form-data", 'method' => 'put']) !!}
                            {!! Form::hidden('id_habitacion', $row->id_habitacion)!!}
                            {!! Form::hidden('disponible', 1)!!}
                            <button type="submit" href="" class="btn btn-success" title="Guardar">#{{ $row->numero}}</button>
                            {!! Form::close() !!}
                        @endif
                        </div>
                        
                    </div>
                </div> 
                 @endforeach  
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
