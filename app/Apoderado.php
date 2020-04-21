<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $fillable = [
        'rut_apoderado', 'nombre', 'apellidop', 'apellidom', 'direccion', 'nacionalidad_id', 'correo', 'telefono'
    ];

    public function nacionalidad(){
        return $this->hasOne(Nacionalidad::class,'id','nacionalidad_id');
    }
}
