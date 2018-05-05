<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVntTouristPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_tourist_places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pl_name', 100);
            $table->text('pl_details');
            $table->text('pl_content');
            $table->string('pl_address', 255);
            $table->string('pl_phone_number', 25);
            $table->string('pl_latitude', 30);
            $table->string('pl_longitude', 30);
            $table->string('pl_status', 10);
            $table->integer('id_ward')->unsigned();
            $table->foreign('id_ward')->references('id')->on('vnt_ward');
            $table->integer('user_partner_id')->unsigned()->nullable();
            $table->foreign('user_partner_id')->references('user_id')->on('vnt_partner_user')->onDelete('cascade');
            $table->integer('user_tour_guide_id')->unsigned()->nullable();
            $table->foreign('user_tour_guide_id')->references('user_id')->on('vnt_tour_guide')->onDelete('cascade');
            $table->integer('user_enterprise_id')->unsigned()->nullable();
            $table->foreign('user_enterprise_id')->references('user_id')->on('vnt_enterprise_user')->onDelete('cascade');
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
        Schema::dropIfExists('vnt_tourist_places');
    }
}
