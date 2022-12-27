@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    @can('admin.categories.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.categories.create') }}">Agregar categoria</a>
    @endcan
    <h1>Lista de categorias</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="110px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-sm btn-warning fw-bold"
                                        href="{{ route('admin.categories.edit', $category) }}">
                                        <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="110px">
                                @can('admin.categories.destroy')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fa fa-trash fa-fw" aria-hidden="true"></i>Eliminar
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="shortcut icon" href="{{ Storage::url('IC_JMProject.png') }}">
@stop
