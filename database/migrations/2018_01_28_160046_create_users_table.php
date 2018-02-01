<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 30);
            $table->string('password',255);
            $table->string('user_facebook_id', 30);
            $table->string('user_email_id', 45);
            $table->string('user_avatar', 50);
            $table->string('user_country',30);
            $table->string('user_status',30);
            $table->string('status', 5);
            $table->integer('user_groups_id')->unsigned();
            $table->foreign('user_groups_id')->references('id')->on('vnt_user_groups')->onDelete('cascade');;
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
        Schema::dropIfExists('vnt_users');
    }
}
