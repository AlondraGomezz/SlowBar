@extends('layout2')

@section('contenido')

<div class="row justify-content-center fade-up">

    <div class="col-lg-8">

        <div class="glass-card p-5">

            <div class="text-center mb-5">

                <h1 class="fw-bold">
                    ✏️ Editar Producto
                </h1>

                <p class="text-light">
                    Modifica la información del producto
                </p>

            </div>

            <form action="{{ route('products.update', $product->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label">
                        Nombre del producto
                    </label>

                    <input type="text"
                           name="nombre"
                           class="form-control form-control-lg"
                           value="{{ $product->nombre }}">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Categoría
                    </label>

                    <select name="categoria"
                            class="form-control">

                        <option value="Caliente"
                            {{ $product->categoria == 'Caliente' ? 'selected' : '' }}>

                            Café caliente

                        </option>

                        <option value="Frio"
                            {{ $product->categoria == 'Frio' ? 'selected' : '' }}>

                            Café frío

                        </option>

                        <option value="Postre"
                            {{ $product->categoria == 'Postre' ? 'selected' : '' }}>

                            Postres

                        </option>

                        <option value="Pan"
                            {{ $product->categoria == 'Pan' ? 'selected' : '' }}>

                            Panadería

                        </option>

                    </select>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Descripción
                    </label>

                    <textarea name="descripcion"
                              rows="4"
                              class="form-control">{{ $product->descripcion }}</textarea>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-4">

                            <label class="form-label">
                                Precio
                            </label>

                            <input type="number"
                                   step="0.01"
                                   name="precio"
                                   class="form-control"
                                   value="{{ $product->precio }}">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-4">

                            <label class="form-label">
                                Stock
                            </label>

                            <input type="number"
                                   name="stock"
                                   class="form-control"
                                   value="{{ $product->stock }}">

                        </div>

                    </div>

                </div>

                <div class="d-flex gap-3">

                    <button class="btn btn-coffee">

                        <i class="fa fa-rotate"></i>
                        Actualizar producto

                    </button>

                    <a href="/products"
                       class="btn btn-outline-light rounded-pill px-4">

                        Regresar

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection