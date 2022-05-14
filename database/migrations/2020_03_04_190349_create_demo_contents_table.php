<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_content_id');
            $table->string('title');
            $table->string('slug_title');
            $table->text('description');
            $table->string('url_github');
            $table->string('url_youtube');
            $table->string('url_ld');
            $table->string('url_sc');
            $table->string('url_db');
            $table->string('status');
            $table->foreign('category_content_id')->references('id')->on('demo_category_contents')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('demo_contents');
    }
}
