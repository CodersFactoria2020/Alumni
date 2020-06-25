<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOfferLanguageTable extends Migration
{
    public function up()
    {
        Schema::create('job_offer_language', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_offer_id');
            $table->foreign('job_offer_id')->references('id')->on('job_offers');
            $table->foreignId('language_id');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_offer_language');
    }
}
