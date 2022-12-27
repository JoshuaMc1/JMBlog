@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    @can('admin.categories.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.roles.create') }}">Agregar roles</a>
    @endcan
    <h1>Lista de roles</h1>
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
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="110px">
                                @can('admin.roles.edit')
                                    <a class="btn btn-sm btn-warning fw-bold" href="{{ route('admin.roles.edit', $role) }}">
                                        <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="110px">
                                @can('admin.roles.destroy')
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
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

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
