<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
        'usuario_revision', 'pieza', 'fecha_revision', 'estado_conservacion', 'ubicacion'
    ];

    public $timestamps = false;

    protected $table = 'revisiones';

    public static function messages(){
        return [
            'usuario_revision.required'=>'Debe tener un usuario de carga.',
            'pieza.required'=>'La debe tener una pieza.'
        ];
    }

    public static function rules(){
        return [
            'usuario_revision' => 'required',
            'pieza' => 'required',
        ];
    }

    public function user() {
        return $this->hasOne('App\User','id','usuario_revision');
    }

    public function piez() {
        return $this->hasOne('App\Pieza','id','pieza');
    }
}
