<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LineaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $id = $this->route()->parameter('linea');
        return [
            'codigo' => "required|unique:lineas,codigo,$id",
            'denominacion' => "required|unique:lineas,denominacion,$id",
        ];
    }
}
