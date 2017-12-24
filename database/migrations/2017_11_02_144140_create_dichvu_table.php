<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_dichvu', function (Blueprint $table) {
            $table->increments('id');
            $table->text('dv_gioithieu');
            $table->string('dv_giomocua', 10); 
            $table->string('dv_giodongcua', 10); 
            $table->integer('dv_giacaonhat'); 
            $table->integer('dv_giathapnhat'); 
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
        Schema::dropIfExists('dlct_dichvu');
    }
}
