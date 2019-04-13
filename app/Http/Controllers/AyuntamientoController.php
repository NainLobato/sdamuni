<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ayuntamiento;
use App\Models\CatMunicipio;
use App\Models\AyuntamientoPartido;

class AyuntamientoController extends Controller
{

    public function index()
    {
        $ayuntamiento = Ayuntamiento::all();
        return view('ayuntamiento.index')->with('ayuntamiento',$ayuntamiento);
    }

    public function create()
    {
        $municipios = CatMunicipio::orderBy('municipio', 'asc')->pluck('municipio', 'id');
        $partidos = CatPartido::orderBy('partido', 'asc')->pluck('partido', 'id');
        return view('ayuntamiento.create')->with('municipios',$municipios)->with('partidos',$partidos);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $ayuntamiento = new Ayuntamiento();
            $ayuntamiento->municipio_id = $request->municipio_id;
            $ayuntamiento->escudo = $request->escudo;
            $ayuntamiento->telefono1 = $request->telefono1;
            $ayuntamiento->telefono2 = $request->telefono2;
            $ayuntamiento->correo = $request->correo;
            $ayuntamiento->save();

            foreach ($request->partidos_id as $partidos) {
                $ayuntamientoPartido = new AyuntamientoPartido();
                $ayuntamientoPartido->ayuntamiento_id = $ayuntamiento->id;
                $ayuntamientoPartido->partido_id = $request->partido_id;
                $ayuntamientoPartido->save();
            }
            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }

    public function show($id)
    {
        $ayuntamiento = Ayuntamiento::where('id',$id)->first();
        return view('ayuntamiento.show')->with('ayuntamiento',$ayuntamiento);
    }

    public function edit($id)
    {
        $ayuntamiento = Ayuntamiento::where('id',$id)->first();
        $municipios = CatMunicipio::orderBy('municipio', 'asc')->pluck('municipio', 'id');
        $partidos = CatPartido::orderBy('partido', 'asc')->pluck('partido', 'id');
        return view('ayuntamiento.edit')->with('ayuntamiento',$ayuntamiento)->with('municipios',$municipios)->with('partidos',$partidos);    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $ayuntamiento = Ayuntamiento::find($id);
            $ayuntamiento->municipio_id = $request->municipio_id;
            $ayuntamiento->escudo = $request->escudo;
            $ayuntamiento->telefono1 = $request->telefono1;
            $ayuntamiento->telefono2 = $request->telefono2;
            $ayuntamiento->correo = $request->correo;
            $ayuntamiento->save();

            AyuntamientoPartido::where('ayuntamiento_id', $ayuntamiento->id)->delete();
            foreach ($request->partidos_id as $partidos) {
                $ayuntamientoPartido = new AyuntamientoPartido();
                $ayuntamientoPartido->ayuntamiento_id = $ayuntamiento->id;
                $ayuntamientoPartido->partido_id = $request->partido_id;
                $ayuntamientoPartido->save();
            }
            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }
}