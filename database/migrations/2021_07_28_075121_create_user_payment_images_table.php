<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payment_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_payment_id')->unsigned();
            $table->string('images_file_name')->nullable();
            $table->integer('images_file_size')->nullable();
            $table->string('images_content_type')->nullable();
            $table->timestamp('images_updated_at')->nullable();
            $table->foreign('user_payment_id')->references('id')->on('user_payments')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('user_payment_images');
    }
}