<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Http\Requests\VehiculoRequest;


class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();  
        return view('vehiculos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request)
    {
        $vehiculo = new Vehiculo();

        $vehiculo->matricula = $request->matricula;
        $vehiculo->nombre_vehiculo = $request->nombre_vehiculo;
        $vehiculo->tipo_v = $request->tipo_v;
        $vehiculo->marca = $request->marca;
        $vehiculo->año = $request->año;
        $vehiculo->estado = $request->estado;
        $vehiculo->imagen = $request->file('imagen')->store('public/vehiculos');
        
        $vehiculo->save();

        return redirect()->route('vehiculos.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        $tipos = Tipo::all();
        return view('vehiculos.edit', compact('vehiculo', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $vehiculo->matricula = $request->matricula;
        $vehiculo->nombre_vehiculo = $request->nombre_vehiculo;
        $vehiculo->tipo_v = $request->tipo_v;
        $vehiculo->marca = $request->marca;
        $vehiculo->año = $request->año;
        $vehiculo->estado = $request->estado;
        $vehiculo->imagen = $request->file('imagen')->store('public/vehiculos');
        
        $vehiculo->save();

        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index');
    }
}
