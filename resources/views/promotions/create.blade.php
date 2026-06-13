@extends('layout2')

@section('contenido')

<div class="row justify-content-center fade-up">

    <div class="col-lg-7">

        <div class="glass-card p-5">

            <h1 class="fw-bold mb-4">
                Nueva promoción
            </h1>

            <form action="{{ route('promotions.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label>
                        Título
                    </label>

                    <input type="text"
                           name="titulo"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>
                        Descripción
                    </label>

                    <textarea name="descripcion"
                              rows="4"
                              class="form-control"></textarea>

                </div>

                <div class="mb-4">

                    <label>
                        Descuento %
                    </label>

                    <input type="number"
                           name="descuento"
                           class="form-control">

                </div>

                <button class="btn btn-coffee">

                    Guardar promoción

                </button>

            </form>

        </div>

    </div>

</div>

@endsection