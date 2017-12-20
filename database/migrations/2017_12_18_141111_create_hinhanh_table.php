<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_hinhanh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hinhanh', 255);
            $table->integer('dv_iddichvu')->unsigned();
            $table->foreign('dv_iddichvu')->references('id')->on('dlct_dichvu')->onDelete('cascade');
            
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
        Schema::dropIfExists('dlct_hinhanh');
    }
}
