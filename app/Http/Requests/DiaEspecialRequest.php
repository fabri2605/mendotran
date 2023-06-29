<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaEspecialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route()->parameter('dia_especial');
        return [
            'fecha' =>'required',
            'descripcion' => 'required|string|unique:dia_especials,descripcion,'.$id,
        ];
    }
}
