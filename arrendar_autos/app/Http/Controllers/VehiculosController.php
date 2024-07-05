<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::with('tipo')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();  
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehiculo = new Vehiculo();

        $vehiculo->matricula = $request->matricula;
        $vehiculo->nombre_vehiculo = $request->nombre_vehiculo;
        $vehiculo->tipo_v = $request->tipo_v;
        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->año = $request->año;
        $vehiculo->estado = $request->estado;
        $vehiculo->imagen = $request->file('imagen')->store('public/vehiculos');
        
        $vehiculo->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        $vehiculo = Vehiculo::with('tipo')->find($vehiculo->id);
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $vehiculo->matricula_edit = $request->matricula;
        $vehiculo->nombre_vehiculo_edit = $request->nombre_vehiculo;
        $vehiculo->tipo_v_edit = $request->tipo_v;
        $vehiculo->marca_edit = $request->marca;
        $vehiculo->modelo_edit = $request->modelo;
        $vehiculo->año_edit = $request->año;
        $vehiculo->estado_edit = $request->estado;
        $vehiculo->imagen_edit = $request->file('imagen')->store('public/vehiculos');
        
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
