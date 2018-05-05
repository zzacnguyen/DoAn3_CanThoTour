<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVntAcceptServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_accept_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('vnt_services')->onDelete('cascade');
            $table->integer('user_moderator_id')->unsigned()->nullable();
            $table->foreign('user_moderator_id')->references('user_id')->on('vnt_moderator_users')->onDelete('cascade');
            $table->integer('user_admin_id')->unsigned()->nullable();
            $table->foreign('user_admin_id')->references('user_id')->on('vnt_admin_user')->onDelete('cascade');
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
        Schema::dropIfExists('vnt_accept_services');
    }
}
