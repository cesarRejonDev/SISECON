@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="breadcrumb-wrapper">
                    <a href="{{ route('duties.index') }}" class="text-muted fw-light">Gestión de consignas /</a> Registro
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Formulario de registro</h5>
                </div>
               
                <div class="card-body">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-center" role="alert">
                        <i class="bx bx-xs bx-info-circle me-2"></i>
                        Al finalizar el registro usted recibirá un número de <strong class="ms-1">folio único.</strong>
                    </div>
                    <form method="POST" action="{{ route('duties.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="subject">Asunto *</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Vigilancia de casa">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="duty_date">Fecha de consigna *</label>
                                    <input type="date" class="form-control" name="duty_date" id="duty_date">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="duty_type_id">Tipo de consigna *</label>
                                    <select class="form-select" name="duty_type_id" id="duty_type_id" aria-label="duty_type_id">
                                        <option selected="">Seleccione</option>
                                        @foreach ($dutyTypes as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="client_id">Cliente *</label>
                                    <select class="form-select" name="client_id" id="client_id" aria-label="client_id">
                                        <option selected="">Seleccione</option>
                                        @foreach ($clients as $id => $name)
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
