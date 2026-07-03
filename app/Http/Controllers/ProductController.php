<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Promotion;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // mostrar productos
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::where('nombre', 'LIKE', "%$search%")
            ->orWhere('categoria', 'LIKE', "%$search%")
            ->get();

        $totalProducts = Product::count();

        $totalStock = Product::sum('stock');

        $averagePrice = Product::avg('precio');

        return view('products.index', compact(
            'products',
            'totalProducts',
            'totalStock',
            'averagePrice',
            'search'
        ));
    }

    //dashboard
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalClients = Client::count();
        $totalOrders = Order::count();
        $totalPromotions = Promotion::count();
        $totalStock = Product::sum('stock');
        $lowStock = Product::where('stock', '<=', 5)->get();
        $lowStockCount = Product::where('stock', '<=', 5)->count();
        $outOfStock = Product::where('stock', 0)->count();
        $lastProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalClients',
            'totalOrders',
            'totalPromotions',
            'totalStock',
            'lowStock',
            'lowStockCount',
            'outOfStock',
            'lastProducts'
        ));
    }

    // formulario crear
    public function create()
    {
        return view('products.create');
    }

    // guardar producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Product::create($request->all());

        return redirect('/products')
            ->with('success', 'Producto agregado correctamente');
    }

    // formulario editar
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    // ver producto
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }
    // actualizar producto
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect('/products')
            ->with('success', 'Producto actualizado');
    }

    // eliminar producto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products')
            ->with('success', 'Producto eliminado');
    }

}