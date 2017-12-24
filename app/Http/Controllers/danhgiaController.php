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
        ->select('id','dv_iddichvu', 'nd_idnguoidung','dg_diem')
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
        $danhgia->save();
    }

    public function show($id_dich_vu)
    {
        $danh_gia = DB::table('dlct_danhgia')
        ->select('dlct_danhgia.id', DB::raw('AVG( dlct_danhgia.dg_diem )'))
        ->join('dlct_dichvu', 'dlct_dichvu.id','=', 'dlct_danhgia.dv_iddichvu')
        ->where('dv_iddichvu', $id_dich_vu)
        ->get();
        $encode=json_encode($danh_gia);
        return $encode;
    }

    public function edit($id)
    {
        $danh_gia = DB::table('dlct_danhgia')
        ->select('id','dv_iddichvu', 'nd_idnguoidung','dg_diem')
        ->where('id', $id)
        ->get();
        $encode=json_encode($danh_gia);
        return $encode;
    }

    public function update(Request $request, $id)
    {
        $danhgia                 = danhgiaModel::findOrFail($id);
        $danhgia->dv_iddichvu    = $request->input('dv_iddichvu');
        $danhgia->nd_idnguoidung = $request->input('nd_idnguoidung');
        $danhgia->dg_diem        = $request->input('dg_diem');
        $danhgia->save();
    }

    public function destroy($id)
    {
        $danhgia = danhgiaModel::findOrFail($id);
        $danhgia->delete();
    }
}
