<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $fillable = [
        'fechainicio', 'fechatermino'
    ];

    protected $table = 'configuracion';

}
