<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Lista de productos',
            'data' => Product::all()
        ], 200);
    }

    // Obtener un producto por ID
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }

    // Crear producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'categoria' => 'required|max:100',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0'
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Producto creado correctamente',
            'data' => $product
        ], 201);
    }

    // Actualizar producto
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado'
            ], 404);
        }

        $request->validate([
            'nombre' => 'required|max:255',
            'categoria' => 'required|max:100',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0'
        ]);

        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Producto actualizado',
            'data' => $product
        ]);
    }

    // Eliminar producto
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Producto eliminado'
        ]);
    }
}