@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('tags.index') }}" class="text-muted fw-light">Gestión de tipos de cliente /</a> Ver
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ver registro</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold me-2">Nombre del tipo de cliente:</span>
                            <span>{{ $tag->name }}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">
                            <span>
                                <i class="bx bx-edit me-md-1"></i>
                                Editar
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
