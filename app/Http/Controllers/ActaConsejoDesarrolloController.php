<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActaConsejoDesarrollo;
use App\Models\Relacion;
use Auth;

class ActaConsejoDesarrolloController extends Controller
{
    public function index()
    {
        return view('forms.actas-consejo-desarrollo');
    }

    public function store(Request $request)
    {
        dd($request);
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 6, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
        DB::beginTransaction();
        try {
            if (!$relacion) {
                $relacion = new Relacion ();
                $relacion->formato_id = 6;
                $relacion->ayuntamiento_id = $usuario->empleado->ayuntamiento_id;
                $relacion->save();
            }

            $acta = ActaConsejoDesarrollo::where(['relacion_id' => $relacion->id, 'num_acta' => $request->acta['num_acta']])->first();
            if ($acta) {
                DB::rollback();
                return 2;//acta ya existe
            }
            $acta = new ActaConsejoDesarrollo ();
            $acta->num_acta = $request->acta['num_acta'];
            $acta->fecha_levanto_acta = $request->acta['fecha_levanto_acta'];
            $acta->asuntos_acta = $request->acta['asuntos_acta'];
            $acta->año_acta = $request->acta['año_acta'];
            $acta->num_forjas = $request->acta['num_forjas'];
            $acta->firmas_consejo = $request->acta['firmas_consejo'];
            $acta->sellos_validez = $request->acta['sellos_validez'];
            $acta->relacion_id = $relacion->id;
            $acta->save();

            DB::commit();
            return 3;//guardado correctamente

        } catch (\PDOException $th) {
            DB::rollback();
            return 0;//error
        }

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
