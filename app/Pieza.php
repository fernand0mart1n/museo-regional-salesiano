<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    protected $fillable = [
        'descripcion', 'clasificacion', 'procedencia', 'autor', 'fecha_ejecucion', 'tema', 'observacion'
    ];

    public $timestamps = false;

    public function clasif() {
        return $this->hasOne('App\Clasificacion','id','clasificacion');
    }

    public function revision() {
        return $this->belongsTo('App\Revision');
    }
}
