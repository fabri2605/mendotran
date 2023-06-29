<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'noticia',
        'bajada',
        'state',
        'url',
        'video',
        'imagen',
        'fecha',
        'user_carga_id',

    ];
    public function scopeFilter($query, $name = '', $inactivos= false){
	    $query->whereRaw("(noticia LIKE '%".$name."%' OR titulo LIKE '%".$name."%') AND state = ".($inactivos ? 1 : 0)."");
    }
}
