<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryThreadTable extends Migration
{
   
    public function up()
    {
        Schema::create('category_thread', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id');
            $table->foreignId('category_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_thread');
    }
}