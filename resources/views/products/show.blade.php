@extends('layout2')

@section('contenido')

<div class="row justify-content-center fade-up">

    <div class="col-lg-8">

        <div class="glass-card p-5 card-hover">

            <div class="text-center mb-5">

                <div class="display-1 mb-3">
                    ☕
                </div>

                <h1 class="fw-bold">
                    {{ $product->nombre }}
                </h1>

                <p class="text-light">
                    Producto premium de SlowBar
                </p>

            </div>

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="glass-card p-4 h-100">

                        <small class="coffee-text">
                            DESCRIPCIÓN
                        </small>

                        <p class="mt-3 fs-5">
                            {{ $product->descripcion }}
                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="glass-card p-4 text-center h-100">

                        <small class="coffee-text">
                            PRECIO
                        </small>

                        <h2 class="fw-bold mt-3">
                            ${{ $product->precio }}
                        </h2>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="glass-card p-4 text-center h-100">

                        <small class="coffee-text">
                            STOCK
                        </small>

                        <h2 class="fw-bold mt-3">
                            {{ $product->stock }}
                        </h2>

                    </div>

                </div>

            </div>

            <div class="d-flex gap-3 mt-5 justify-content-center">

                <a href="{{ route('products.edit', $product->id) }}"
                   class="btn btn-warning rounded-pill px-4">

                    <i class="fa fa-pen"></i>
                    Editar

                </a>

                <a href="{{ route('products.index') }}"
                   class="btn btn-outline-light rounded-pill px-4">

                    Regresar

                </a>

            </div>

        </div>

    </div>

</div>

@endsection