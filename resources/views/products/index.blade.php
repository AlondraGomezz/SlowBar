@extends('layout2')

@section('contenido')

<div class="fade-up">

    <!-- HERO -->

    <div class="row align-items-center mb-5">
        <div class="col-lg-7">
            <p class="coffee-text text-uppercase">
                Gestión de Productos
            </p>

             <h1 class="hero-title">
                Productos
            </h1>

            <a href="{{ route('products.create') }}"class="btn btn-coffee mt-3">
                <i class="fa fa-plus"></i>
                Nuevo producto
            </a>
        </div>
    </div>

    <!-- STATS -->

    <div class="row mb-5 g-4">
        <div class="col-md-4">
            <div class="glass-card p-4 h-100">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-light">
                            Productos
                        </p>

                        <h2 class="fw-bold">
                            {{ $totalProducts }}
                        </h2>

                    </div>

                    <div class="fs-1 coffee-text">
                        <i class="fa fa-mug-hot"></i>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="glass-card p-4 h-100">
                <div class="d-flex justify-content-between">
                    <div>

                        <p class="text-light">
                            Inventario
                        </p>

                        <h2 class="fw-bold">
                            {{ $totalStock }}
                        </h2>

                    </div>

                    <div class="fs-1 coffee-text">
                        <i class="fa fa-box"></i>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="glass-card p-4 h-100">
                <div class="d-flex justify-content-between">
                    <div>

                        <p class="text-light">
                            Precio promedio
                        </p>

                        <h2 class="fw-bold">
                            ${{ number_format($averagePrice, 2) }}
                        </h2>

                    </div>

                    <div class="fs-1 coffee-text">
                        <i class="fa fa-coins"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ALERTA -->

    @if(session('success'))

    <div class="alert alert-success border-0 shadow rounded-4">
        {{ session('success') }}
    </div>

    @endif

    <!-- BUSCADOR -->

    <form method="GET" action="{{ route('products.index') }}" class="mb-4">
        <div class="row g-3">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control form-control-lg rounded-pill border-0 shadow-sm"
                       placeholder="Buscar producto..." value="{{ $search }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-coffee w-100 h-100 rounded-pill">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- TABLA -->

    <div class="glass-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>

                <h3 class="fw-bold mb-0">
                    Menú SlowBar
                </h3>

                <small class="text-light">
                    Gestión de productos registrados
                </small>

            </div>

            <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill">
                {{ count($products) }} productos
            </span>
        </div>

        @if(count($products) == 0)

        <div class="text-center py-5">
            <div class="display-1 mb-3">
                ☕
            </div>

            <h4>
                No hay productos registrados
            </h4>

            <p class="text-light">
                Agrega el primer producto al menú
            </p>

        </div>

        @else

        <div class="table-responsive">
            <table class="table align-middle text-white">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            #{{ $product->id }}
                        </td>

                        <td class="fw-bold">
                            <a href="{{ route('products.show', $product->id) }}"
                            class="text-decoration-none text-white">

                                <span class="me-1">
                                    @if($product->categoria == 'Postre')
                                        🍰
                                    @else
                                        ☕
                                    @endif
                                </span>

                                {{ $product->nombre }}

                            </a>
                        </td>

                        <td>
                            @if($product->categoria == 'Caliente')

                                <span class="badge bg-warning text-dark rounded-pill px-3">
                                    Caliente
                                </span>

                            @elseif($product->categoria == 'Frio')

                                <span class="badge bg-primary rounded-pill px-3">
                                    Frío
                                </span>

                            @elseif($product->categoria == 'Postre')

                                <span class="badge bg-secondary text-dark rounded-pill px-3">
                                    Postre
                                </span>

                            @else

                                <span class="badge bg-success rounded-pill px-3">
                                    Panadería
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $product->descripcion }}
                        </td>

                        <td class="fw-bold coffee-text">
                            ${{ $product->precio }}
                        </td>

                        <td>
                            @if($product->stock > 15)
                                <span class="badge bg-success rounded-pill px-3">
                                    {{ $product->stock }} Disponible
                                </span>
                            @elseif($product->stock >= 5)
                                <span class="badge bg-warning text-dark rounded-pill px-3">
                                    {{ $product->stock }} Poco stock
                                </span>
                            @else
                                <span class="badge bg-danger rounded-pill px-3">
                                    {{ $product->stock }} Agotado
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex gap-2">
                                <!-- BOTON EDITAR -->
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm rounded-pill px-3">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <!-- BOTON ELIMINAR -->
                                <button type="button" class="btn btn-danger btn-sm rounded-pill px-3" onclick="abrirModalEliminar({{ $product->id }}, '{{ $product->nombre }}')">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Formulario temporal para cada producto (oculto) -->
                                <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    <!-- MODAL PERSONALIZADO (fuera del loop, pero por ahora lo dejamos aquí) -->
                    <div id="modalEliminar" class="modal-custom" style="display: none;">
                        <div class="modal-custom-content">
                            <div class="modal-custom-header">
                                <h5 class="fw-bold">Eliminar producto</h5>
                                <button class="modal-custom-close" onclick="cerrarModalEliminar()">×</button>
                            </div>
                            <div class="modal-custom-body text-center py-4">
                                <div class="display-2 mb-3">☕</div>
                                <h4 class="mb-3">
                                    ¿Deseas eliminar
                                    <span id="productoNombre" class="coffee-text"></span>?
                                </h4>
                                <p class="text-light">Esta acción no se puede deshacer.</p>
                            </div>
                            <div class="modal-custom-footer">
                                <button class="btn btn-secondary rounded-pill px-4" onclick="cerrarModalEliminar()">
                                    Cancelar
                                </button>
                                <form id="formEliminar" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-pill px-4">
                                        Sí, eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
        @endif
    </div>

</div>
<script>
    function abrirModalEliminar(id, nombre) {
        // Mostrar modal
        document.getElementById('modalEliminar').style.display = 'flex';
        document.getElementById('productoNombre').textContent = nombre;
        
        // Configurar el formulario para eliminar el producto correcto
        const form = document.getElementById('formEliminar');
        form.action = `/products/${id}`;
    }

    function cerrarModalEliminar() {
        document.getElementById('modalEliminar').style.display = 'none';
    }

    // Cerrar modal al hacer clic fuera de él
    window.onclick = function(event) {
        const modal = document.getElementById('modalEliminar');
        if (event.target === modal) {
            cerrarModalEliminar();
        }
    }
</script>

@endsection