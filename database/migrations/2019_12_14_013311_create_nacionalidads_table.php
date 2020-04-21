<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNacionalidadsTable extends Migration
{
    public function up()
    {
        Schema::create('nacionalidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nacionalidad')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nacionalidads');
    }
}
