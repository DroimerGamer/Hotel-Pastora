
@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Habitaciones</h1>
@stop

@section('content')
<div class="card">
        <div class="header">
        
            
        </div>
       
<!-- Hover Rows -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body table-responsive">

                <!-- Buscador  -->
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <h5><strong>{{$data->total()}}</strong> Registro(s) encontrado(s).
                            P&aacute;gina
                            <strong>{{($data->total()==0) ? '0' : $data->currentPage()}}</strong> de
                            <strong> {{$data->lastPage()}}</strong>.
                            Registros por p&aacute;gina
                            <strong>{{($data->total()==0) ? '0' : $data->perPage()}}</strong></h5>
                    </div>
                    <div class="title_right">
                        <div class="col-md-8 col-sm-5 col-xs-12 form-group pull-right top_search">

                            <form action="{{route('habitaciones.index')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                           value="{{$search}}"
                                           placeholder="Numero/Tipo" style="border: 1px solid #ccc!important;width: 98%;">
                                    <span class="input-group-btn">
                                                <button class="btn btn-outline-dark" type="submit">Buscar!</button>
                                            </span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <a style="margin: 0 0 10px 85%" type="button" href="{{ route('habitaciones.create')}}" class="btn btn-outline-success">Nueva habitación</a>
        
                <!-- Finalizar buscador  -->

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Numero</th>
                        <th style="text-align: center;">Tipo</th>
                        <th style="text-align: center;">Estado</th>
                        <th style="text-align: center;">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td style="text-align: center;">#  {{$row->numero}}</td>
                            <td style="text-align: center;">{{$row->tipo}}</td>
                            <td style="text-align: center;">{{$row->estado}}</td>
                            
                            <td style="text-align: center;">
                                <div class="btn-group" style="display: inline!important;">

                                    <a class='btn btn-outline-primary' style="float: none!important;" href="{{route('habitaciones.update', $row->id_habitacion)}}" title='Editar registro'><i class="material-icons">Cambiar estado</i></a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginador -->
            {!! $data->setPath(route('habitaciones.index'))->appends(Request::except('page'))->render() !!}
            <!-- Finalizar paginador -->

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
    <!-- 
    JC Zomboy Developper
    -->
@stop
