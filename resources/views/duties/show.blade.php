@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('duties.index') }}" class="text-muted fw-light">Gestión de consignas /</a> Ver registros
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ver registro</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold me-2">Asunto:</span>
                            <span>{{ $duty->subject }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Número folio:</span>
                            <span>{{ $duty->folio_number }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Fecha de consigna:</span>
                            <span>{{ $duty->duty_date }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Tipo de consigna:</span>
                            <span>{{ $duty->dutyType->name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Cliente:</span>
                            <span>{{ $duty->client->name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Creado por:</span>
                            <span>{{ $duty->createdBy->full_name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Estatus:</span>
                            <span>{{ $duty->status }}</span>
                        </li>
                        <li class="mb-3">
                            <a href="{{ Storage::url($duty->file_url) }}" class="btn btn-primary">
                                <span>
                                    <i class="bx bx-download me-md-1"></i>
                                    Descargar archivo
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
