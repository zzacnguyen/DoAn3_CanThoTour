<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichtrinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_lichtrinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lt_ngaylichtrinh', 10);
            $table->string('lt_tenlichtrinh', 255);
            $table->text('lt_gioithieu');
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
        Schema::dropIfExists('dlct_lichtrinh');
    }
}
