@switch($status)
    @case('Aprobado')
        <span class="badge bg-success">Aprobado</span>
        @break
    @case('Cancelado')
        <span class="badge bg-danger">Cancelado</span>
        @break
    @default
        <span class="badge bg-primary">Sin archivos</span>
@endswitch