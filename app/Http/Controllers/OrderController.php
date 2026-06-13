<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        Order::create([

            'user_id' => auth()->id(),
            'cliente' => auth()->user()->name,
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'total' => $request->total,
            'estado' => 'Pendiente'

        ]);

        return redirect('/orders')
            ->with('success', 'Pedido registrado');
    }

    public function makeOrder($id)
    {
        $product = \App\Models\Product::findOrFail($id);

        \App\Models\Order::create([

            'user_id' => auth()->id(),

            'cliente' => auth()->user()->name,

            'producto' => $product->nombre,

            'cantidad' => 1,

            'total' => $product->precio,

            'estado' => 'Pendiente'

        ]);

        return redirect('/menu')
            ->with('success', 'Pedido realizado correctamente ☕');
    }

    public function myOrders()
    {
        $orders = \App\Models\Order::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view('orders.my-orders', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = \App\Models\Order::findOrFail($id);

        $order->estado = $request->estado;

        $order->save();

        return redirect('/orders')
            ->with('success', 'Estado actualizado');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        return redirect('/orders')
            ->with('success', 'Pedido actualizado');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return redirect('/orders')
            ->with('success', 'Pedido eliminado');
    }
}