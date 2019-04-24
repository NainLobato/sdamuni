<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ayuntamiento;
use App\Models\CatMunicipio;
use App\Models\CatPartido;
use App\Models\CatDistrito;
use App\Models\AyuntamientoPartido;
use DB;

class AyuntamientoController extends Controller
{

    public function index()
    {
        $ayuntamiento = Ayuntamiento::all();
        return view('forms.ayuntamiento')->with('ayuntamiento',$ayuntamiento);
    }

    public function create()
    {
        $ayuntamiento = Ayuntamiento::with('municipio','partidos')->has('municipio')->get();
        $municipios = CatMunicipio::orderBy('municipio', 'asc')->select('municipio as nombre', 'id', 'clave')->get();
        $partidos = CatPartido::orderBy('partido', 'asc')->select('partido as nombre', 'id')->get();
        $distritos = CatDistrito::orderBy('distrito', 'asc')->select('distrito as nombre', 'id')->get();
        dd( $ayuntamiento);
        return view('forms.ayuntamiento')->with('municipios',$municipios)->with('partidos',$partidos)->with('distritos',$distritos)->with('ayuntamiento',$ayuntamiento);
    }

    public function getCatalogos()
    {

        $municipios = CatMunicipio::orderBy('municipio', 'asc')->select('municipio as nombre', 'id')->get();
        $partidos = CatPartido::orderBy('partido', 'asc')->select('partido as nombre', 'id')->get();
		$data = array(
		'municipios' => $municipios,
		'partidos' => $partidos
		);
		return response()->json($data);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try{
            // dd($request->all());
            $ayuntamiento = new Ayuntamiento();
            $ayuntamiento->municipio_id = $request->ayuntamiento['municipio_id'];
            // $ayuntamiento->escudo = $request->ayuntamiento['escudo'];
            $ayuntamiento->escudo = '';
            $ayuntamiento->telefono1 = $request->ayuntamiento['telefono1'];
            $ayuntamiento->telefono2 = $request->ayuntamiento['telefono2'];
            $ayuntamiento->correo = $request->ayuntamiento['correo'];
            $ayuntamiento->save();

            foreach ($request->ayuntamiento['partido_id'] as $partidos) {
                $ayuntamientoPartido = new AyuntamientoPartido();
                $ayuntamientoPartido->ayuntamiento_id = $ayuntamiento->id;
                $ayuntamientoPartido->partido_id =  $partidos['id'];
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
