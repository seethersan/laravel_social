<?php

namespace ucsp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use ucsp\Pais;
use ucsp\Persona;
use ucsp\User;
use ucsp\Amistad;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'create']);
    }

    public function index()
    {
        //
        $persons = Persona::where('email', '<>', [User::find(Auth::user()->getAuthIdentifier())->persona->email])
            ->paginate(10);
        $persona = User::find(Auth::user()->getAuthIdentifier())->persona;
        $amigo_de = Amistad::select('amigo_id')->where('persona_id', $persona->email)->get()->toArray();
        $soy_amigo = Amistad::select('persona_id')->where('amigo_id', $persona->email)->get()->toArray();
        $amigos = array_merge($amigo_de, $soy_amigo);
        return view('persona.people_nearby', compact('persons', 'persona', 'amigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = Pais::all(['codigo', 'nombre']);
        return view('persona.create', compact('items', $items));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $persona = new Persona();
        $persona->firstname = $request->input('firstname');
        $persona->lastname = $request->input('lastname');
        $persona->email = $request->input('email');
        $persona->password = Hash::make($request->input('password'));
        $persona->birthdate =
            $request->input('year')."-".$request->input('month')."-".$request->input("day");
        if ($request->input('male') == true)
            $persona->gender = "Male";
        else if ($request->input('female') == true)
            $persona->gender = "Female";
        $persona->city = $request->input("city");
        $persona->pais = $request->input("country");
        $persona->slug = $request->input('firstname')."-".$request->input('lastname');
        $persona->save();
        $user = new User();
        $user->name = $request->input('firstname').' '.$request->input('lastname');
        $user->email = $request->input('email');
        $user->password = $persona->password;
        $user->save();
        return view('persona.about', compact('persona', $persona));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
        $user = User::find(Auth::user()->getAuthIdentifier())->persona;
        $amigo_de = Amistad::select('amigo_id')->where('persona_id', $user->email)->get()->toArray();
        $soy_amigo = Amistad::select('persona_id')->where('amigo_id', $user->email)->get()->toArray();
        $amigos = array_merge($amigo_de, $soy_amigo);
        return view('persona.about', compact('persona', 'user', 'amigos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
        $items = Pais::all(['codigo', 'nombre']);
        $date = strtotime( $persona->birthdate);
        $user = User::find(Auth::user()->getAuthIdentifier())->persona;
        return view('persona.edit_basic', compact('items', 'persona', 'date', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/avatar/', $name);
            $persona->avatar = $name;
        }
        $persona->firstname = $request->input('firstname');
        $persona->lastname = $request->input('lastname');
        $persona->birthdate =
            $request->input('year')."-".$request->input('month')."-".$request->input("day");
        if ($request->input('male') == true)
            $persona->gender = "Male";
        else if ($request->input('female') == true)
            $persona->gender = "Female";
        $persona->city = $request->input("city");
        $persona->pais = $request->input("country");
        $persona->slug = $request->input('firstname')."-".$request->input('lastname');
        $persona->description = $request->input('information');
        $persona->save();
        $items = Pais::all(['codigo', 'nombre']);
        $date = strtotime( $persona->birthdate);
        $user = User::find(Auth::user()->getAuthIdentifier())->persona;
        return view('persona.edit_basic', compact('items', 'persona', 'date', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
