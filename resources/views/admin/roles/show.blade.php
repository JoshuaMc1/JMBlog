@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    <h1>Mostrar rol</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="shortcut icon" href="{{ Storage::url('IC_JMProject.png') }}">
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
