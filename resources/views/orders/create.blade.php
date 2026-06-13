@extends('layout2')

@section('contenido')

<div class="row justify-content-center fade-up">

    <div class="col-lg-7">

        <div class="glass-card p-5">

            <h1 class="fw-bold mb-4">
                Nuevo pedido
            </h1>

            <form action="{{ route('orders.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label>
                        Cliente
                    </label>

                    <input type="text"
                           name="cliente"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>
                        Producto
                    </label>

                    <input type="text"
                           name="producto"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>
                        Cantidad
                    </label>

                    <input type="number"
                           name="cantidad"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>
                        Total
                    </label>

                    <input type="number"
                           step="0.01"
                           name="total"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>
                        Estado
                    </label>

                    <select name="estado"
                            class="form-control">

                        <option value="Pendiente">
                            Pendiente
                        </option>

                        <option value="Completado">
                            Completado
                        </option>

                    </select>

                </div>

                <button class="btn btn-coffee">

                    Guardar pedido

                </button>

            </form>

        </div>

    </div>

</div>

@endsection