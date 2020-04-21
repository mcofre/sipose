<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectosTable extends Migration
{
    public function up()
    {
        Schema::create('prospectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nombre',50);
            $table->String('apellidop',50);
            $table->String('apellidom',50);
            $table->unsignedBigInteger('rut_alumno')->unique();
            $table->String('direccion');
            $table->char('sexo',1);
            $table->date('fechanac');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->timestamps();
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
        });

    }

    public function down()
    {
        Schema::dropIfExists('prospectos');
    }
}
