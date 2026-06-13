@extends('layout')

@section('contenido')

<div class="text-center mb-5 fade-up">
    <p class="coffee-text text-uppercase">
        Contacto
    </p>

    <h1 class="display-3 fw-bold">
        Hablemos
    </h1>

    <p class="text-light fs-5 mt-3">
        ¿Tienes dudas o sugerencias?
    </p>

</div>

<div class="row g-5">
    <div class="col-lg-6">
        <div class="glass-card p-5 h-100">
            <h3 class="fw-bold mb-4">
                Envíanos un mensaje
            </h3>

            <form>
                <div class="mb-4">
                    <input type="text" class="form-control" placeholder="Nombre">
                </div>

                <div class="mb-4">
                    <input type="email" class="form-control" placeholder="Correo">
                </div>

                <div class="mb-4">
                    <textarea class="form-control" rows="5" placeholder="Mensaje"></textarea>
                </div>

                <button class="btn btn-coffee">
                    Enviar mensaje
                </button>

            </form>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="glass-card p-5 h-100">
            <h3 class="fw-bold mb-4">
                Información
            </h3>

            <p class="fs-5">
                📍 Papantla, Veracruz
            </p>

            <p class="fs-5">
                ☎️ 784 154 1726
            </p>

            <p class="fs-5">
                ✉️ slowbar@gmail.com
            </p>

            <hr>
            <h4 class="coffee-text">
                Horarios
            </h4>

            <p class="text-light">
                Lunes a Domingo<br>
                8:00 AM - 10:00 PM
            </p>

        </div>
    </div>
</div>

@endsection