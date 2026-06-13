@extends('layout')

@section('contenido')

<div class="text-center mb-5 fade-up">
    <p class="coffee-text text-uppercase">
        SlowBar Promotions
    </p>
    <h1 class="display-3 fw-bold">
        Promociones especiales
    </h1>
    <p class="text-light fs-5 mt-3">
        Aprovecha nuestras ofertas exclusivas
    </p>
</div>

<div class="row g-4">
    @foreach($promotions as $promotion)
    <div class="col-md-4">
        <div class="glass-card p-4 h-100 card-hover text-center">
            <div class="display-1 mb-3">
                🎀
            </div>

            <h3 class="fw-bold">
                {{ $promotion->titulo }}
            </h3>

            <p class="text-light">
                {{ $promotion->descripcion }}
            </p>

            <h1 class="coffee-text fw-bold">
                {{ $promotion->descuento }}% OFF
            </h1>
        </div>
    </div>
    @endforeach
</div>

@endsection