<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Persona;
use App\Role;
use Session;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('autorizado', '1')->get();

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

    public function estado(Request $request, $id)
    {
        $usuarioUpdate = Request::all();
        $usuario = User::find($id);
        $usuario->update($usuarioUpdate);

        if(Request::input('rol')){
            $usuario->detachRoles($usuario->roles);
            $usuario->attachRole(Request::input('rol'));
        }

        Session::flash('success', ' El usuario ' . $usuario->name . ' ha sido modificado.');
    }

    public function autorizar()
    {
        $sinAutorizar = User::where('autorizado', '0')->get();
        $roles = Role::all();
        $accion = "autorizar";

        if(count($sinAutorizar)){
            return view('usuarios.autorizar', compact('sinAutorizar', 'accion', 'roles'));    
        } else {
            Session::flash('success', 'No hay usuarios pendientes de autorización.');
            return redirect('usuarios');
        }
    }
}
