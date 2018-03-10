<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_usersearch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('vnt_users');
            $table->integer('id_service')->unsigned();
            $table->foreign('id_service')->references('id')->on('vnt_services');
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
        Schema::dropIfExists('vnt_usersearch');
    }
}
