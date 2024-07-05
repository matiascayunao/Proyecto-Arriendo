<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Models\Perfil;
use App\Http\Requests\UsuarioRequest;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('usuarios.gestionar')) {
            return redirect()->route('home.index');
        }

        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $perfiles = Perfil::all();
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario();

        $usuario->rut = $request->rut;
        $usuario->nombre = $request->nombre;
        $usuario->n_rol = $request->n_rol;
        $usuario->contraseña = Hash::make($request->contraseña);

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->rut_edit = $request->rut;
        $usuario->nombre_edit = $request->nombre;
        $usuario->n_rol_edit = $request->n_rol;
        $usuario->contraseña = Hash::make($request->contraseña);

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }

    public function verificar(request $request)
    {
        $credenciales = $request->only('rut', 'contraseña');

        if (Auth::attempt($credenciales)) {
            return redirect()->route('home.index');
        }
        return back()->withErrors('Creedenciales incorrectas')->onlyInput('rut');
    }

    public function nombrePerfil():string
    {
        return $this->perfil->rol;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');
    }
    
    public function contrasena()
    {
        return view('usuarios.contrasena');
    }
}
