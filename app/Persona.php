<?php

namespace ucsp;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table = "persona";
    protected $primaryKey = "email";
    public $incrementing = false;

    //
    protected $hidden = [
        'password',
    ];

    public function pais(){
        return $this->hasOne('ucsp\Pais');
    }

    public function user(){
        return $this->hasOne('ucsp\User', 'email', 'email');
    }

    public function amigos(){
        return $this->belongsToMany('ucsp\Persona', 'amistades', 'persona_id', 'amigo_id');
    }

    public function amigoDe(){
        return $this->belongsToMany('ucsp\Persona', 'amistades', 'amigo_id', 'persona_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
