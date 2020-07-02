<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePruebasTable extends Migration
{

    public function up()
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 1000);
            $table->foreignId('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('pruebas');
    }
}
