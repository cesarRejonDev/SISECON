@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    Consigna
                </h4>
                <a href="{{ route('duties.create') }}" class="btn btn-primary">
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
                    <table id="duties" class="datatables-basic table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Asunto</th>
                                <th>No.De folio</th>
                                <th>Tipo de consigna</th>
                                <th>Cliente</th>
                                <th>Fecha de consigna</th>
                                <th>Estatus</th>
                                <th>Registrado por</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (session('folio_modal'))
        <div class="modal fade" id="folioNumber" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <div class="text-center">
                        <h3>Número de folio</h3>
                        <p>Este número es único e intransferible para tu consigna, <strong>cópialo y guárdalo en un lugar seguro. </strong></p>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <h1 class="display-6 text-primary">{{ session('folio_modal') }}</h1>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    Entendido
                </button>
                </div>
            </form>
            </div>
        </div>
    @endif
@endsection

@section('extra-scripts')
    @if (session('folio_modal'))
    <script>
        $(window).on('load', function() {
            $('#folioNumber').modal('show');
        });
    </script>
    @endif
@endsection

@section('datatable')
    <script>
        $(document).ready(function() {
            $('#duties').DataTable({
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('duties.datatable') }}",
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
                        data: 'subject'
                    },
                    {
                        data: 'folio_number'
                    },
                    {
                        data: 'duty_type'
                    },
                    {
                        data: 'client'
                    },
                    {
                        data: 'duty_date'
                    },
                    {
                        data: 'statusBadges'
                    },
                    {
                        data: 'created'
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
