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
