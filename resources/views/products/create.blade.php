@extends('layout2')

@section('contenido')

<div class="row justify-content-center fade-up">
    <div class="col-lg-8">
        <div class="glass-card p-5">
            <div class="text-center mb-5">
                <h1 class="fw-bold">
                    ☕ Nuevo Producto
                </h1>
                <p class="text-light">
                    Agrega un nuevo café o producto al menú SlowBar
                </p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label">
                        Nombre del producto
                    </label>
                    <input type="text" name="nombre" class="form-control form-control-lg" placeholder="Ej. Latte Vainilla">
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        Categoría
                    </label>
                    <select name="categoria" class="form-control form-control-lg">
                        <option value="">Selecciona una categoría</option>
                        <option value="Caliente">Café caliente</option>
                        <option value="Frio">Café frío</option>
                        <option value="Postre">Postres</option>
                        <option value="Panadería">Panadería</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        Descripción
                    </label>
                    <textarea name="descripcion" rows="4" class="form-control" placeholder="Describe el producto"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label">
                                Precio
                            </label>
                            <input type="number" step="0.01" name="precio" class="form-control" placeholder="Ej. 89.99">

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label">
                                Stock
                            </label>
                            <input type="number" name="stock" class="form-control" placeholder="Ej. 20">
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <button class="btn btn-coffee">
                        <i class="fa fa-save"></i>
                        Guardar producto
                    </button>

                    <a href="/products" class="btn btn-outline-light rounded-pill px-4">
                        Regresar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection