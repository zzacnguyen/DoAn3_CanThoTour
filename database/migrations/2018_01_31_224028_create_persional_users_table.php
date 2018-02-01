<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersionalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_persional_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pu_name', 30);
            $table->string('ep_status', 10);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('vnt_users');
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
        Schema::dropIfExists('vnt_persional_users');
    }
}
