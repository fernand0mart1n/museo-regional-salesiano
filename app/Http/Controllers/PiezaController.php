<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\Pieza;

class PiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){

            $piezas = Pieza::all();

            return view("piezas.index", compact("piezas"));

        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){    
            return view('piezas.create');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $pieza = Request::all();
            Pieza::create($pieza);
            return redirect('piezas');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $pieza = Pieza::find($id);
            return view('piezas.show',compact('pieza'));
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $pieza = Pieza::find($id);
            return view('piezas.edit',compact('pieza'));
        } else {
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::check()){
            $piezaUpdate = Request::all();
            $pieza = Pieza::find($id);
            $pieza->update($piezaUpdate);
            return redirect('piezas');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desproy($id)
    {
        if(Auth::check()){
            Pieza::find($id)->delete();
            return redirect('piezas');
        } else {
            return view('auth.login');
        }
    }
}
