<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'denominacion','domicilio','lat','lng','tipo'
    ];

    
    public function scopeFilter($query, $name = ''){
	    $query->whereRaw("(denominacion LIKE '%".$name."%' OR domicilio LIKE '%".$name."%')");
    }
}
