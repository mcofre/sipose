<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApoderadosTable extends Migration
{
    public function up()
    {
        Schema::create('apoderados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('apoderado_user');
            $table->unsignedBigInteger('rut_apoderado')->unique()->nullable();
            $table->String('nombre')->nullable();
            $table->String('apellidop')->nullable();
            $table->String('apellidom')->nullable();
            $table->String('direccion')->nullable();
            $table->unsignedBigInteger('nacionalidad_id')->nullable();
            //$table->String('correo',30);
            $table->integer('telefono')->nullable();
            $table->timestamps();
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
            $table->foreign('apoderado_user')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('apoderados');
    }
}