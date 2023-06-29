<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route()->parameter('turno');

        return [
            'documento' => 'required',
            'nombre' =>'required',
            'apellido' =>'required',
            'fecha_turno' =>'required',
        ];
    }
}
