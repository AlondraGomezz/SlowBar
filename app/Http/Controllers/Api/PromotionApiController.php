<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success'=>true,
            'message'=>'Promociones obtenidas correctamente',
            'data'=>Promotion::all()
        ]);
    }

    public function show($id)
    {
        $promotion=Promotion::find($id);

        if(!$promotion){

            return response()->json([
                'success'=>false,
                'message'=>'Promoción no encontrada'
            ],404);

        }

        return response()->json([
            'success'=>true,
            'data'=>$promotion
        ]);
    }

    public function store(Request $request)
    {
        $promotion=Promotion::create($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Promoción creada correctamente',
            'data'=>$promotion
        ],201);
    }

    public function update(Request $request,$id)
    {
        $promotion=Promotion::findOrFail($id);

        $promotion->update($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Promoción actualizada',
            'data'=>$promotion
        ]);
    }

    public function destroy($id)
    {
        Promotion::destroy($id);

        return response()->json([
            'success'=>true,
            'message'=>'Promoción eliminada'
        ]);
    }
}