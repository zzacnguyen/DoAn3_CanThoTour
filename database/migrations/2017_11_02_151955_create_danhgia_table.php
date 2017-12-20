<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_danhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dv_iddichvu')->unsigned();
            $table->integer('nd_idnguoidung')->unsigned();
            $table->integer('dg_diem');

            $table->unique(['dv_iddichvu', 'nd_idnguoidung']);

            $table->foreign('dv_iddichvu')->references('id')->on('dlct_dichvu')
                ->onUpdate('restrict')
                ->onDelete('cascade');
            $table->foreign('nd_idnguoidung')->references('id')->on('dlct_nguoidung')
                ->onUpdate('restrict')
                ->onDelete('cascade');
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
        Schema::dropIfExists('dlct_danhgia');
    }
}
