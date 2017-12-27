<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dichvuModel;
use Illuminate\Support\Facades\DB;
class dichvuController extends Controller
{

    public function index()
    {
        $dich_vu = DB::table('dlct_dichvu')
        ->select('dlct_dichvu.id','dv_gioithieu', 'dv_giomocua','dv_giodongcua','dv_giathapnhat','dv_giacaonhat',  'dd_iddiadiem', 'dv_loaihinh')
        ->paginate(10);
        $encode=json_encode($dich_vu);
        return $encode;
    }

  

    public function create()
    {
       //this is function get file create in android
    }

    public function store(Request $request)
    {

        $dichvu                 = new dichvuModel;
        $dichvu->dv_gioithieu   = $request->input('dv_gioithieu');
        $dichvu->dv_giomocua    = $request->input('dv_giomocua');
        $dichvu->dv_giodongcua  = $request->input('dv_giodongcua');
        $dichvu->dv_giacaonhat  = $request->input('dv_giacaonhat');
        $dichvu->dv_giathapnhat = $request->input('dv_giathapnhat');
        $dichvu->dd_iddiadiem   = $request->input('dd_iddiadiem');
        $dichvu->dv_trangthai   = 1;
        $dichvu->save();
        
        
       return response($dichvu,201); // hiển thị ra dạng json
    }

    public function show($id)
    {
        $dich_vu = DB::table('dlct_dichvu')
        ->select('dlct_dichvu.id','ks_tenkhachsan','vc_tendiemvuichoi','pt_tenphuongtien', 'tq_tendiemthamquan', 'ks_website',
                 'au_ten','dv_gioithieu', 'dv_giomocua','dv_giodongcua','dv_giathapnhat','dv_giacaonhat', 'dlct_diadiem.dd_sodienthoai',
                 'dlct_diadiem.dd_diachi', 'lhsk_ten', 'dlct_yeuthich.nd_idnguoidung as id_nd_yeuthich_dv', 'dlct_yeuthich.id as id_yeuthich')
        ->leftJoin('dlct_sukien', 'dlct_sukien.dv_iddichvu', '=', 'dlct_dichvu.id')
        ->leftJoin('dlct_loaihinhsukien', 'dlct_loaihinhsukien.id', '=','dlct_sukien.lhsk_idloaihinhsukien')
        ->leftJoin('dlct_khachsan', 'dlct_khachsan.dv_iddichvu', '=', 'dlct_dichvu.id')
        ->leftJoin('dlct_anuong', 'dlct_anuong.dv_iddichvu', '=', 'dlct_dichvu.id')
        ->leftJoin('dlct_vuichoi', 'dlct_vuichoi.dv_iddichvu', '=', 'dlct_dichvu.id')
        ->leftJoin('dlct_thamquan', 'dlct_thamquan.dv_iddichvu', '=', 'dlct_dichvu.id')
        ->leftJoin('dlct_phuongtien', 'dlct_phuongtien.dv_iddichvu', '=', 'dlct_dichvu.id')
        ->leftJoin('dlct_diadiem', 'dlct_diadiem.id', '=', 'dlct_dichvu.dd_iddiadiem')
        ->leftJoin('dlct_yeuthich', 'dlct_yeuthich.dv_iddichvu', '=', 'dlct_dichvu.id')
        
        ->where('dlct_dichvu.id', $id)
        ->get();
        $encode=json_encode($dich_vu);
        return $encode;
    }

    public function edit($id)
    {
        $dich_vu = DB::table('dlct_dichvu')
        ->select('id','dv_gioithieu', 'dv_giomocua','dv_giodongcua','dv_giathapnhat','dv_giacaonhat', 'dv_trangthai', 'dd_iddiadiem')
        ->where('id', $id)
        ->get();
        $encode=json_encode($dich_vu);
        return $encode;
    }

    public function update(Request $request, $id)
    {
        $dichvu                 = dichvuModel::findOrFail($id);
        $dichvu->dv_gioithieu   = $request->input('dv_gioithieu');
        $dichvu->dv_giomocua    = $request->input('dv_giomocua');
        $dichvu->dv_giodongcua  = $request->input('dv_giodongcua');
        $dichvu->dv_giacaonhat  = $request->input('dv_giacaonhat');
        $dichvu->dv_giathapnhat = $request->input('dv_giathapnhat');
        $dichvu->dd_iddiadiem   = $request->input('dd_iddiadiem');
        
        $dichvu->save();
    
    }

    public function destroy($id)
    {
        $dichvu = dichvuModel::findOrFail($id);
        $dichvu->delete();

    }
}
