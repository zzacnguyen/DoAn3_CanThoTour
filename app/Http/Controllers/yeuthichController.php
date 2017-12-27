<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yeuthichModel;
use Illuminate\Support\Facades\DB;
class yeuthichController extends Controller
{

    public function index()
    {
        $yeu_thich = DB::table('dlct_yeuthich')
        ->select('dlct_yeuthich.id', 'dlct_yeuthich.nd_idnguoidung', 'dlct_hinhanh.id AS id_hinhanh','dlct_hinhanh.chitiet1')
        ->leftJoin('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_khachsan', 'dlct_khachsan.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_anuong', 'dlct_anuong.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_vuichoi', 'dlct_vuichoi.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_thamquan', 'dlct_thamquan.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_phuongtien', 'dlct_phuongtien.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->join('dlct_dichvu', 'dlct_dichvu.id', '=', 'dlct_yeuthich.dv_iddichvu')
        ->paginate (10);
        $encode=json_encode($yeu_thich);
        return $encode;
    }

    
    public function create()
    {
         
    }

    
    public function store(Request $request)
    {
        $yeu_thich                      = new yeuthichModel();
        $yeu_thich->dv_iddichvu       = $request->input('dv_iddichvu');
        $yeu_thich->nd_idnguoidung     = $request->input('nd_idnguoidung');
        $yeu_thich->save();
    }

    
    public function show($id_nguoi_dung)
    {
        $yeu_thich = DB::table('dlct_yeuthich')
        ->select('dlct_yeuthich.dv_iddichvu as id', 'ks_tenkhachsan','vc_tendiemvuichoi', 'pt_tenphuongtien', 'tq_tendiemthamquan', 'au_ten', 'dlct_hinhanh.id AS id_hinhanh', 'dlct_hinhanh.chitiet1')
        ->leftJoin('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_khachsan', 'dlct_khachsan.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_anuong', 'dlct_anuong.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_vuichoi', 'dlct_vuichoi.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_thamquan', 'dlct_thamquan.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->leftJoin('dlct_phuongtien', 'dlct_phuongtien.dv_iddichvu', '=', 'dlct_yeuthich.dv_iddichvu')
        ->join('dlct_dichvu', 'dlct_dichvu.id', '=', 'dlct_yeuthich.dv_iddichvu')
        ->where('dlct_yeuthich.nd_idnguoidung',$id_nguoi_dung)
        ->paginate (10);
        $encode=json_encode($yeu_thich);
        return $encode;
    }

    
    public function edit($id)
    {
        $yeu_thich = DB::table('dlct_yeuthich')
        ->select('id','dv_iddichvu', 'nd_idnguoidung')
        ->where('id',$id)
        ->get();
        $encode=json_encode($yeu_thich);
        return $encode;
    }

  
    public function update(Request $request, $id)
    {
        $yeu_thich                      = yeuthichModel::findOrFail($id);
        $yeu_thich->dd_iddiadiem        = $request->input('dv_iddichvu');
        $yeu_thich->nd_idnguoidung      = $request->input('nd_idnguoidung');

        $yeu_thich->save();
    }

    public function destroy($id)
    {
        $yeu_thich = yeuthichModel::findOrFail($id);
        $yeu_thich->delete();
    }
}
