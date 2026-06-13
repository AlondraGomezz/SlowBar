@extends('layout')

@section('contenido')

<!-- HERO -->

<div class="row align-items-center min-vh-100 fade-up">

    <div class="col-lg-6">

        <p class="coffee-text text-uppercase fw-bold">
            Cafetería
        </p>

        <h1 class="display-1 fw-bold">

            Disfruta el mejor café de
            <span class="coffee-text">
                SlowBar
            </span>

        </h1>

        <p class="mt-4 fs-5 text-light">

            Café artesanal, bebidas y un ambiente elegante
            desarrollado para amantes del café.

        </p>

        <div class="d-flex gap-3 mt-4">

            <a href="#menu"
               class="btn btn-coffee">

                Ver menú

            </a>

        </div>

    </div>

    <div class="col-lg-6 text-center">

        <img src="https://img.pikbest.com/png-images/20241231/a-steaming-coffee-cup-with-a-heart-shaped_11323648.png!sw800"
             class="img-fluid floating"
             style="max-height: 500px;">

    </div>

</div>
<br>

<!-- PRODUCTOS -->

<div id="menu" class="mt-5">

    <div class="text-center mb-5">

        <p class="coffee-text text-uppercase">
            Nuestro menú
        </p>

        <h2 class="display-5 fw-bold">

            Productos destacados

        </h2>

        <p class="mt-4 fs-5 text-light">
            Descubre nuestro menú de bebidas calientes, cafés fríos,
            postres y productos premium preparados especialmente
            para brindar una experiencia única a nuestros clientes.
        </p>
    </div>

    <div class="row g-4">

        @foreach($products as $product)

        <div class="col-md-4">

            <div class="glass-card p-4 h-100 card-hover">

                <div class="text-center mb-4">

                    <div class="display-1">
                        ☕
                    </div>

                </div>

                <h3 class="fw-bold">

                    {{ $product->nombre }}

                </h3>

                <p class="text-light">

                    {{ $product->descripcion }}

                </p>

                <div class="d-flex justify-content-between align-items-center mt-4">

                    <h4 class="coffee-text fw-bold">

                        ${{ $product->precio }}

                    </h4>

                    <span class="badge bg-warning text-dark">

                        {{ $product->categoria }}

                    </span>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<br><br><br><br>
<!-- ABOUT -->

<div class="row mt-5 align-items-center">

    <div class="col-lg-6">

        <img src="https://dinorank.com/img/dinobrain/222719/imagen48a0564effbb9ddb101e2f7875dd8613.jpg"
             class="img-fluid">

    </div>

    <div class="col-lg-6">

        <p class="coffee-text text-uppercase">
            Sobre nosotros
        </p>

        <h2 class="display-5 fw-bold">

            Una experiencia inolvidable

        </h2>

        <p class="mt-4 text-light fs-5">
            SlowBar nace para ofrecer una experiencia elegante,
            moderna y relajante a todos los amantes del café.
        </p>

        <p class="mt-4 fs-5 text-light">
            En SlowBar creemos que cada taza cuenta una historia,
            por eso ofrecemos una experiencia moderna y acogedora
            donde el diseño, el sabor y la comodidad se unen en un
            mismo lugar.
        </p>

    </div>

</div>

@endsection