<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratosConveniosAcuerdosController extends Controller
{
    public function index ()
    {
        return view('forms.contratos-convenios-acuerdos');
    }
}
