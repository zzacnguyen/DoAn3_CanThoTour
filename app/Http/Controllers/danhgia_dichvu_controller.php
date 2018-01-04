<?php

namespace App\Http\Controllers;
use App\danhgiaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class danhgia_dichvu_controller extends Controller
{
    public function danhgia($id_dich_vu)
    {
        $danh_gia = DB::table('dlct_danhgia')
        ->select('dlct_nguoidung.nd_tendangnhap','dg_diem','dg_noidung', 'dg_tieude', 
            DB::raw('DATE_FORMAT(dlct_danhgia.created_at,"%d-%m-%Y") as ngaydanhgia'))
        ->join('dlct_nguoidung', 'dlct_danhgia.nd_idnguoidung', '=', 'dlct_nguoidung.id')
        ->where('dlct_danhgia.dv_iddichvu', $id_dich_vu)
        ->paginate(10);
        $encode=json_encode($danh_gia);
        return $encode;
    }
    
}
