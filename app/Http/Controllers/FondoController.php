<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Fondo;
use Validator;

class FondoController extends Controller
{

    /*$messsages = array(
        'email.required'=>'You cant leave Email field empty',
        'name.required'=>'You cant leave name field empty',
        'name.min'=>'The field has to be :min chars long',
    );

    $rules = array(
        'email'=>'required|unique:content',
        'name'=>'required|min:3',
    );

    $validator = Validator::make(Input::all(), $rules,$messsages);
    */

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
        $fondos = Fondo::all();

        return view("fondos.index", compact("fondos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fondos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Fondo::rules(), Fondo::messages());

        if($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        $fondo = $request->all();
        Fondo::create($fondo);
        return redirect('fondos')->with('success', ' El fondo ha sido cargado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fondo = Fondo::find($id);
        return view('fondos.show',compact('fondo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fondo = Fondo::find($id);
        return view('fondos.edit',compact('fondo'));
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
        $validator = Validator::make($request->all(), Fondo::rules(), Fondo::messages());

        if($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        $fondoUpdate = $request->all();
        $fondo = Fondo::find($id);
        $fondo->update($fondoUpdate);
        return redirect('fondos')->with('success', ' El fondo ha sido modificado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fondo::find($id)->delete();
        return redirect('fondos');
    }
}
