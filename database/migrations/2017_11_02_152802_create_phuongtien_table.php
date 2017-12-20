<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuongtienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_phuongtien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pt_tenphuongtien', 255);
            $table->string('pt_loaihinh', 255);
            
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
        Schema::dropIfExists('dlct_phuongtien');
    }
}
