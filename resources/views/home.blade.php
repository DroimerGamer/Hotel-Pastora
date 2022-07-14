@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hotel Pastora</h1>
@stop

@section('content')
    <h1>Bienvenido(a) <?php  echo Auth::user()->name;?> </h1>
    <!-- 
    JC Zomboy Developper
    -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop