<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulacionsTable extends Migration
{
    public function up()
    {
        Schema::create('postulacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->unsignedBigInteger('rut_apoderadop');
            $table->unsignedBigInteger('rut_alumno');
            $table->integer('notapresentacion');
            $table->integer('notaexamen');
            $table->integer('notaporcsocial');
            $table->string('archnota');
            $table->string('archnota_ruta');
            $table->string('archsocial');
            $table->string('archsocial_ruta');
            $table->string('archinfoperso');
            $table->string('archinfoperso_ruta');
            $table->string('curso',5);
            $table->timestamps();
            $table->unsignedBigInteger('postulacion_id')->nullable();
            $table->foreign('postulacion_id')->references('id')->on('users');
            //$table->foreign('rut_alumno')->references('rut_alumno')->on('prospectos');
            //$table->foreign('rut_apoderadop')->references('rut_apoderado')->on('apoderados');
        });
    }

    public function down()
    {
        Schema::dropIfExists('postulacions');
    }
}
