<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ayuntamiento' => 'required',
            'cargo' => 'required',
            'sexo' => 'required',
            'fism' => 'required',
            'profesion' => 'required|max:100',
            'profesion_abrev' => 'required',
            'fecha_inicio_funciones' => 'required|date',
            'telefono' => 'required|max:10',
            'nombre' => 'required|max:100',
            'primer_ap' => 'required|max:100',
            'segundo_ap' => 'required|max:100',
            'nivel' => 'required',
            'correo' => 'required|max:100',
            'password' => 'required|max:100'
        ];
    }
}
