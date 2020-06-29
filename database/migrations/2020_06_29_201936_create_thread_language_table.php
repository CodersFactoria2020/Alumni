<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadLanguageTable extends Migration
{
   
    public function up()
    {
        Schema::create('thread_language', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id');
            $table->foreignId('language_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('thread_language');
    }
}
