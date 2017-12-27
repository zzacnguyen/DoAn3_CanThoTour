<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\binhluanModel;
use Illuminate\Support\Facades\DB;
class binhluanController extends Controller
{
    public function index()
    {
        $binh_luan = DB::table('dlct_binhluan')
        ->select('id','bl_binhluan','dv_iddichvu','nd_idnguoidung')
        ->where('bl_trangthai', 1)
        ->paginate(10);
        $encode=json_encode($binh_luan);
        return $encode;
        
    }

    public function create()
    {
        //this is function get file create in android
    }

    public function store(Request $request)
    {
        $binhluan                 = new binhluanModel;
        $binhluan->bl_binhluan    = $request->input('bl_binhluan');
        $binhluan->bl_trangthai   = 1;
        $binhluan->dv_iddichvu    = $request->input('dv_iddichvu');
        $binhluan->nd_idnguoidung = $request->input('nd_idnguoidung');
        $binhluan->save();
    }

    
    public function show($id_dich_vu)
    {
        $binh_luan = DB::table('dlct_binhluan')
        ->select('dlct_binhluan.id as id_binhluan','bl_binhluan', 'nd_tendangnhap')
        ->join('dlct_dichvu','dlct_dichvu.id','=','dlct_binhluan.dv_iddichvu')
        ->join('dlct_nguoidung','dlct_nguoidung.id','=','dlct_binhluan.nd_idnguoidung')
        ->where('dv_iddichvu', $id_dich_vu)

        ->get();
        $encode=json_encode($binh_luan);
        return $encode;
    }

    
    public function edit($id)
    {
        $binh_luan = DB::table('dlct_binhluan')
        ->select('id','bl_binhluan','dv_iddichvu','nd_idnguoidung')
        ->where('id', $id)
        ->get();
        $encode=json_encode($binh_luan);
        return $encode;
    }

    
    public function update(Request $request, $id)
    {
        $binhluan               = binhluanModel::find($id);
        $binhluan->bl_binhluan  = $request->input('bl_binhluan');
        $binhluan->bl_trangthai = 1;
        $binhluan->dv_iddichvu  = $request->input('dv_iddichvu');
        $binhluan->dv_iddichvu  = $request->input('nd_idnguoidung');
        $binhluan->save();

    
    }

    
    public function destroy($id)
    {
        $binhluan = binhluanModel::findOrFail($id);
        $binhluan->delete();
    }
}
