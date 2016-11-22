<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Persona;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view("usuarios.index", compact("usuarios"));
    }

    public function show($id)
    {
        $usuario = User::find($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function rol($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function editarRol(Request $request, $id)
    {
        $usuarioestado = $request->input('estado');
        $usuario = User::find($id);
        $usuario->estado = $usuarioestado;
        $usuario->save();
        
        return redirect('usuarios');
    }    

    public function estado(Request $request, $id)
    {
        $usuarioUpdate = Request::all();
        $usuario = User::find($id);
        $usuario->update($usuarioUpdate);
        return redirect('usuarios');
    }
}
