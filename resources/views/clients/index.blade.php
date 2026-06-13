@extends('layout2')

@section('contenido')

<div class="fade-up">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <p class="coffee-text text-uppercase">
                Gestión de clientes
            </p>

            <h1 class="fw-bold">
                Clientes registrados
            </h1>

        </div>

        <a href="{{ route('clients.create') }}"
           class="btn btn-coffee">

            <i class="fa fa-plus"></i>
            Nuevo cliente

        </a>

    </div>

    @if(session('success'))

    <div class="alert alert-success rounded-4 border-0">
        {{ session('success') }}
    </div>

    @endif

    <div class="glass-card p-4">

        <div class="table-responsive">

            <table class="table text-white align-middle">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($clients as $client)

                    <tr>

                        <td>#{{ $client->id }}</td>

                        <td>{{ $client->nombre }}</td>

                        <td>{{ $client->correo }}</td>

                        <td>{{ $client->telefono }}</td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('clients.edit', $client->id) }}"
                                   class="btn btn-warning btn-sm rounded-pill">

                                    <i class="fa fa-pen"></i>

                                </a>

                                <form action="{{ route('clients.destroy', $client->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm rounded-pill">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection