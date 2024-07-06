<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
////use Illuminate\Support\Facades\Auth;
////use Gate;
use App\Models\Perfil;
use App\Http\Requests\UsuarioRequest;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ////if (Gate::denies('usuarios.gestionar')) {
        ////    return redirect()->route('home.index');
       //// }

        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $perfiles = Perfil::all();
        return view('usuarios.create',compact('perfiles'));
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
        $perfiles = Perfil::all();
        return view('usuarios.edit', compact('usuario','perfiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->rut = $request->rut;
        $usuario->nombre = $request->nombre;
        $usuario->n_rol = $request->n_rol;
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

    public function login()
    {
        return view('usuarios.login');
    }
    public function verificar(request $request)
    {
        $credenciales = $request->only('rut', 'contraseña');

        //if (Auth::attempt($credenciales)) {
            return redirect()->route('home.index');
        //}
       // return back()->withErrors('Creedenciales incorrectas')->onlyInput('rut');
    }

    public function nombrePerfil():string
    {
        return $this->perfil->rol;
    }

    public function logout()
    {
        //Auth::logout();
        return redirect()->route('usuarios.login');
    }
    
    public function contrasena()
    {
        return view('usuarios.contrasena');
    }

    public function createadmin()
    {
        $perfiles = Perfil::all();
        return view('usuarios.createadmin',compact('perfiles'));
    }

    public function cambiocontra(Request $request)
{
    $usuario = Usuario::find($request->rut);

    if (!$usuario) {
        
        return redirect()->back()->withErrors('Usuario no encontrado.');
    }

    
    if (!Hash::check($request->contrasena_actual, $usuario->contraseña)) {
        return redirect()->back()->withErrors('La contraseña actual no es válida.');
    }

    
    if ($request->contrasena_nueva !== $request->repetir_contrasena_nueva) {
        return redirect()->back()->withErrors('Las contraseñas nuevas no coinciden.');
    }

    
    $usuario->contraseña = Hash::make($request->contrasena_nueva);
    $usuario->save();

    return redirect()->route('home.index');
}

}
