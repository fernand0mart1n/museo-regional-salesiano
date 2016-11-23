<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pieza;
use App\Foto;
use Validator;
use DB;

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

    public function cargarFotos($id){
        return view('piezas.fotos', compact('id'));
    }

    public function subirFotos(Request $request, $id)
    {
        //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
 
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();

       $foto = new Foto();

       $foto->pieza = $id;
       $foto->foto = $nombre;

       $foto->save();

       DB::select("INSERT INTO foto_pieza (foto_id, pieza_id) VALUES ($foto->id, $id)");

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));

        return redirect('piezas')->with('success', ' La foto fue subida exitosamente.');
    }

    public function verFotos($id)
    {
        $pieza = Pieza::find($id);

        $pieza->load('fotos');

        return view('piezas.ver',compact('pieza'));
    }
}
