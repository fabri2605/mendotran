<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{ 
    protected $fillable = [
        'codigo','denominacion','descripcion','imagen', 'tipo'
    ];
    public function getStateAttribute(){
        if($this->attributes['state'] == 0)
            return "Activo";
        else
            return "Inactivo";
    }
    public function scopeFilter($query, $name = '', $inactivos= false){
	    $query->whereRaw("(codigo LIKE '%".$name."%' OR denominacion LIKE '%".$name."%') AND state = ".($inactivos ? 1 : 0)."");
    }
}
