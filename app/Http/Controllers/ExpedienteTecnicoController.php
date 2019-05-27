<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatTecnico;
class ExpedienteTecnicoController extends Controller
{
    public function index ()
    {
        // $usuario = Auth::user();
        // if (isset($usuario->empleado->ayuntamiento_id)) {
        //     $ayuntamiento = $usuario->empleado->ayuntamiento_id;
        // }else {
        //     return response()->json('No tiene un ayuntamiento asignado, inicia sesion como empleado.', 200);
        // }
        $catTenicoAdju = CatTecnico::all();
        $catTenicoInvi = CatTecnico::where('invitacion', 1)->select('nombre', 'id')->get();
        $catTenicoLici = CatTecnico::where('licitacion_publica', 1)->select('nombre', 'id')->get();
        return view('forms.expediente-tecnico')
        ->with('catTenicoAdju', $catTenicoAdju)
        ->with('catTenicoInvi', $catTenicoInvi)
        ->with('catTenicoLici', $catTenicoLici);
    }
}
