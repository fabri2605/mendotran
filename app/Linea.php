<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{ 
    protected $appends = ['strDenominacion'];

    protected $fillable = [
        'codigo','denominacion','descripcion', 'tipo', 'grupo_id', 'descripcion',
        'horario_verano_habil', 'portada','horario_verano_domingo','horario_verano_sabado',
        'horario_verano_pdf','horario_verano_pdf_s','horario_verano_pdf_d'
    ];
    public function grupo(){
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
    public function recorrido(){
        return $this->hasMany(RecorridoRuta::class, 'linea_id');
    }

    public function paradas(){
        return $this->hasMany(ParadaLinea::class, 'linea_id');
    }

   
    public function getStateAttribute(){
        if($this->attributes['state'] == 0)
            return "Activo";
        else
            return "Inactivo";
    }
    
    public function getStrDenominacionAttribute(){
        return $this->attributes['codigo'].' '.$this->attributes['denominacion'];
    }
    public function scopeFilter($query, $name = '', $inactivos= false){
	    $query->whereRaw("(codigo LIKE '%".$name."%' OR denominacion LIKE '%".$name."%') AND state = ".($inactivos ? 1 : 0)."");
    }
}
