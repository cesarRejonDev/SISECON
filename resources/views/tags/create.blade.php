@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('tags.index') }}" class="text-muted fw-light">Gestión de tipos de cliente /</a> Registro
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Formulario de registro</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tags.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Nombre de tipo de cliente *</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Hotel, otros">
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
