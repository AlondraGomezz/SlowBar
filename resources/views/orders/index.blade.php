@extends('layout2')

@section('contenido')

<div class="fade-up">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <p class="coffee-text text-uppercase">
                Gestión de pedidos
            </p>

            <h1 class="fw-bold">
                Pedidos registrados
            </h1>

        </div>

        <a href="{{ route('orders.create') }}"
           class="btn btn-coffee">

            <i class="fa fa-plus"></i>
            Nuevo pedido

        </a>

    </div>

    @if(session('success'))

    <div class="alert alert-success border-0 rounded-4">
        {{ session('success') }}
    </div>

    @endif

    <div class="glass-card p-4">

        <div class="table-responsive">

            <table class="table text-white align-middle">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($orders as $order)

                    <tr>

                        <td>#{{ $order->id }}</td>

                        <td>{{ $order->cliente }}</td>

                        <td>{{ $order->producto }}</td>

                        <td>{{ $order->cantidad }}</td>

                        <td class="coffee-text fw-bold">
                            ${{ $order->total }}
                        </td>

                        <td>

                            <form action="{{ route('orders.status', $order->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            <select name="estado"
                                    class="form-select"
                                    onchange="this.form.submit()">

                                <option
                                    value="Pendiente"
                                    {{ $order->estado == 'Pendiente' ? 'selected' : '' }}>

                                    Pendiente

                                </option>

                                <option
                                    value="Preparando"
                                    {{ $order->estado == 'Preparando' ? 'selected' : '' }}>

                                    Preparando

                                </option>

                                <option
                                    value="Entregado"
                                    {{ $order->estado == 'Entregado' ? 'selected' : '' }}>

                                    Entregado

                                </option>

                            </select>

                        </form>

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <form action="{{ route('orders.destroy', $order->id) }}"
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