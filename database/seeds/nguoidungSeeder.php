<?php

use Illuminate\Database\Seeder;
use App\nguoidungModel;
class nguoidungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlct_nguoidung')->insert([
            'nd_tendoanhnghiep' => str_random(10),
            'nd_tendangnhap' => str_random(10),
            'nd_email' => str_random(10).'@gmail.com',
            'nd_sodienthoai' =>1234567789,
            'nd_matkhau' => bcrypt('123'),
            'nd_diachi' => str_random(10),
            'nd_quocgia' => str_random(10),
            'nd_ngonngu' => str_random(10),
            'nd_ghichu' => str_random(10),
            'nd_loainguoidung' => 1,
            'nd_website' => str_random(10),            
        ]);
    }
}
