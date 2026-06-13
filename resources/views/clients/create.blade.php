@extends('layout2')

@section('contenido')

<div class="row justify-content-center fade-up">

    <div class="col-lg-7">

        <div class="glass-card p-5">

            <h1 class="fw-bold mb-4">
                Nuevo cliente
            </h1>

            <form action="{{ route('clients.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label>
                        Nombre
                    </label>

                    <input type="text"
                           name="nombre"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>
                        Correo
                    </label>

                    <input type="email"
                           name="correo"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>
                        Teléfono
                    </label>

                    <input type="text"
                           name="telefono"
                           class="form-control">

                </div>

                <button class="btn btn-coffee">

                    Guardar cliente

                </button>

            </form>

        </div>

    </div>

</div>

@endsection