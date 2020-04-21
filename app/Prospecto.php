<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $fillable = [
        'nombre', 'apellidop', 'apellidom', 'rut_alumno', 'direccion', 'sexo', 'fechanac', 'nacionalidad_id','apoderado_id'
    ];

    public function nacionalidad(){
        return $this->hasOne(Nacionalidad::class,'id','nacionalidad_id');
    }
}
