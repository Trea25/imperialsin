<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{

    public function carrer(){
        return $this->hasOne(Carrer::class);
    }
    public function noticia(){
        return $this->hasOne(Noticia::class);
    }
}
