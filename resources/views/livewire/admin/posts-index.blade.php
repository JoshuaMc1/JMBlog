<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del post" type="search">
    </div>
    @if ($posts->count())
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
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                {{ $post->name }}
                            </td>
                            <td width="110px">
                                <a class="btn btn-sm btn-warning" href="{{ route('admin.posts.edit', $post) }}">
                                    <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                                    Editar
                                </a>
                            </td>
                            <td width="110px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i>Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong><i class="fas fa-sync-alt fa-spin"></i> No hay ningun registro...</strong>
        </div>
    @endif
</div>
