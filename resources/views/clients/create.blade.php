@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('clients.index') }}" class="text-muted fw-light">Gestión de clientes /</a> Registro
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Formulario de registro</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Nombre del cliente *</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Hotel Ryu, Conominio aguila">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">Avatar *</label>
                                    <input type="file" class="form-control" accept=".png,.jpg,.jpeg,.webp" name="avatar">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Descripción *</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Breve descripción del cliente">
                                </div>
                                     <div class="mb-3">
                                        <label class="form-label" for="acronym">Acrónimo de cliente *</label>
                                         <input type="text" class="form-control" name="acronym" id="acronym" placeholder="Escriba el acrónimo del cliente">
                                     </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="tag">Tipo de cliente *</label>
                                    <select class="form-select" name="tag_id" id="tag_id" aria-label="Tipo de cliente">
                                        <option selected="">Seleccione</option>
                                        @foreach ($tag as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
