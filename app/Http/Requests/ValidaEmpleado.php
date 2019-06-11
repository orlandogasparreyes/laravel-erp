<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaEmpleado extends FormRequest
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
            "nombre"=>"required",
            "apellidos"=>"required",
            "domicilio"=>"required",
            "curp"=>"required",
            "rfc"=>"required",
            "nss"=>"required",
            "num_cuenta"=>"required",
            "image"=>"image",
            "cargo"=>"required"
        ];
    }
}
