<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('media_social_id');
            $table->string('website_name');
            $table->string('author');
            $table->string('url');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email');
            $table->string('telp');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('profession')->nullable();
            $table->string('job_specialization')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('api_key')->nullable();
            $table->string('website_1')->nullable();
            $table->string('website_2')->nullable();
            $table->string('website_3')->nullable();
            $table->string('keywords');
            $table->string('metatext');
            $table->text('about');
            $table->text('introduction');
            $table->string('status');
            $table->foreign('media_social_id')->references('id')->on('info_media_socials')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_configurations');
    }
}
