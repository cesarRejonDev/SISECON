@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('duties.index') }}" class="text-muted fw-light">Gestión de consignas /</a> Subir archivos
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
                    </ul>
                    <form method="POST" action="{{ route('duties.update', $duty->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="alert alert-primary alert-dismissible d-flex align-items-center" role="alert">
                            <i class="bx bx-xs bx-info-circle me-2"></i>
                            Al subir un archivo el estatus cambiará automáticamente a <span class="badge bg-primary ms-1">Aprobado.</span>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="file">Subir archivo</label>
                                    <input type="file" class="form-control" name="file" id="file" accept=".docx,.pdf">
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
