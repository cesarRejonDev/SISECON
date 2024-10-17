<div class="d-flex justify-content-center gap-1">
    @can('duties.show')
        <a href="{{ route('duties.show', $id) }}" class="btn btn-sm btn-icon" title="Ver">
            <i class="bx bx-show-alt"></i>
        </a>
    @endcan
    @can('duties.edit')
        @if ($status != 'Aprobado')
            <a href="{{ route('duties.edit', $id) }}" class="btn btn-sm btn-icon" title="Subir archivos">
                <i class="bx bx-upload"></i>
            </a>
        @endif
    @endcan
</div> 