@extends('layout')

@section('contenido')

<div class="row align-items-center min-vh-100 fade-up">
    <div class="col-lg-6">
        <p class="coffee-text text-uppercase">
            Sobre SlowBar
        </p>

        <h1 class="display-3 fw-bold">
            Una experiencia inolvidable ☕
        </h1>

        <p class="mt-4 fs-5 text-light">
            SlowBar nace como una cafetería moderna enfocada en brindar
            una experiencia elegante, relajante y única para todos
            los amantes del café.

            Nuestro concepto combina sabores artesanales, un ambiente
            acogedor y tecnología moderna para crear un espacio ideal
            donde las personas puedan disfrutar bebidas de alta calidad,
            trabajar, estudiar o simplemente relajarse.

        </p>

        <p class="text-light">
            SlowBar busca representar una cafetería innovadora que mezcla
            diseño, experiencia de usuario y tecnología en una misma plataforma.
        </p>

        <p class="text-light">
            Nuestro objetivo es combinar sabor, diseño y tecnología
            en un mismo espacio.
        </p>

    </div>

    <div class="col-lg-6 text-center">
        <img src="https://larutadelcafecdmx.com/wp-content/uploads/2024/10/dia-mundial-do-cafe-imagem-destacada.jpg"
             class="img-fluid floating">
    </div>

</div>

<div class="row mt-5 g-4">
    <div class="col-md-4">
        <div class="glass-card p-4 text-center h-100">
            <div class="display-4 mb-3">
                ☕
            </div>

            <h3>
                Calidad
            </h3>

            <p class="text-light">
                Ingredientes premium y café artesanal.
            </p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="glass-card p-4 text-center h-100">
            <div class="display-4 mb-3">
                🌎
            </div>

            <h3>
                Ambiente
            </h3>

            <p class="text-light">
                Espacios cómodos y modernos para disfrutar.
            </p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="glass-card p-4 text-center h-100">
            <div class="display-4 mb-3">
                💻
            </div>

            <h3>
                Tecnología
            </h3>

            <p class="text-light">
                Sistema desarrollado en Laravel MVC.
            </p>

        </div>
    </div>
</div>

@endsection