<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['pieza', 'foto'];

    public $timestamps = false;

    public function pieza() {
        return $this->belongsToMany('App\Pieza');
    }
}
