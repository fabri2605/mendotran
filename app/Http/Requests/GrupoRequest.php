<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $id = $this->route()->parameter('grupo');
        return [
            'codigo' => "required|unique:grupos,codigo,$id",
        ];
    }
}
