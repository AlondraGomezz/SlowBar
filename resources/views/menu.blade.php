@extends('layout')

@section('contenido')

<div class="text-center mb-5 fade-up">

    <p class="coffee-text text-uppercase">
        SlowBar Menu
    </p>

    <h1 class="display-3 fw-bold">
        Nuestro menú ☕
    </h1>

    <p class="text-light fs-5 mt-3">
        Descubre nuestras bebidas y postres premium
    </p>

</div>

<!-- BUSCADOR -->

<div class="row justify-content-center mb-5">
    <div class="col-lg-7">
        <div class="glass-card p-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar café, postre o bebida...">
        </div>
    </div>
</div>

@if(session('success'))

<div class="alert alert-success border-0 rounded-4 shadow mb-5">

    {{ session('success') }}

</div>

@endif

<!-- PRODUCTOS -->

<div class="row g-4" id="productsContainer">
    {{-- @foreach($products as $product)
    <div class="col-md-4 product-card">
        <div class="glass-card p-4 h-100 card-hover">
            <div class="text-center mb-4">
                <div class="display-1">
                    ☕
                </div>
            </div>

            <h3 class="fw-bold product-name">
                {{ $product->nombre }}
            </h3>

            <p class="text-light">
                {{ $product->descripcion }}
            </p>

            <div class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <span class="badge bg-warning text-dark">
                        {{ $product->categoria }}
                    </span>

                    <h4 class="coffee-text fw-bold mb-0">
                        ${{ $product->precio }}
                    </h4>

                </div>

                @auth

                <form action="{{ route('make.order', $product->id) }}"
                    method="POST">

                    @csrf

                    <button class="btn btn-coffee w-100">

                        <i class="fa fa-cart-shopping"></i>

                        Ordenar ahora

                    </button>

                </form>

                @endauth

                @guest

                <a href="{{ route('login') }}"
                class="btn btn-outline-light w-100 rounded-pill">

                    Inicia sesión para ordenar

                </a>

                @endguest

            </div>
        </div>
    </div>
    @endforeach --}}
</div>

<!-- SCRIPT BUSCADOR -->

<script>

const container = document.getElementById("productsContainer");

function obtenerIcono(categoria){

    switch(categoria){

        case "Caliente":
            return "☕";

        case "Frio":
            return "🧋";

        case "Postre":
            return "🍰";

        case "Pan":
            return "🥐";

        default:
            return "☕";

    }

}

fetch("/api/products")
.then(response => response.json())
.then(resultado => {

    resultado.data.forEach(producto => {

        container.innerHTML += `

        <div class="col-md-4 product-card">

            <div class="glass-card p-4 h-100 card-hover">
                <div class="text-center mb-4">
                    <div class="display-1">
                        ${obtenerIcono(producto.categoria)}
                    </div>
                </div>

                <h3 class="fw-bold product-name">
                    ${producto.nombre}
                </h3>

                <p class="text-light">
                    ${producto.descripcion ?? ""}
                </p>

                <div class="mt-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <span class="badge bg-warning text-dark">
                            ${producto.categoria}
                        </span>

                        <h4 class="coffee-text fw-bold">
                            $${producto.precio}
                        </h4>

                    </div>

                    <a href="/login"
                       class="btn btn-outline-light w-100 rounded-pill">

                        Inicia sesión para ordenar

                    </a>

                </div>

            </div>

        </div>

        `;

    });

});

const searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", function(){
    let filter = this.value.toLowerCase();
    document.querySelectorAll(".product-card").forEach(card=>{
        let nombre = card.querySelector(".product-name").textContent.toLowerCase();
        card.style.display = nombre.includes(filter) ? "" : "none";
    });
});

</script>

@endsection