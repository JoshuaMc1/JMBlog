@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    @can('admin.tags.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.tags.create') }}">Agregar etiquetas</a>
    @endcan

    <h1>Mostrar listado de etiquetas</h1>
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
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->id }}
                            </td>
                            <td>
                                {{ $tag->name }}
                            </td>
                            <td width="110px">
                                @can('admin.tags.edit')
                                    <a class="btn btn-warning fw-bold btn-sm" href="{{ route('admin.tags.edit', $tag) }}">
                                        <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="110px">
                                @can('admin.tags.delete')
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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
