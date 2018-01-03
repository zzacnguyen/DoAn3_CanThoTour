<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYeuthichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_yeuthich', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('dclt_yeuthich');
    }
}
