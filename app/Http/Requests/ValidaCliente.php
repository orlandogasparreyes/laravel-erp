<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaCliente extends FormRequest
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
        //Se valida los inputs por su Id del formulario Html 
        return [
            "nombre"=>"required",
            "correo"=>"required",
            "direccion"=>"required",
            "telfijo"=>"numeric",
            "telmovil"=>"numeric",
            "tipoC"=>"required",
            "rfc"=>"required",
            "cpostal"=>"numeric",
            "image"=>"image"
        ];
    }
}
