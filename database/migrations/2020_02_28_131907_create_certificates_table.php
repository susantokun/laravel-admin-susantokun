<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_certificate_id');
            $table->string('title')->nullable();
            $table->string('slug_title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('activity_level');
            $table->string('slug_activity_level');
            $table->date('date_of_activity');
            $table->string('status');
            $table->foreign('category_certificate_id')->references('id')->on('info_category_certificates')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('info_certificates');
    }
}
