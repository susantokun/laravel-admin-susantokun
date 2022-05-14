<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_category_portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('platform_id');
            $table->unsignedBigInteger('framework_id');
            $table->text('description');
            $table->string('status');
            $table->foreign('platform_id')->references('id')->on('info_platforms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('framework_id')->references('id')->on('info_frameworks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('info_category_portfolios');
    }
}
