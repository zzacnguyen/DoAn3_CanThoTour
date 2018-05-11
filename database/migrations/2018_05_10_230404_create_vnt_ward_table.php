<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVntWardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_ward', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ward_name', 50);
            $table->string('latitude', 50);
            $table->string('longtitude', 50);
            $table->tinyInteger('enable');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('vnt_district')->onDelete('cascade');
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
        Schema::dropIfExists('vnt_ward');
    }
}
