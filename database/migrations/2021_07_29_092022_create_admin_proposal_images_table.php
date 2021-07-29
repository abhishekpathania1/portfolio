<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminProposalImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_proposal_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_proposal_id')->unsigned();
            $table->string('images_file_name')->nullable();
            $table->integer('images_file_size')->nullable();
            $table->string('images_content_type')->nullable();
            $table->timestamp('images_updated_at')->nullable();
            $table->foreign('admin_proposal_id')->references('id')->on('admin_proposals')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('admin_proposal_images');
    }
}