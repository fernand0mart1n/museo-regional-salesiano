<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Persona;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $usuario = User::find(Auth::user()->id);
            $persona = Persona::find($usuario->persona);
            return view('home', compact('usuario', 'persona'));    
        } else {
            return view('auth.login');
        }
    }

    public function datos()
    {
        if(Auth::check()){
            $usuario = User::find(Auth::user()->id);
            $persona = Persona::find($usuario->persona);
            return view('datos', compact('usuario', 'persona'));    
        } else {
            return view('auth.login');
        }
    }
}
