<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuicioPorAyuntamientoController extends Controller
{
    public function index ()
    {
        return view('forms.juicio-por-ayuntamiento');
    }
}
