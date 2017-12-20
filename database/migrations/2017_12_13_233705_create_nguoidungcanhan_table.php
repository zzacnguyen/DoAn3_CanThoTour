<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungcanhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_nguoidungcanhan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cn_tennguoidung', '40');
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
        Schema::dropIfExists('dlct_nguoidungcanhan');
    }
}
