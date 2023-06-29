<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoTramiteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route()->parameter('tipo_tramite');

        return [
            'requisitos' => 'required',
            'introduccion' =>'required',
            'descripcion' =>'required',
            'vigencia' =>'required',
            'costo' =>'required',
            'denominacion' => 'required|string|max:100|unique:tipo_tramites,denominacion,'.$id,
            
        ];
    }
}
