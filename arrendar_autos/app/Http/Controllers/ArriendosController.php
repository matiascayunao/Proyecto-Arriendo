<?php

namespace App\Http\Controllers;

use App\Models\Arriendo;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\Tipo;
use App\Http\Requests\ArriendoRequest;

class ArriendosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arriendos = Arriendo::all();
        return view('arriendos.index', compact('arriendos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        $clientes = Cliente::all();
        $tipos = Tipo::all();
        return view('arriendos.create', compact('vehiculos','clientes','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArriendoRequest $request)
{
    $arriendo = new Arriendo();

    $arriendo->matricula_arriendo = $request->matricula_arriendo;
    $arriendo->rut_arrendatario = $request->rut_arrendatario;
    $arriendo->fecha_inicio = $request->fecha_inicio;
    $arriendo->fecha_fin = $request->fecha_fin;
    $arriendo->tipo = $request->tipo;
    $arriendo->estado_arriendo = $request->estado_arriendo;
    $arriendo->valor_arriendo = $request->valor_arriendo;

    // Verificar y guardar la imagen de entrega si existe
    if ($request->hasFile('imagen_entrega')) {
        $arriendo->imagen_entrega = $request->file('imagen_entrega')->store('public/arriendos');
    }

    // Verificar y guardar la imagen de devolución si existe
    if ($request->hasFile('imagen_recepcion')) {
        $arriendo->imagen_recepcion = $request->file('imagen_recepcion')->store('public/arriendos');
    }

    $arriendo->save();

    return redirect()->route('arriendos.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Arriendo $arriendo)
    {
        return view('arriendos.show', compact('arriendo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arriendo $arriendo)
    {
        $vehiculos = Vehiculo::all();
        $clientes = Cliente::all();
        $tipos = Tipo::all();
        return view('arriendos.edit', compact('arriendo','vehiculos','clientes','tipos'));
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Arriendo $arriendo)
    {
        $arriendo->matricula_arriendo = $request->matricula_arriendo;
        $arriendo->rut_arrendatario = $request->rut_arrendatario;
        $arriendo->fecha_inicio = $request->fecha_inicio;
        $arriendo->fecha_fin = $request->fecha_fin;
        $arriendo->tipo = $request->tipo;
        $arriendo->estado_arriendo = $request->estado_arriendo;
        $arriendo->valor_arriendo = $request->valor_arriendo;

        
        if ($request->hasFile('imagen_entrega')) {
            
            if ($arriendo->imagen_entrega) {
                Storage::delete($arriendo->imagen_entrega);
            }
            
            $arriendo->imagen_entrega = $request->file('imagen_entrega')->store('public/arriendos');
        }

        
        if ($request->hasFile('imagen_recepcion')) {
            
            if ($arriendo->imagen_recepcion) {
                Storage::delete($arriendo->imagen_recepcion);
            }
            
            $arriendo->imagen_recepcion = $request->file('imagen_recepcion')->store('public/arriendos');
        }

        $arriendo->save();

        return redirect()->route('arriendos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arriendo $arriendo)
    {
        $arriendo->delete();
        return redirect()->route('arriendos.index');
    }
}
