@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open([
                'route' => 'admin.roles.store',
            ]) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Crear rol', [
                'class' => 'btn btn-primary',
            ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="shortcut icon" href="{{ Storage::url('IC_JMProject.png') }}">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
