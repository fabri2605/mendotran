<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserPassword implements Rule
{
    private $confirmacion;
   
    public function __construct($confirmacion)
    {
        $this->confirmacion = $confirmacion;
    }
    public function passes($attribute, $value)
    {
        if($this->confirmacion != $value)
            return false;
        else
            return true;
    }

    public function message()
    {
        return 'La contraseña asignada y la confirmación no coinciden ';
    }
}
