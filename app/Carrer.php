<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrer extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function event(){
        return $this->hasMany(Event::class);
    }
    public function noticia(){
        return $this->hasMany(Noticia::class);
    }
    public function foto(){
        return $this->hasMany(Foto::class);
    }
}
