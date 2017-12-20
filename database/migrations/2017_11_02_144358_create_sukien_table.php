<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSukienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_sukien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sk_tensukien', 255); 
            $table->date('sk_ngaybatdau', 20); 
            $table->date('sk_ngayketthuc', 20); 
            $table->integer('dd_iddiadiem')->unsigned();
            $table->foreign('dd_iddiadiem')->references('id')->on('dlct_diadiem')->onDelete('cascade');
            
            $table->integer('lhsk_idloaihinhsukien')->unsigned();
            $table->foreign('lhsk_idloaihinhsukien')->references('id')->on('dlct_loaihinhsukien')->onDelete('cascade');
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
        Schema::dropIfExists('dlct_sukien');
    }
}
