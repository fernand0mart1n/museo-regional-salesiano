<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    protected $fillable = [
        'descripcion', 'clasificacion', 'procedencia', 'autor', 'fecha_ejecucion', 'tema', 'observacion'
    ];

    public $timestamps = false;

    public static function messages(){
        return [
            'descripcion.required'=>'La descripción no puede quedar vacía.',
            'descripcion.max'=>'La descripción no debe exceder los 200 caracteres.',
            'clasificacion.required' => 'La clasificación debe pertenecer a un fondo.',
            'procedencia.max'=>'La procedencia no debe exceder los 100 caracteres.',
            'autor.max'=>'El autor no debe exceder los 100 caracteres.',
            'fecha_ejecucion.max'=>'La fecha de ejecución no debe exceder los 100 caracteres.',
            'tema.max'=>'El tema no debe exceder los 100 caracteres.',
            'observacion.max'=>'La observación no debe exceder los 200 caracteres.',
        ];
    }

    public static function rules(){
        return [
            'descripcion' => 'required|max:200',
            'clasificacion' => 'required',
            'procedencia'=>'max:100',
            'autor'=>'max:100',
            'fecha_ejecucion'=>'max:100',
            'tema'=>'max:100',
            'observacion'=>'max:200'
        ];
    }

    public function clasif() {
        return $this->hasOne('App\Clasificacion','id','clasificacion');
    }

    public function revision() {
        return $this->belongsTo('App\Revision');
    }

    public function fotos() {
        return $this->belongsToMany('App\Foto');
    }
}
