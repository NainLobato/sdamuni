<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibroActas;
use App\Models\Relacion;
use Auth;
use DB;
class LibroActasController extends Controller
{
    public function index ()
    {
        $libros = LibroActas::all()->toArray();
        // dd($libros);
        return view('forms.libros-actas')
        ->with('libros', $libros);
    }

    public function store (Request $request)
    {
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 1, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
        DB::beginTransaction();
        try {
            if (!$relacion) {
                $relacion = new Relacion ();
                $relacion->formato_id = 1;
                $relacion->ayuntamiento_id = $usuario->empleado->ayuntamiento_id;
                $relacion->save();

            } else {
                $relacion->save();
            }
            $libro = LibroActas::where(['relacion_id' => $relacion->id, 'clave' => $request['libro']['clave']])->first();
            if ($libro) {
                DB::rollback();
                return response()->json(['success' => true, 'estado' => 1],200);
            }
            $libro = new LibroActas ();
            $libro->clave = $request['libro']['clave'];
            $libro->fecha_primer_sesion = $request['libro']['fecha_primer_sesion'];
            $libro->fecha_ultima_sesion = $request['libro']['fecha_ultima_sesion'];
            $libro->primer_folio = $request['libro']['primer_folio'];
            $libro->ultimo_folio = $request['libro']['ultimo_folio'];
            $libro->comentarios = $request['libro']['comentarios'];
            $libro->ubicacion = $request['libro']['ubicacion'];
            $libro->relacion_id = $relacion->id;
            $libro->save();

            DB::commit();
            return response()->json(['success' => true, 'estado' => 2],200);

        } catch (\PDOException $th) {
            DB::rollback();
            return response()->json(['success' => true, 'estado' => 3, 'error' => $th],200);
        }

        return response()->json(['success' => true, 'estado' => 4],200);
    }
}
