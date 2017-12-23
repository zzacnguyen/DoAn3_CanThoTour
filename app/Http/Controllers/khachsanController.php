<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khachsanModel;
use Illuminate\Support\Facades\DB;
class khachsanController extends Controller
{
  
    public function index()
    {   
        $khach_san = DB::table('dlct_khachsan')
        ->select('dlct_khachsan.id','ks_tenkhachsan','dlct_hinhanh.id AS id_hinhanh','dlct_hinhanh.chitiet1')
        ->leftJoin('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_khachsan.dv_iddichvu')
        
        ->paginate(10);
        $encode=json_encode($khach_san);
        return $encode;
    }
 
    
    public function create()
    {
        //this is function get file create in android
    }
 
    public function store(Request $request)
    {
        $khachsan                 = new khachsanModel();
        $khachsan->ks_tenkhachsan = $request->input('ks_tenkhachsan');
        $khachsan->ks_website     = $request->input('ks_website');
        $khachsan->ks_gioithieu   = $request->input('ks_gioithieu');
        $khachsan->dv_iddichvu    = $request->input('dv_iddichvu'); 
        $khachsan->save();
    }
 
    public function show($id)
    {
        $khach_san = DB::table('dlct_khachsan')
        ->select('dlct_khachsan.id','ks_tenkhachsan','ks_website', 'dlct_diadiem.dd_diachi','dlct_diadiem.dd_sodienthoai',
            'dlct_dichvu.dv_giathapnhat', 'dlct_dichvu.dv_giacaonhat', 'dlct_dichvu.dv_giomocua','dlct_dichvu.dv_giodongcua',
            'dlct_dichvu.dv_gioithieu','dlct_khachsan.dv_iddichvu')
        ->join('dlct_dichvu', 'dlct_dichvu.id', '=', 'dlct_khachsan.dv_iddichvu')
        ->join('dlct_diadiem', 'dlct_dichvu.dd_iddiadiem', '=', 'dlct_diadiem.id')
        
        ->where('dlct_khachsan.id', $id)
        ->get();
        $encode=json_encode($khach_san);
        return $encode;
    }
 
    public function edit($id)
    {
        $khach_san = DB::table('dlct_khachsan')
        ->select('id','ks_tenkhachsan', 'ks_website','ks_gioithieu','dv_iddichvu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($khach_san);
        return $encode;
    }
 
    public function update(Request $request, $id)
    {
        $khachsan                 = khachsanModel::findOrFail($id);
        $khachsan->ks_tenkhachsan = $request->input('ks_tenkhachsan');
        $khachsan->ks_website     = $request->input('ks_website');
        $khachsan->ks_gioithieu   = $request->input('ks_gioithieu');
        $khachsan->dv_iddichvu    = $request->input('dv_iddichvu');  
        $khachsan->save();
    
    }

    public function destroy($id)
    {
        $khachsan = khachsanModel::findOrFail($id);
        $khachsan->delete();
    }
}
