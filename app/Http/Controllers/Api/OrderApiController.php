<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success'=>true,
            'message'=>'Pedidos obtenidos correctamente',
            'data'=>Order::all()
        ]);
    }

    public function show($id)
    {
        $order=Order::find($id);

        if(!$order){

            return response()->json([
                'success'=>false,
                'message'=>'Pedido no encontrado'
            ],404);

        }

        return response()->json([
            'success'=>true,
            'data'=>$order
        ]);
    }

    public function store(Request $request)
    {
        $order=Order::create($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Pedido creado correctamente',
            'data'=>$order
        ],201);
    }

    public function update(Request $request,$id)
    {
        $order=Order::findOrFail($id);

        $order->update($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Pedido actualizado',
            'data'=>$order
        ]);
    }

    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json([
            'success'=>true,
            'message'=>'Pedido eliminado'
        ]);
    }
}