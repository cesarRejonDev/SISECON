@extends('layouts.auth')

@section('content')
<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
            <div class="flex-row text-center mx-auto">
                <img src="{{ asset('assets/img/ificon.svg') }}" alt="Auth Cover Bg color" width="500"
                    class="img-fluid authentication-cover-img"  />
                <div class="mx-auto text-white">
                    <h3 class="text-white">Comunicación, Integridad, Cumplimiento, Profesionalismo y Responsabilidad</h3>
                    <p>
                        Seguridad integral que trasciende y es parte fundamental de empresas, </br>
                        personas y organismos públicos.
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <h4 class="mb-2">SISECON</h4>
                <p class="mb-4">Sistema de Seguimiento de Consignas.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingresa tu email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Contraseña</label>
                            <a href="auth-forgot-password-cover.html">
                                <small>¿Olvidaste tu contraseña?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingresa tu contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Iniciar sesión</button>
                    <p class="mb-4"> Por César Rejón </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
