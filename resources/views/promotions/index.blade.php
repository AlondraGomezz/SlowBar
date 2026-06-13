@extends('layout2')

@section('contenido')

<div class="fade-up">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <p class="coffee-text text-uppercase">
                Promociones
            </p>

            <h1 class="fw-bold">
                Promociones activas
            </h1>

        </div>

        <a href="{{ route('promotions.create') }}"
           class="btn btn-coffee">

            <i class="fa fa-plus"></i>
            Nueva promoción

        </a>

    </div>

    <div class="row g-4">

        @foreach($promotions as $promotion)

        <div class="col-md-4">

            <div class="glass-card p-4 h-100 card-hover">

                <div class="display-3 mb-3">
                    🎉
                </div>

                <h3 class="fw-bold">
                    {{ $promotion->titulo }}
                </h3>

                <p class="text-light">
                    {{ $promotion->descripcion }}
                </p>

                <h2 class="coffee-text fw-bold">
                    {{ $promotion->descuento }}% OFF
                </h2>

                <form action="{{ route('promotions.destroy', $promotion->id) }}"
                      method="POST"
                      class="mt-4">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger rounded-pill">

                        Eliminar

                    </button>

                </form>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection