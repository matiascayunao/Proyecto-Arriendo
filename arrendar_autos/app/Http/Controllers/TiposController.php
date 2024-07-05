<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Tipo();

        $tipo->nombre_tipo = $request->tipo_vehiculo;
        $tipo->precio = $request->precio_tipo;

        $tipo->save();
        
        return redirect()->route('tipos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        return view('tipos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->nombre_tipo_edit = $request->tipo_vehiculo;
        $tipo->precio_edit = $request->precio_tipo;

        $tipo->save();
        
        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}
