<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $fillable = [
        'rut_apoderadop', 'rut_alumno', 
        'notapresentacion', 'notaexamen', 'notaporcsocial',
        'archnota', 'archsocial', 'archinfoperso',
        'curso',
        'archnota_ruta', 'archsocial_ruta', 'archinfoperso_ruta'
    ];

    public function nombreCurso(){
        return $this->hasOne(Curso::class,'curso','descripcion');
        //return $this->hasOne(Curso::class,'curso','curso');
    }
}
