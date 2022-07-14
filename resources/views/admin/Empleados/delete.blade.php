<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Empleados -> Eliminar empleado</h1>
@stop

@section('content')
<div class="card">

{!! Form::open(['route' => 'Empleados.destroy', 'method' => 'post']) !!}
{!! Form::hidden('id_empleado',$data->id_empleado) !!}

    <div class="card-header" >
        <h1 class="card-title">Eliminación del empleado</h1>
    </div>
    <div class="card-body">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <fieldset><Legend>¿Seguro que desea elimiar al empleado?</Legend>
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
