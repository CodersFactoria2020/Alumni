<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('forum_category_id');
            $table->integer('views')->default(0);
            $table->integer('replies');
            $table->string('title');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}