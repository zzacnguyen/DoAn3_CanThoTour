<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlct_nguoidung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nd_tendangnhap', 30)->unique(); 
            $table->string('nd_matkhau'); 
            $table->string('nd_facebook_id');
            $table->string('nd_email_id');
            $table->string('nd_avatar');
            $table->string('nd_quocgia',255);
            $table->string('nd_ngonngu',255);
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
        Schema::dropIfExists('dlct_nguoidung');
    }
}
