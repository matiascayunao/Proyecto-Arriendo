<?php

namespace App\Http\Controllers;

use App\Models\Arriendo;
use Illuminate\Http\Request;

class ArriendosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arriendos = Arriendo::with('vehiculo','tipo')->get();
        return view('arriendos.index', compact('arriendos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arriendo = new Arriendo();

        $arriendo->matricula_arriendo = $request->matricula_arriendo;
        $arriendo->rut_arrendatario = $request->rut_arrendatario;
        $arriendo->nombre_arrendatario = $request->nombre_arrendatario;
        $arriendo->apellido_arrendatario = $request->apellido_arrendatario;
        $arriendo->fecha_inicio = $request->fecha_inicio;
        $arriendo->fecha_fin = $request->fecha_fin;
        $arriendo->tipo = $request->tipo;
        $arriendo->estado_actual = $request->estado_actual;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arriendo $arriendo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arriendo $arriendo)
    {
        //
    }
}
