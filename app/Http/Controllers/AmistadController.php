<?php

namespace ucsp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ucsp\Persona;
use ucsp\Amistad;
use ucsp\User;

class AmistadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agregarAmigo(Request $request){
        $persona = User::find(Auth::user()->getAuthIdentifier())->persona;
        $amigo = Persona::where('slug', ($request['agregarAmigo']))->first();
        if (Amistad::where('persona_id', $persona->email)
            ->where('amigo_id', $amigo->email)->first() or Amistad::where('persona_id', $persona->email)
                ->where('amigo_id', $amigo->email)->first()){
            return redirect()->route('persona.index')->with('flash', 'Amigo ya agregado')->withInput(request(['agregarAmigo']));
        }
        else{
            if ($persona != $amigo){
                $amistad = new Amistad();
                $amistad->persona_id = $persona->email;
                $amistad->amigo_id = $amigo->email;
                $amistad->status = 1;
                $amistad->save();
            }
            return redirect()->route('persona.index');
        }
    }

    public function amigos(Persona $persona){
        $friends = Persona::whereHas('amigos', function ($query) use ($persona){
            $query->where([
                'amigo_id' => $persona->email
            ]);
        })->orWhereHas('amigoDe', function ($query) use ($persona){
            $query->where([
                'persona_id' => $persona->email
            ]);
        })->get();
        $user = User::find(Auth::user()->getAuthIdentifier())->persona;
        $amigo_de = Amistad::select('amigo_id')->where('persona_id', $persona->email)->get()->toArray();
        $soy_amigo = Amistad::select('persona_id')->where('amigo_id', $persona->email)->get()->toArray();
        $amigos = array_merge($amigo_de, $soy_amigo);
        return view('persona.friends', compact('persona', 'friends', 'user', 'amigos'));
    }
}
