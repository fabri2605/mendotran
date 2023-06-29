<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $id = $this->route()->parameter('noticia');
        return [
            'titulo' => "required|string|max:255",
            'noticia' => "required|string",
            'url' => "required|string",
            'imagen' => "required|string",
        ];
    }
}
