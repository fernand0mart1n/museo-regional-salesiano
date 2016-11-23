<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{

	protected $fillable = [
        'descripcion', 'usuario_carga', 'fecha_carga'
    ];

    public $timestamps = false;

    public static function messages(){
        return [
            'descripcion.required'=>'La descripción no puede quedar vacía.',
            'descripcion.max'=>'La descripción no debe exceder los 200 caracteres.'
        ];
    }

    public static function rules(){
        return [
            'descripcion' => 'required|max:200'
        ];
    }

    public function user() {
        return $this->hasOne('App\User','id','usuario_carga');
    }

    public function clasificacion()
    {
        return $this->belongsTo('App\Clasificacion', 'id', 'fondo_id');
    }
}
