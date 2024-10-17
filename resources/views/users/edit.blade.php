@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('users.index') }}" class="text-muted fw-light">Gestión de usuarios /</a> Editar
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Editar</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Nombres *</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="paternal_last_name">Apellido paterno *</label>
                                    <input type="text" class="form-control" name="paternal_last_name" id="paternal_last_name" value="{{ $user->paternal_last_name }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="maternal_last_name">Apellido materno</label>
                                    <input type="text" class="form-control" name="maternal_last_name" id="maternal_last_name" value="{{ $user->maternal_last_name }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Correo electrónico *</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="password">Contraseña *</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="********">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="roles">Rol *</label>
                                    <select class="form-select" name="roles" id="roles" aria-label="Roles">
                                        <option selected="">Seleccione</option>
                                        @foreach ($roles as $id => $name)
                                            <option @selected($user->roles()->first()->id == $id) value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
