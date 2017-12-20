<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_binhluan', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('bl_binhluan');
            $table->boolean('bl_trangthai');
            $table->integer('dv_iddichvu')->unsigned();
            $table->foreign('dv_iddichvu')->references('id')->on('dlct_dichvu')->onDelete('cascade');
            
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
        Schema::dropIfExists('dlct_binhluan');
    }
}
