<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuicioContraAyuntamientoController extends Controller
{
    public function index ()
    {
        return view('forms.juicio-contra-ayuntamiento');
    }
}
