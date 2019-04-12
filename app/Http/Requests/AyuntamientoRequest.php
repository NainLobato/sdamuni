<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AyuntamientoRequest extends FormRequest
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
            'municipio' => 'required',
            'escudo' => 'required|max:50',
            'telefono1' => 'required|max:10',
            'telefono2' => 'required|max:10',
            'correo' => 'required|max:100'
        ];
    }
}
