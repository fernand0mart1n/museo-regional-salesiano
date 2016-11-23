<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'persona', 'estado', 'autorizado'
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

    public function person() {
        return $this->hasOne('App\Persona','id','persona');
    }

    public static function cantidadUsuarios()
    {
        return User::where('autorizado', '0')->count();
    }
}
