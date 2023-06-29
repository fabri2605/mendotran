<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'introduccion',
        'link_boleto_municipal',
        'link_boleto_nacional',
        'direccion',
        'horario',
        'telefono',
        'imagen',
        'texto_adicional',
        'restriccion_covid',

    ];
}
