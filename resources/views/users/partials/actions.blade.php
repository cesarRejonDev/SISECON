<div class="d-flex justify-content-center gap-1">
    @can('users.show')
        <a href="{{ route('users.show', $id) }}" class="btn btn-sm btn-icon" title="Ver">
            <i class="bx bx-show-alt"></i>
        </a>
    @endcan
    @can('users.show')
        <a href="{{ route('users.edit', $id) }}" class="btn btn-sm btn-icon" title="Editar">
            <i class="bx bx-edit"></i>
        </a>
    @endcan
    @can('users.destroy')
        <form method="POST" action="{{ route('users.destroy', $id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-icon delete-record" type="submit" title="Eliminar">
                <i class="bx bx-trash text-danger"></i>
            </button>
        </form>
    @endcan
</div>