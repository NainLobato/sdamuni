<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ObraAccionController extends Controller
{
    public function index ()
    {
        $usuario = Auth::user();
        if (isset($usuario->empleado->ayuntamiento_id)) {
            $ayuntamiento = $usuario->empleado->ayuntamiento_id;
        }else {
            return response()->json('No tiene un ayuntamiento asignado, inicia sesion como empleado.', 200);
        }
        return view('forms.obras-acciones')->render();
    }
}
