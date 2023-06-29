<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualizacion extends Model
{
    protected $fillable = [
        'grupo_id','descripcion','paradas'
    ];
    public function grupo(){
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
    public function getStateAttribute(){
        if($this->attributes['state'] == 0)
            return "Activo";
        else
            return "Inactivo";
    }
    public function scopeFilter($query, $name = '', $inactivos= false){
	    $query->whereRaw("(descripcion LIKE '%".$name."%') AND state = ".($inactivos ? 1 : 0)."");
    }
}
