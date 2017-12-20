<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\hinhanhModel;



class hinhanhController extends Controller
{
    
    public function LayMotIcon($id_dia_diem)
    {
        $url  = 'http://localhost/doan3/public/images/';
        $string_replace = '","id":';
        $ha_icon = DB::table('dlct_hinhanh') ->select('ha_icon','id')
        ->where('dd_iddiadiem', $id_dia_diem)->get();
        $chuoi_can_cat_icon = $ha_icon;
        $chuoi_da_cat_icon = substr ( $chuoi_can_cat_icon ,13);
        $arr[]= (explode ('","' , $chuoi_da_cat_icon));
        $ten_hinh_anh = ($arr[0][0]);
        $cat_ben_phai= rtrim($chuoi_da_cat_icon, '"}]');
        $ket_qua_hinh_anh =  str_replace($string_replace , '+', $cat_ben_phai);
        $duong_dan_hinh_anh_chua_cat = $url.$ket_qua_hinh_anh.'+'.$ten_hinh_anh;
        return json_encode($duong_dan_hinh_anh_chua_cat, JSON_UNESCAPED_SLASHES);
    }
    public function LayMotThumb1($id_dia_diem)
    {
        $url  = 'http://localhost/doan3/public/images/';
        $string_replace = '","id":';
        $ha_thumb = DB::table('dlct_hinhanh') ->select('ha_thumb1','id')
        ->where('dd_iddiadiem', $id_dia_diem)->get();
        $chuoi_can_cat_thumb = $ha_thumb;
        $chuoi_da_cat_thumb = substr ( $chuoi_can_cat_thumb ,15);
        $arr[]= (explode ('","' , $chuoi_da_cat_thumb));
        $ten_hinh_anh = ($arr[0][0]);
        $cat_ben_phai= rtrim($chuoi_da_cat_thumb, '"}]');
        $ket_qua_hinh_anh =  str_replace($string_replace , '+', $cat_ben_phai);
        $duong_dan_hinh_anh_chua_cat = $url.$ket_qua_hinh_anh.'+'.$ten_hinh_anh;
        return json_encode($duong_dan_hinh_anh_chua_cat, JSON_UNESCAPED_SLASHES);
    }
    public function LayMotThumb2($id_dia_diem)
    {
        $url  = 'http://localhost/doan3/public/images/';
        $string_replace = '","id":';
        $ha_thumb = DB::table('dlct_hinhanh') ->select('ha_thumb2','id')
        ->where('dd_iddiadiem', $id_dia_diem)->get();
        $chuoi_can_cat_thumb = $ha_thumb;
        $chuoi_da_cat_thumb = substr ( $chuoi_can_cat_thumb ,15);
        $arr[]= (explode ('","' , $chuoi_da_cat_thumb));
        $ten_hinh_anh = ($arr[0][0]);
        $cat_ben_phai= rtrim($chuoi_da_cat_thumb, '"}]');
        $ket_qua_hinh_anh =  str_replace($string_replace , '+', $cat_ben_phai);
        $duong_dan_hinh_anh_chua_cat = $url.$ket_qua_hinh_anh.'+'.$ten_hinh_anh;
        return json_encode($duong_dan_hinh_anh_chua_cat, JSON_UNESCAPED_SLASHES);
    }
    public function LayMotHinhChiTiet1($id_dia_diem)
    {
        $url  = 'http://localhost/doan3/public/images/';
        $string_replace = '","id":';
        $ha_chi_tiet = DB::table('dlct_hinhanh') ->select('ha_hinhchitiet1','id')
        ->where('dd_iddiadiem', $id_dia_diem)->get();
        $chuoi_can_cat_chi_tiet = $ha_chi_tiet;
        $chuoi_da_cat_chi_tiet = substr ( $chuoi_can_cat_chi_tiet ,21);
        $arr[]= (explode ('","' , $chuoi_da_cat_chi_tiet));
        $ten_hinh_anh = ($arr[0][0]);
        $cat_ben_phai= rtrim($chuoi_da_cat_chi_tiet, '"}]');
        $ket_qua_hinh_anh =  str_replace($string_replace , '+', $cat_ben_phai);
        $duong_dan_hinh_anh_chua_cat = $url.$ket_qua_hinh_anh.'+'.$ten_hinh_anh;
        return json_encode($duong_dan_hinh_anh_chua_cat, JSON_UNESCAPED_SLASHES);
    }
    public function LayMotHinhChiTiet2($id_dia_diem)
    {
        $url  = 'http://localhost/doan3/public/images/';
        $string_replace = '","id":';
        $ha_chi_tiet = DB::table('dlct_hinhanh') ->select('ha_hinhchitiet2','id')
        ->where('dd_iddiadiem', $id_dia_diem)->get();
        $chuoi_can_cat_chi_tiet = $ha_chi_tiet;
        $chuoi_da_cat_chi_tiet = substr ( $chuoi_can_cat_chi_tiet ,21);
        $arr[]= (explode ('","' , $chuoi_da_cat_chi_tiet));
        $ten_hinh_anh = ($arr[0][0]);
        $cat_ben_phai= rtrim($chuoi_da_cat_chi_tiet, '"}]');
        $ket_qua_hinh_anh =  str_replace($string_replace , '+', $cat_ben_phai);
        $duong_dan_hinh_anh_chua_cat = $url.$ket_qua_hinh_anh.'+'.$ten_hinh_anh;
        return json_encode($duong_dan_hinh_anh_chua_cat, JSON_UNESCAPED_SLASHES);
    }






    public function Upload(Request $request)
    {
        $time = time();

        //upload banner
        $file_banner = $request->file('banner');
        $image_banner = \Image::make($file_banner);
        $path = public_path().'/images/';
        //resize images banner
        $image_banner->resize(1280,720);
        $image_banner->save($path.'banner_'.$time.$file_banner->getClientOriginalName());


        //upload chi tiet 1
        $file_chitiet_1 = $request->file('chitiet1');
        $image_chitiet1 = \Image::make($file_chitiet_1);
        $image_chitiet1->resize(1280,720);
        $image_chitiet1->save($path.'chitiet1_'.$time.$file_chitiet_1->getClientOriginalName());
        
        $image_chitiet1->resize(600,400);
        $image_chitiet1->save($path.'thumb1_'.$time.$file_chitiet_1->getClientOriginalName());
        $image_chitiet1->resize(50,50);
        $image_chitiet1->save($path.'icon_'.$time.$file_chitiet_1->getClientOriginalName());
        

        //upload chi tiet 2
        $file_chitiet_2 = $request->file('chitiet2');
        $image_chitiet2 = \Image::make($file_chitiet_2);
        $image_chitiet2->resize(1280,720);
        $image_chitiet2->save($path.'chitiet2_'.$time.$file_chitiet_2->getClientOriginalName());
        $image_chitiet2->resize(600,400);
        $image_chitiet2->save($path.'thumb2_'.$time.$file_chitiet_2->getClientOriginalName());
        
        


        //create images in model
        $thumbnail = new hinhanhModel();
        $thumbnail->ha_banner = "banner_".$time.$file_banner->getClientOriginalName();
        $thumbnail->ha_thumb1 = "thumb1_".$time.$file_chitiet_1->getClientOriginalName();
        $thumbnail->ha_thumb2 = "thumb2_".$time.$file_chitiet_2->getClientOriginalName();
        $thumbnail->ha_hinhchitiet1 =  "chitiet1_".$time.$file_chitiet_1->getClientOriginalName();
        $thumbnail->ha_hinhchitiet2 =  "chitiet2_".$time.$file_chitiet_2->getClientOriginalName();
        $thumbnail->ha_icon = "icon_".$time.$file_chitiet_1->getClientOriginalName();
        $thumbnail->dd_iddiadiem=$request->input('diadiem');
        $thumbnail->save();


    }

}
