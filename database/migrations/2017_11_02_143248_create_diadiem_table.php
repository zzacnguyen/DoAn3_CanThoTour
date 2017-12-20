<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiadiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_diadiem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dd_tendiadiem', 100);
            $table->text('dd_gioithieu');
            $table->string('dd_diachi',255);
            $table->string('dd_sodienthoai',20);             
            $table->string('dd_kinhdo',255);
            $table->string('dd_vido',255);
            $table->integer('nd_idnguoidung')->unsigned();
            $table->foreign('nd_idnguoidung')->references('id')->on('dlct_nguoidung')->onDelete('cascade');
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
        Schema::dropIfExists('dlct_diadiem');
    }
}
