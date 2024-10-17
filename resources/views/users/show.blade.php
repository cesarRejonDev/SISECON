@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('users.index') }}" class="text-muted fw-light">Gestión de usuarios /</a> Ver
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ver registro</h5>
                </div>
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="rounded-circle object-fit-cover mb-3" src="{{ $user->avatar }}" height="110" width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h5 class="mb-2">
                                    {{ $user->full_name }}
                                </h5>
                                <span class="badge bg-label-secondary">
                                    {{ $user->roles()->first()->name }}
                                </span>
                                <span class="badge bg-label-success">
                                    Activo
                                </span>
                            </div>
                        </div>
                    </div>
                    <h5 class="pb-2 border-bottom mt-3 mb-4">Información adicional</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold me-2">Nombres:</span>
                            <span>{{ $user->name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Apellido paterno:</span>
                            <span>{{ $user->paternal_last_name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Apellido materno:</span>
                            <span>{{ $user->maternal_last_name }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Correo electrónico:</span>
                            <span>{{ $user->email }}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
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
