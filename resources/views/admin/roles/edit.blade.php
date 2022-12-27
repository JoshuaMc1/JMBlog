@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, [
                'route' => ['admin.roles.update', $role],
                'method' => 'PUT',
            ]) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Editar rol', [
                'class' => 'btn btn-primary',
            ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="shortcut icon" href="{{ Storage::url('IC_JMProject.png') }}">
@stop
