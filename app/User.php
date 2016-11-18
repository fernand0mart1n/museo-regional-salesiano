<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'persona'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fondo()
    {
        return $this->belongsTo('App\Fondo');
    }

    public function clasificacion()
    {
        return $this->belongsTo('App\Clasificacion');
    }

    public function persona() {
        return $this->hasOne('App\Persona','id','persona');
    }
}
