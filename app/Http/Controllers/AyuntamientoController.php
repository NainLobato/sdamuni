<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ayuntamiento;
use App\Models\CatMunicipio;
use App\Models\CatPartido;
use App\Models\CatDistrito;
use App\Models\AyuntamientoPartido;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use DB;

class AyuntamientoController extends Controller
{

    public function index()
    {
        $ayuntamientos = Ayuntamiento::with('municipio','partidos')->has('municipio')->get();
        $arrayAyunta = [];
        foreach ($ayuntamientos as $ayuntamiento) {
            if($ayuntamiento->escudo==''){
                $imdata='';
                $formato='';
            }else{
                $im = file_get_contents(storage_path('escudos'.DIRECTORY_SEPARATOR).$ayuntamiento->escudo);
                $imdata = base64_encode($im);
                $formato =explode(".", $ayuntamiento->escudo)[1];
            }
            $varAyuntamiento = [];
            $varAyuntamiento['municipio'] = [ 'id' => $ayuntamiento->municipio->id, 'nombre' => $ayuntamiento->municipio->municipio, 'clave' => $ayuntamiento->municipio->clave];
            $varAyuntamiento['distrito'] = [ 'id' => $ayuntamiento->municipio->distrito->id, 'nombre' => $ayuntamiento->municipio->distrito->distrito];
            $varAyuntamiento['partidos'] = [];

            foreach ($ayuntamiento->partidos as $partido) {
                $row = [];
                $row['id'] = $partido->id;
                $row['nombre'] = $partido->partido;
                array_push($varAyuntamiento['partidos'],$row);
            }
            $varAyuntamiento['id'] = $ayuntamiento->id;
            $varAyuntamiento['telefono1'] = $ayuntamiento->telefono1;
            $varAyuntamiento['telefono2'] = $ayuntamiento->telefono2;
            $varAyuntamiento['correo'] = $ayuntamiento->correo;
            $varAyuntamiento['escudo'] = $imdata;
            $varAyuntamiento['formato'] = $formato;
            array_push($arrayAyunta,$varAyuntamiento);

        }
        $ayuntamientos = collect($arrayAyunta);
        // dd($ayuntamientos);
        $municipios = CatMunicipio::orderBy('municipio', 'asc')->select('municipio as nombre', 'id', 'clave')->get();
        $partidos = CatPartido::orderBy('partido', 'asc')->select('partido as nombre', 'id')->get();
        $distritos = CatDistrito::orderBy('distrito', 'asc')->select('distrito as nombre', 'id')->get();
        return view('forms.ayuntamiento')->with('municipios',$municipios)->with('partidos',$partidos)->with('distritos',$distritos)->with('ayuntamientos',$ayuntamientos);
    }

    public function getCatalogos()
    {

        $municipios = CatMunicipio::orderBy('municipio', 'asc')->select('municipio as nombre', 'id')->get();
        $partidos = CatPartido::orderBy('partido', 'asc')->select('partido as nombre', 'id')->get();
        $distritos = CatDistrito::orderBy('distrito', 'asc')->select('distrito as nombre', 'id')->get();
		$data = array(
		'municipios' => $municipios,
		'partidos' => $partidos,
		'distritos' => $distritos
		);
		return response()->json($data);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try{
            // dd($request->get('ayuntamiento')['escudo']);
            if($request->get('ayuntamiento')['escudo']){
                $image = $request->get('ayuntamiento')['escudo'];
                $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                \Image::make($request->get('ayuntamiento')['escudo'])->save(storage_path('escudos'.DIRECTORY_SEPARATOR).$name);
            }else {
                $name = '';
            }

            $ayuntamiento = new Ayuntamiento();
            $ayuntamiento->municipio_id = $request->ayuntamiento['municipio_id'];
            $ayuntamiento->escudo = $name;
            $ayuntamiento->telefono1 = $request->ayuntamiento['telefono1'];
            $ayuntamiento->telefono2 = $request->ayuntamiento['telefono2'];
            $ayuntamiento->correo = $request->ayuntamiento['correo'];
            $ayuntamiento->save();

            $ayuntamiento->partidos()->sync(array_column($request->ayuntamiento['partido_id'],'id'));

            DB::commit();
            return 3;
        }catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }

    public function show($id)
    {
        $ayuntamiento = Ayuntamiento::with('municipio','partidos','RutaImagen')->has('municipio')->where('id',$id)->first();
        return view('ayuntamiento.show')->with('ayuntamiento',$ayuntamiento);
    }

    public function edit($id)
    {
        $ayuntamiento = Ayuntamiento::with('municipio','partidos')->has('municipio')->where('id',$id)->first();

        $im = file_get_contents(storage_path('escudos'.DIRECTORY_SEPARATOR).$ayuntamiento->escudo);
        $imdata = base64_encode($im);
        $varAyuntamiento = [];
        $varAyuntamiento['municipio'] = [ 'id' => $ayuntamiento->municipio->id, 'nombre' => $ayuntamiento->municipio->municipio];
        $varAyuntamiento['distrito'] = [ 'id' => $ayuntamiento->municipio->distrito->id, 'nombre' => $ayuntamiento->municipio->distrito->distrito];
        $varAyuntamiento['partidos'] = [];
        foreach ($ayuntamiento->partidos as $partido) {
            $row = [];
            $row['id'] = $partido->id;
            $row['nombre'] = $partido->partido;
            array_push($varAyuntamiento['partidos'],$row);
        }
        $varAyuntamiento['id'] = $ayuntamiento->id;
        $varAyuntamiento['telefono1'] = $ayuntamiento->telefono1;
        $varAyuntamiento['telefono2'] = $ayuntamiento->telefono2;
        $varAyuntamiento['correo'] = $ayuntamiento->correo;
        $varAyuntamiento['escudo'] = $imdata;
        // dd($varAyuntamiento);
        $ayuntamiento = $varAyuntamiento;
        $ayuntamientos = Ayuntamiento::with('municipio','partidos')->has('municipio')->get();
        $municipios = CatMunicipio::orderBy('municipio', 'asc')->pluck('municipio', 'id');
        $partidos = CatPartido::orderBy('partido', 'asc')->pluck('partido', 'id');
        $distritos = CatDistrito::orderBy('distrito', 'asc')->select('distrito as nombre', 'id')->get();
        return view('forms.ayuntamiento')->with('ayuntamiento',$ayuntamiento)->with('distritos',$distritos)->with('ayuntamientos',$ayuntamientos)->with('municipios',$municipios)->with('partidos',$partidos);
    }


    public function update(Request $request)
    {

        $id = intval($request->ayuntamiento['id']);
        DB::beginTransaction();
        try{
            $ayuntamiento = Ayuntamiento::find($id);

            if(isset($request->get('ayuntamiento')['escudo'])){
                if($request->get('ayuntamiento')['escudo']){
                    $image = $request->get('ayuntamiento')['escudo'];
                    $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                    \Image::make($request->get('ayuntamiento')['escudo'])->save(storage_path('escudos'.DIRECTORY_SEPARATOR).$name);
                    Storage::delete(storage_path('escudos'.DIRECTORY_SEPARATOR).$ayuntamiento->escudo);
                }else{
                    $name = '';
                }
                $ayuntamiento->escudo = $name;
            }
            $ayuntamiento->municipio_id = $request->ayuntamiento['municipio_id'];
            $ayuntamiento->telefono1 = $request->ayuntamiento['telefono1'];
            $ayuntamiento->telefono2 = $request->ayuntamiento['telefono2'];
            $ayuntamiento->correo = $request->ayuntamiento['correo'];
            $ayuntamiento->save();

            AyuntamientoPartido::where('ayuntamiento_id', $ayuntamiento->id)->delete();
            $ayuntamiento->partidos()->sync(array_column($request->ayuntamiento['partido_id'],'id'));

            DB::commit();
            return 3;
        }catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }

    public function delete(Request $request)
    {
        $id = intval($request->id);
        DB::beginTransaction();
        try{
            $ayuntamiento = Ayuntamiento::find($id);
            Storage::delete(storage_path('escudos'.DIRECTORY_SEPARATOR).$ayuntamiento->escudo);
            AyuntamientoPartido::where('ayuntamiento_id', $ayuntamiento->id)->delete();
            $ayuntamiento->delete();

            DB::commit();
            return 3;
        }catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }
}
