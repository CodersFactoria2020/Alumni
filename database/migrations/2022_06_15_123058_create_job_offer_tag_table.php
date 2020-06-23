<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOfferTagTable extends Migration
{
    public function up()
    {
        Schema::create('job_offer_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_offer_id');
            $table->foreign('job_offer_id')->references('id')->on('job_offers');
            $table->foreignId('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_offer_tag');
    }
}
