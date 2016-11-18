<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'cuil_cuit', 'domicilio', 'telefono', 'fecha_carga', 'sexo'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
