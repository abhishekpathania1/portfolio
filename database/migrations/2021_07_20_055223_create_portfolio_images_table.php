<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('portfolio_id')->unsigned();
            $table->string('images_file_name')->nullable();
            $table->integer('images_file_size')->nullable();
            $table->string('images_content_type')->nullable();
            $table->timestamp('images_updated_at')->nullable();    
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('portfolio_images');
    }
}