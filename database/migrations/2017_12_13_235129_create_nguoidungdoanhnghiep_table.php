<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungdoanhnghiepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_nguoidungdoanhnghiep', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dn_website',255);
            $table->string('dn_tendoanhnghiep',255);
            $table->string('dn_diachi',255);
            $table->string('dn_email',255);
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
        Schema::dropIfExists('dlct_nguoidungdoanhnghiep');
    }
}
