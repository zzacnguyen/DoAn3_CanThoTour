<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\danhgiaModel;
use Illuminate\Support\Facades\DB;
class danhgiaController extends Controller
{
    public function index()
    {
        $danh_gia = DB::table('dlct_danhgia')
        ->select('dlct_nguoidung.nd_tendangnhap','dg_diem','dg_noidung', 'dg_tieude')
        ->join('dlct_nguoidung', 'dlct_danhgia.nd_idnguoidung', '=', 'dlct_nguoidung.id')
        ->paginate(10);
        $encode=json_encode($danh_gia);
        return $encode;

    }

    public function create()
    {
      //this is function get file create in android
    }

    public function store(Request $request)
    {
        $danhgia                 = new danhgiaModel;
        $danhgia->dv_iddichvu    = $request->input('dv_iddichvu');
        $danhgia->nd_idnguoidung = $request->input('nd_idnguoidung');
        $danhgia->dg_diem        = $request->input('dg_diem');
        $danhgia->dg_tieude      = $request->input('dg_tieude');
        $danhgia->dg_noidung     = $request->input('dg_noidung');
        $danhgia->save();
    }

    public function show($id_dich_vu)
    {
        $danh_gia = DB::table('dlct_danhgia')
        ->select(DB::raw('AVG( dlct_danhgia.dg_diem ) as rating'))
        ->join('dlct_dichvu', 'dlct_dichvu.id','=', 'dlct_danhgia.dv_iddichvu')
        ->where('dv_iddichvu', $id_dich_vu)
        ->groupBy('dlct_danhgia.id')
        ->get();
        $encode=json_encode($danh_gia);
        return $encode;
    }

    public function edit($id)
    {
        $danh_gia[] = DB::table('dlct_danhgia')
        ->select('id','dv_iddichvu', 'nd_idnguoidung','dg_diem', 'dg_noidung', 'dg_tieude')

        ->where('id', $id)
        ->get();
    
    }

    public function update(Request $request, $id)
    {
        $danhgia                 = danhgiaModel::findOrFail($id);
        $danhgia->dv_iddichvu    = $request->input('dv_iddichvu');
        $danhgia->nd_idnguoidung = $request->input('nd_idnguoidung');
        $danhgia->dg_diem        = $request->input('dg_diem');
        $danhgia->dg_tieude      = $request->input('dg_tieude');
        $danhgia->dg_noidung     = $request->input('dg_noidung');
        $danhgia->save();
    }

    public function destroy($id)
    {
        $danhgia = danhgiaModel::findOrFail($id);
        $danhgia->delete();
    }
}
