<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pieza;
use Validator;

class PiezaController extends Controller
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
        $piezas = Pieza::all();

        return view("piezas.index", compact("piezas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piezas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Pieza::rules(), Pieza::messages());

        if($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        $pieza = $request->all();
        Pieza::create($pieza);
        return redirect('piezas')->with('success', ' La pieza ha sido cargada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pieza = Pieza::find($id);
        return view('piezas.show',compact('pieza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pieza = Pieza::find($id);
        return view('piezas.edit',compact('pieza'));
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
        $validator = Validator::make($request->all(), Pieza::rules(), Pieza::messages());

        if($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        $piezaUpdate = $request->all();
        $pieza = Pieza::find($id);
        $pieza->update($piezaUpdate);
        return redirect('piezas')->with('success', ' La pieza ha sido cargada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pieza::find($id)->delete();
        return redirect('piezas');
    }
}
