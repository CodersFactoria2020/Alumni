<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageThreadTable extends Migration
{
   
    public function up()
    {
        Schema::create('language_thread', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id');
            $table->foreignId('language_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('language_thread');
    }
}