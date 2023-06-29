<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParadaLinea extends Model
{
    public $timestamps = false;
    
   
    public function parada(){
        return $this->belongsTo(Parada::class, 'parada_id')->with('lineas');
    }
    public function linea(){
        return $this->belongsTo(Linea::class, 'linea_id');
    }
}
