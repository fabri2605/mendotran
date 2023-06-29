<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'denominacion','descripcion','lat','lng','tipo',
        'link', 'imagen_banner'
    ];
    public function scopeFilter($query, $name = '', $inactivos= false){
	    $query->whereRaw("(denominacion LIKE '%".$name."%' OR descripcion LIKE '%".$name."%')");
    }
}
