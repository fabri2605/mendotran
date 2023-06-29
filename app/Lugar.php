<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $fillable = [
        'denominacion','descripcion','lat','lng','tipo',
        'location','depto','subtipo','codigo',
        'cp','nivel','barrio'
    ];
    public function scopeFilter($query, $name = '', $inactivos= false){
	    $query->whereRaw("(denominacion LIKE '%".$name."%' OR tipo LIKE '%".$name."%' OR codigo LIKE '%".$name."%' OR depto LIKE '%".$name."%') AND state = ".($inactivos ? 1 : 0)."");
    }
    public function lineas(){
        return $this->hasMany(LugarLinea::class, 'lugar_id')
                    ->select('id', 'lugar_id', 'linea_id', 'denominacion', 'color');
                    
    }
    public function complete(){
        return $this->hasMany(LugarLinea::class, 'lugar_id')
                    ->select('id', 'lugar_id', 'linea_id', 'denominacion', 'color')->with('line');
                    
    }
    public function paradas(){
        return $this->hasMany(LugarParada::class, 'lugar_id');
    }
}
