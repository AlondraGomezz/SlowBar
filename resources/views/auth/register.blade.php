@extends('layout')

@section('contenido')

<div class="row justify-content-center fade-up">
    <div class="col-lg-5">
        <div class="glass-card p-5">
            <div class="text-center mb-4">
                <div class="display-2 floating">
                    ☕
                </div>
                <h1 class="fw-bold mt-3">
                    Crear cuenta
                </h1>

                <p class="text-light">
                    Únete a la experiencia SlowBar
                </p>

            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="mb-2">
                        Nombre
                    </label>

                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="mb-2">
                        Correo electrónico
                    </label>

                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="mb-2">
                        Contraseña
                    </label>

                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="mb-2">
                        Confirmar contraseña
                    </label>

                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button class="btn btn-coffee w-100 py-3">
                    Registrarse
                </button>
            </form>

            <div class="text-center mt-4">
                <small class="text-light">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="coffee-text text-decoration-none">
                        Inicia sesión
                    </a>
                </small>
            </div>
        </div>
    </div>
</div>

@endsection