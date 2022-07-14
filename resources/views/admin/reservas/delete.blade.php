<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1>Reservas -> Cancelar reservación</h1>
@stop

@section('content')
<div class="card">
@foreach($data as $row)
{!! Form::open(['route' => 'reservas.destroy', 'method' => 'post']) !!}
{!! Form::hidden('id_reservacion',$row->id_reservacion) !!}
{!! Form::hidden('id_cliente',$row->id_cliente) !!}
{!! Form::hidden('id_persona',$row->id_persona) !!}
{!! Form::hidden('id_domicilio',$row->id_domicilio) !!}
@endforeach

    <div class="card-header" >
        <h1 class="card-title">Cancelar reservación</h1>
    </div>
    <div class="card-body">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <fieldset><Legend>¿Seguro que desea cancelar la reservación?</Legend>
            <div class="row">
                    <div class="header">
            
            <a type="button" href="{{ route('reservas.index')}}" class="btn btn-outline-dark">No, regresar</a>
            <button type="submit" href="" class="btn btn-outline-dark" title="Guardar">Sí, eliminar</button>
              </div>
                </div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    
                
               
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    </div>
                </div>
                
            </fieldset>
        </div>
    </div>
  
    {!! Form::close()!!}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
