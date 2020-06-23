<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTagTable extends Migration
{
    public function up()
    {
        Schema::create('project_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreignId('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
}
