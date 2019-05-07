<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Models\Empleado;

class ActaConsejoPlaneacionController extends Controller
{
    public function index ()
    {
        $usuario = Auth::user();
        if (isset($usuario->empleado->ayuntamiento_id)) {
            $ayuntamiento = $usuario->empleado->ayuntamiento_id;
        }else {
            return response()->json('No tiene un ayuntamiento asignado, inicia sesion como empleado.', 200);
        }
        $empleados = Empleado::with(array('user' => function ($query) {
            $query->select('id', DB::raw('CONCAT(nombres," ", primer_ap," ", segundo_ap) as nombre'));
        }))
        ->where('ayuntamiento_id', $ayuntamiento)
        ->select('id','user_id')
        ->get();
        dump($empleados);
        return view('forms.actas-consejo-planeacion')->with('empleados', $empleados);
    }
}
