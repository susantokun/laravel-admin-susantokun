<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_portfolio_id');
            $table->string('title');
            $table->string('slug_title');
            $table->text('description');
            $table->string('url_demo')->nullable();
            $table->string('url_youtube')->nullable();
            $table->string('number_sp');
            $table->string('number_sstp');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->string('status');
            $table->foreign('category_portfolio_id')->references('id')->on('info_category_portfolios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('info_portfolios');
    }
}
