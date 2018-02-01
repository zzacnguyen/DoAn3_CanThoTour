<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_enterprise_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eu_name', 30);
            $table->string('eu_website', 50);
            $table->string('eu_address', 255);
            $table->string('eu_email', 30);
            $table->string('eu_status', 10);
            
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
        Schema::dropIfExists('vnt_enterprise_users');
    }
}
