<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroActasController extends Controller
{
    public function index ()
    {
        return view('forms.libros-actas');
    }
}
