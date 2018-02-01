<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_services', function (Blueprint $table) {
            $table->increments('id');
            $table->text('sv_description');
            $table->string('sv_open', 25);
            $table->string('sv_close', 25);
            $table->string('sv_highest_price', 15);
            $table->string('sv_lowest_price', 15);
            $table->string('sv_phone_number', 25);
            $table->string('sv_status', 10);
            
            $table->integer('tourist_places_id')->unsigned();
            $table->foreign('tourist_places_id')->references('id')->on('vnt_tourist_places');
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
        Schema::dropIfExists('vnt_services');
    }
}
