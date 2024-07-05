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
        $arriendos = Arriendo::with('vehiculo','cliente','tipo')->get();
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
    public function store(Request $request)
    {
        $arriendo = new Arriendo();

        $arriendo->matricula_arriendo = $request->matricula_arriendo;
        $arriendo->rut_arrendatario = $request->rut_arrendatario;
        $arriendo->fecha_inicio = $request->fecha_inicio;
        $arriendo->fecha_fin = $request->fecha_fin;
        $arriendo->tipo = $request->tipo;
        $arriendo->estado_actual = $request->estado_actual;
        $arriendo->valor_arriendo = $request->valor_arriendo;
        $arriendo->imagen_entrega = $request->file('imagen_entrega')->store('public/arriendos');
        $arriendo->imagen_devolucion = $request->file('imagen_devolucion')->store('public/arriendos');


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
    {   $arriendo->matricula_arriendo_edit = $request->matricula_arriendo;
        $arriendo->rut_arrendatario_edit = $request->rut_arrendatario;
        $arriendo->fecha_inicio_edit = $request->fecha_inicio;
        $arriendo->fecha_fin_edit = $request->fecha_fin;
        $arriendo->tipo_edit = $request->tipo;
        $arriendo->estado_actual_edit = $request->estado_actual;
        $arriendo->valor_arriendo_edit = $request->valor_arriendo;
        $arriendo->imagen_entrega_edit = $request->file('imagen_entrega')->store('public/arriendos');
        $arriendo->imagen_devolucion_edit = $request->file('imagen_devolucion')->store('public/arriendos');
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
