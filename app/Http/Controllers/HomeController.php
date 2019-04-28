<?php

namespace App\Http\Controllers;

use App\Models\Ayuntamiento;
use App\Models\CatMunicipio;
use App\Models\CatPartido;
use App\Models\CatDistrito;
use App\Models\AyuntamientoPartido;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ayuntamiento = Ayuntamiento::get()->last();
        if($ayuntamiento != null){
            $im = file_get_contents(storage_path('escudos'.DIRECTORY_SEPARATOR).$ayuntamiento->escudo);
            $imdata = base64_encode($im);
            $formato =explode(".", $ayuntamiento->escudo)[1];
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
            $varAyuntamiento['formato'] = $formato;
            $ayuntamiento = collect($varAyuntamiento);
        }
        else{
            $ayuntamiento =collect([]);
        }

        return view('home')
        ->with('ayuntamiento',$ayuntamiento);
    }
}
