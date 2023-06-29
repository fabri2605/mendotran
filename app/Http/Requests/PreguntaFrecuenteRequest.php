<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreguntaFrecuenteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route()->parameter('faq');
        return [
            'descripcion' =>'required',
            'orden' =>'required',
            'denominacion' => 'required|string|unique:pregunta_frecuentes,denominacion,'.$id,
        ];
    }
}
