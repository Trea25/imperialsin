<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function tipus_event(){
        return $this->belongsTo(TipusEvent::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function carrer(){
        return $this->belongsTo(Carrer::class);
    }
}
