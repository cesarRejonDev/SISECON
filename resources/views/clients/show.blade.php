@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('clients.index') }}" class="text-muted fw-light">Gestión de clientes /</a> Ver
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ver registro</h5>
                </div>
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="rounded-circle border object-fit-cover mb-3" src="{{ $client->avatar }}" height="110" width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h5 class="mb-2">
                                    {{ $client->name }}
                                </h5>
                                <span class="badge bg-label-secondary">
                                    {{ $client->tag->name }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <h5 class="pb-2 border-bottom mt-3 mb-4">Información adicional</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold me-2">Nombre de cliente:</span>
                            <span>{{ $client->name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Tipo de cliente:</span>
                            <span>{{ $client->tag->name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Descripción:</span>
                            <span>{{ $client->description }}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">
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
