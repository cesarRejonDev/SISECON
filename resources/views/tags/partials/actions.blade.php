<div class="d-flex justify-content-center gap-1">
    @can('tags.show')
        <a href="{{ route('tags.show', $id) }}" class="btn btn-sm btn-icon" title="Ver">
            <i class="bx bx-show-alt"></i>
        </a>
    @endcan
    @can('tags.edit')
        <a href="{{ route('tags.edit', $id) }}" class="btn btn-sm btn-icon" title="Editar">
            <i class="bx bx-edit"></i>
        </a>
    @endcan
    @can('tags.destroy')
        <form method="POST" action="{{ route('tags.destroy', $id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este tipo de cliente?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-icon delete-record" type="submit" title="Eliminar">
                <i class="bx bx-trash text-danger"></i>
            </button>
        </form>
    @endcan
</div>