<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitietlichtrinhModel;
use Illuminate\Support\Facades\DB;
class chitietlichtrinhController extends Controller
{

    public function index()
    {
        $chi_tiet_lich_trinh = DB::table('dlct_chitietlichtrinh')
        ->select('id','ctlt_gioithieu', 'ctlt_ngaygiodukien','lt_idlichtrinh','dd_iddiadiem')
        ->paginate(10);
        $encode=json_encode($chi_tiet_lich_trinh);
        return $encode;
    }

    public function create()
    {
        //this is function get file create in android
    }

    public function store(Request $request)
    {
        
        $ctlt                     = new binhluanModel();
        $ctlt->ctlt_gioithieu     = $request->input('ctlt_gioithieu');
        $ctlt->ctlt_ngaygiodukien = $request->input('ctlt_ngaygiodukien');
        $ctlt->lt_idlichtrinh     = $request->input('lt_idlichtrinh');
        $ctlt->dd_iddiadiem       = $request->input('dd_iddiadiem');
        $ctlt->save();
    
    }

    public function show($id)
    {
        $chi_tiet_lich_trinh = DB::table('dlct_chitietlichtrinh')
        ->select('id','ctlt_gioithieu', 'ctlt_ngaygiodukien','lt_idlichtrinh','dd_iddiadiem')
        ->where('id', $id)
        ->get();
        $encode=json_encode($chi_tiet_lich_trinh);
        return $encode;
    }

    public function edit($id)
    {
        $chi_tiet_lich_trinh = DB::table('dlct_chitietlichtrinh')
        ->select('id','ctlt_gioithieu', 'ctlt_ngaygiodukien','lt_idlichtrinh','dd_iddiadiem')
        ->where('id', $id)
        ->get();
        $encode=json_encode($chi_tiet_lich_trinh);
        return $encode;
    }

    public function update(Request $request, $id)
    {
        $ctlt               = chitietlichtrinhModel::findOrFail($id);
        $ctlt->bl_binhluan  = $request->input('bl_binhluan');
        $ctlt->bl_trangthai = $request->input('bl_trangthai');
        $ctlt->dv_iddichvu  = $request->input('dv_iddichvu');
        $ctlt->save();
    }

    public function destroy($id)
    {
        $ctlichtrinh = chitietlichtrinhModel::findOrFail($id);
        $ctlichtrinh->delete();
    }
}
