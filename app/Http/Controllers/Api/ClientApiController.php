<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Clientes obtenidos correctamente',
            'data' => Client::all()
        ]);
    }

    public function show($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado'
            ],404);
        }

        return response()->json([
            'success'=>true,
            'data'=>$client
        ]);
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Cliente creado correctamente',
            'data'=>$client
        ],201);
    }

    public function update(Request $request,$id)
    {
        $client = Client::findOrFail($id);

        $client->update($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Cliente actualizado',
            'data'=>$client
        ]);
    }

    public function destroy($id)
    {
        Client::destroy($id);

        return response()->json([
            'success'=>true,
            'message'=>'Cliente eliminado'
        ]);
    }
}