<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecorridoRuta extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'lat','lng','linea_id'
    ];
}
