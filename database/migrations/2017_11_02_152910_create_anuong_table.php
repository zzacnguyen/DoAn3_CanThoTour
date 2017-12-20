<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_anuong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('au_ten', 255);
            $table->text('au_gioithieu');
            
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
        Schema::dropIfExists('dlct_anuong');
    }
}
