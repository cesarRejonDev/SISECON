@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    Gestión - Tipo de clientes
                </h4>
                <a href="{{ route('tags.create') }}" class="btn btn-primary">
                    <span>
                        <i class="bx bx-plus me-md-1"></i>
                        <span class="d-md-inline-block d-none">
                            Registrar nuevo
                        </span>
                    </span>
                </a>
            </div>
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="tags" class="datatables-basic table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha de registro</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('datatable')
    <script>
        $(document).ready(function() {
            $('#tags').DataTable({
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('tags.datatable') }}",
                    "type": "POST",
                    "headers": {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                },
                "columns": [
                    {
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'created_at.fecha',
                        name: 'created_at'
                    },
                    {
                        data: 'btn',
                        orderable: false,
                        searchable: false
                    }
                ],
                "language": {
                    'url': '../traduccion.json'
                }
            });
        });
    </script>
@endsection
