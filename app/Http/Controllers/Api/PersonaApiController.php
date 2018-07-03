<?php

namespace ucsp\Http\Controllers\Api;

use Illuminate\Http\Request;
use ucsp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use ucsp\Persona;
use ucsp\User;

class PersonaApiController extends Controller
{
    //
    public function get(){
        return Persona::all();
    }
    public function find(Persona $persona){
        return $persona;
    }
    public function post(Request $request){
        $data = $request->json()->all();
        $password = Hash::make($data["password"]);
        $data["password"] = $password;
        $user = new User();
        $user->name = $data["firstname"].' '.$data["lastname"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->save();
        $persona = new Persona();
        $persona->firstname = $data["firstname"];
        $persona->lastname = $data["lastname"];
        $persona->email = $data["email"];
        $persona->password = $data["password"];
        $persona->birthdate = $data["birthdate"];
        $persona->gender = $data["gender"];
        $persona->city = $data["city"];
        $persona->pais = $data["pais"];
        $persona->slug = $data["firstname"]."-".$data["lastname"];
        $persona->save();
        return $persona;
    }
    public function put(Request $request, Persona $persona){
        $persona->update($request->all());
        return $persona;
    }
    public function delete(Persona $persona){
        $persona->delete();
        return 204;
    }
}
