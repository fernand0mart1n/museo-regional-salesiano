<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{

	protected $fillable = [
        'descripcion', 'usuario_carga', 'fecha_carga'
    ];

    public $timestamps = false;

    public function user() {
        return $this->hasOne('App\User','id','usuario_carga');
    }

    public function clasificacion()
    {
        return $this->belongsTo('App\Clasificacion', 'id', 'fondo_id');
    }
}
