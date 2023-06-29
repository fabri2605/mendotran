<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route()->parameter('user');

        return [
            'name' => 'required|string|max:200',
            'roles' =>'required',
            'email' => 'required|string|max:100|unique:users,email,'.$id,
            
        ];
    }
}
