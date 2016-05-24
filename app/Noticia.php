<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{

    protected $table = 'noticies';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function carrer(){
        return $this->belongsTo(Carrer::class);
    }
    public function foto(){
        return $this->hasMany(Foto::class);
    }
}
