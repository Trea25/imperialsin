<?php
// Aixo es l'usuari
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carrer(){
        return $this->hasOne(Carrer::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function noticia(){
        return $this->hasMany(Noticia::class);
    }
}
