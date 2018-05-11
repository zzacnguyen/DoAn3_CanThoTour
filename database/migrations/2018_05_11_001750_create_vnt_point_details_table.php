<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVntPointDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_point_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('like_id')->unsigned()->nullable();
            $table->foreign('like_id')->references('id')->on('vnt_likes')->onDelete('cascade');
            $table->integer('share_id')->unsigned()->nullable();
            $table->foreign('share_id')->references('id')->on('vnt_share')->onDelete('cascade');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('vnt_services')->onDelete('cascade');
            $table->integer('rating_id')->unsigned()->nullable();
            $table->foreign('rating_id')->references('id')->on('vnt_visitor_ratings')->onDelete('cascade');
            $table->integer('point_id')->unsigned()->nullable();
            $table->foreign('point_id')->references('id')->on('vnt_point')->onDelete('cascade');
            $table->integer('point_user_id')->unsigned()->nullable();
            $table->foreign('point_user_id')->references('id')->on('vnt_point_user')->onDelete('cascade');
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
        Schema::dropIfExists('vnt_point_details');
    }
}
