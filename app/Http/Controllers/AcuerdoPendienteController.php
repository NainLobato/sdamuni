<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcuerdoPendienteController extends Controller
{
    public function index ()
    {
        return view('forms.acuerdos-pendientes');
    }
}
