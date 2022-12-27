<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del post" type="search">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="110px">
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.users.edit', $user) }}">
                                        <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong><i class="fas fa-sync-alt fa-spin"></i> No hay ningun registro...</strong>
            </div>
        @endif
    </div>
</div>
