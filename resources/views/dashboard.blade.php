@extends('layout2')

@section('contenido')

<div class="row align-items-center mb-5">
        <div class="col-lg-7">
            <p class="coffee-text text-uppercase">
                Sistema administrativo
            </p>

            <h1 class="hero-title">
                Bienvenido a
                <span class="coffee-text">
                    SlowBar
                </span>
            </h1>

            <p class="text-light mt-4 fs-5">
                Gestiona el catálogo de productos, controla el inventario 
                y administra las operaciones principales de SlowBar
                desde un solo lugar.
            </p>
        </div>
    </div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="glass-card p-4 text-center">
            <i class="fa fa-mug-hot fs-1 coffee-text"></i>
            <h2 class="mt-3">{{ $totalProducts }}</h2>
            <p>Productos</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="glass-card p-4 text-center">
            <i class="fa fa-users fs-1 coffee-text"></i>
            <h2 class="mt-3">{{ $totalClients }}</h2>
            <p>Clientes</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="glass-card p-4 text-center">
            <i class="fa fa-cart-shopping fs-1 coffee-text"></i>
            <h2 class="mt-3">{{ $totalOrders }}</h2>
            <p>Pedidos</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="glass-card p-4 text-center">
            <i class="fa fa-tags fs-1 coffee-text"></i>
            <h2 class="mt-3">{{ $totalPromotions }}</h2>
            <p>Promociones</p>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <div class="col-md-6">
        <div class="glass-card p-4 text-center">
            <i class="fa fa-boxes-stacked fs-1 coffee-text"></i>
            <h2 class="mt-3">
                {{ $totalStock }}
            </h2>
            <p>
                Stock total disponible
            </p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="glass-card p-4 text-center">
            <i class="fa fa-triangle-exclamation fs-1 text-warning"></i>
            <h2 class="mt-3">
                {{ $lowStockCount }}
            </h2>
            <p>
                Productos con poco stock
            </p>
        </div>
    </div>
    
</div>

<div class="glass-card p-4 mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">
                Productos con poco stock
            </h3>
            <small class="text-light">
                Revisa los productos que necesitan reabastecimiento.
            </small>
        </div>
    </div>

    @if($lowStock->count())
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lowStock as $product)
        <tr>
            <td>
                @if($product->categoria == 'Postre')
                    🍰
                @else
                    ☕
                @endif
                {{ $product->nombre }}
            </td>
            <td>
                {{ $product->categoria }}
            </td>
            <td>
                <span class="badge bg-danger">
                    {{ $product->stock }}
                </span>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center py-4">
        <i class="fa fa-circle-check fa-3x coffee-text mb-3"></i>
        <h5>
            Todo el inventario está en buen estado.
        </h5>
    </div>
    @endif
</div>


@endsection