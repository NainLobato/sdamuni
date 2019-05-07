<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuicioPorAyuntamientoController extends Controller
{
    public function index()
    {
        return view('forms.juicio-por-ayuntamiento');
    }

    public function store(Request $request)
    {
        dd($request);
        return 0;
    }

    public function update(Request $request)
    {
        dd($request);
        return 0;
    }

    public function delete(Request $request)
    {
        dd($request);
        return 0;
    }

    public function show($id)
    {
        dd($id);
        return 0;
    }
}
