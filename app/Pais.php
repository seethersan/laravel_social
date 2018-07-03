<?php

namespace ucsp;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    //
    public function persona(){
        return $this->belongsTo('App\Persona');
    }
}
