<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'cuil_cuit', 'domicilio', 'telefono', 'fecha_carga'
    ];

    public $timestamps = false;
}
