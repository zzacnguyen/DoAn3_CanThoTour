<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVntPointUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_point_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('point_now')->unsigned();
            $table->integer('point_exchanged')->unsigned();
            $table->integer('point_total')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('vnt_user')->onDelete('cascade');
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
        Schema::dropIfExists('vnt_point_user');
    }
}
