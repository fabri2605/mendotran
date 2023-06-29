<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaTrasbordo extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'linea_id','imagen'
    ];
    public function linea(){
        return $this->belongsTo(Linea::class, 'linea_id')->orderBy('codigo', 'asc');
    }
}
