@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('dutyTypes.index') }}" class="text-muted fw-light">Gestión de tipos de consigna /</a> Ver
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ver registro</h5>
                    <a href="{{ route('dutyTypes.edit', $dutyType->id) }}" class="btn btn-primary" title="Editar">
                        <span>
                            <i class="bx bx-edit"></i>
                        </span>
                    </a>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold me-2">Tipo de consigna:</span>
                            <span>{{ $dutyType->name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Acrónimo de la consigna:</span>
                            <span>{{ $dutyType->acronym }}</span>
                        </li>
                        <li class="mb-3">
                            <a href="{{ Storage::url($dutyType->word_template_url) }}" class="btn btn-primary">
                                <span>
                                    <i class="bx bx-download me-md-1"></i>
                                    Descargar template
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
