@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('admin.posts.create') }}">Nuevo post</a>

    <h1>Listado de post</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="shortcut icon" href="{{ Storage::url('IC_JMProject.png') }}">
@stop
