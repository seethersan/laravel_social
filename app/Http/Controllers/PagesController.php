<?php

namespace ucsp\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use ucsp\Pais;

class PagesController extends Controller
{
    //
    public function index(){
        $items = Pais::all(['codigo', 'nombre']);
        return view('persona.create', compact('items', $items));
    }
}
