<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $fillable = [
        'descripcion', 'fondo_id', 'usuario_carga', 'fecha_carga'
    ];

    public $timestamps = false;

    protected $table = 'clasificaciones';

    public static function messages(){
        return [
            'descripcion.required'=>'La descripción no puede quedar vacía.',
            'descripcion.max'=>'La descripción no debe exceder los 200 caracteres.',
            'fondo_id.required' => 'La clasificación debe pertenecer a un fondo.'
        ];
    }

    public static function rules(){
        return [
            'descripcion' => 'required|max:200',
            'fondo_id'=>'required'
        ];
    }

    public function user() {
        return $this->hasOne('App\User','id','usuario_carga');
    }

    public function fondo() {
        return $this->hasOne('App\Fondo','id','fondo_id');
    }

    public function pieza() {
        return $this->belongsTo('App\Pieza');
    }
}
