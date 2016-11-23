<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Revision;
use Validator;

class RevisionController extends Controller
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
        $revisiones = Revision::all();

        return view("revisiones.index", compact("revisiones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('revisiones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Revision::rules(), Revision::messages());

        if($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        $revision = $request->all();
        Revision::create($revision);
        return redirect('revisiones')->with('success', ' La revisión ha sido cargada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revision = Revision::find($id);
        return view('revisiones.show',compact('revision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revision = Revision::find($id);
        return view('revisiones.edit',compact('revision'));
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
        $validator = Validator::make($request->all(), Revision::rules(), Revision::messages());

        if($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        $revisionUpdate = $request->all();
        $revision = Revision::find($id);
        $revision->update($revisionUpdate);
        return redirect('revisiones')->with('success', ' La revisión ha sido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Revision::find($id)->delete();
        return redirect('revisiones');
    }
}
