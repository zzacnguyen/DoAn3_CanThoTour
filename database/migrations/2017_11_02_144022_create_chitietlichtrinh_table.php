<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietlichtrinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_chitietlichtrinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ctlt_gioithieu', 255);
            $table->string('ctlt_ngaygiodukien', 45);

            $table->integer('lt_idlichtrinh')->unsigned();
            $table->foreign('lt_idlichtrinh')->references('id')->on('dlct_lichtrinh')->onDelete('cascade');

            $table->integer('dd_iddiadiem')->unsigned();
            $table->foreign('dd_iddiadiem')->references('id')->on('dlct_diadiem')->onDelete('cascade');   
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
        Schema::dropIfExists('dlct_chitietlichtrinh');
    }
}
