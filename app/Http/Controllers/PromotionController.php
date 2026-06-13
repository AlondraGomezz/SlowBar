<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();

        return view('promotions.index', compact('promotions'));
    }
    public function publicIndex()
    {
        $promotions = Promotion::all();

        return view('promotions.public', compact('promotions'));
    }

    public function create()
    {
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        Promotion::create($request->all());

        return redirect('/promotions')
            ->with('success', 'Promoción agregada');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);

        $promotion->delete();

        return redirect('/promotions')
            ->with('success', 'Promoción eliminada');
    }
}