@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="shortcut icon" href="{{ Storage::url('IC_JMProject.png') }}">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
