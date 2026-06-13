@extends('layout')

@section('contenido')

<div class="fade-up">

    <div class="text-center mb-5">

        <p class="coffee-text text-uppercase">
            SlowBar Orders
        </p>

        <h1 class="display-3 fw-bold">
            Mis pedidos
        </h1>

        <p class="text-light fs-5">
            Historial de órdenes realizadas
        </p>

    </div>

    <div class="glass-card p-4">

        @if(count($orders) == 0)

        <div class="text-center py-5">

            <div class="display-1">
                ☕
            </div>

            <h4 class="mt-3">
                Aún no tienes pedidos
            </h4>

        </div>

        @else

        <div class="table-responsive">

            <table class="table align-middle text-white">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Producto</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($orders as $order)

                    <tr>

                        <td>
                            #{{ $order->id }}
                        </td>

                        <td>
                            ☕ {{ $order->producto }}
                        </td>

                        <td class="coffee-text fw-bold">
                            ${{ $order->total }}
                        </td>

                        <td>

                            @if($order->estado == 'Pendiente')

                            <span class="badge bg-warning text-dark">
                                Pendiente
                            </span>

                            @elseif($order->estado == 'Preparando')

                            <span class="badge bg-info">
                                Preparando
                            </span>

                            @else

                            <span class="badge bg-success">
                                Entregado
                            </span>

                            @endif

                        </td>

                        <td>
                            {{ $order->created_at->format('d/m/Y') }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @endif

    </div>

</div>

@endsection