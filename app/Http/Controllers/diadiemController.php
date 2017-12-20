<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\diadiemModel;
use Illuminate\Support\Facades\DB;

class diadiemController extends Controller
{

    public function index()
    {
        $dia_diem = DB::table('dlct_diadiem')
        ->select('id','dd_tendiadiem', 'dd_gioithieu','dn_diachi','dd_sodienthoai', 'dd_kinhdo',
                'dd_vido', 'nd_idnguoidung')
        ->paginate(10);
        //;
        $encode = json_encode($dia_diem);
        return $encode;
    }

    public function create()
    {
        //this is function get file create in android
    }

    public function store(Request $request)
    {
        $diadiem                 = new diadiemModel;
        $diadiem->dd_tendiadiem  = $request->input('dd_tendiadiem');
        $diadiem->dd_gioithieu   = $request->input('dd_gioithieu');
        $diadiem->dn_diachi      = $request->input('dn_diachi');
        $diadiem->dd_sodienthoai = $request->input('dd_sodienthoai');
        $diadiem->dd_kinhdo      = $request->input('dd_kinhdo');
        $diadiem->dd_vido        = $request->input('dd_vido');
        $diadiem->nd_idnguoidung = $request->input('nd_idnguoidung');
        $diadiem->save();
    }

    public function show($id)
    {


        $dia_diem = DB::table('dlct_diadiem')
        ->select('id','dd_tendiadiem', 'dd_gioithieu','dn_diachi','dd_sodienthoai', 'dd_kinhdo',
                'dd_vido', 'nd_idnguoidung')
        ->where('id', $id)
        ->get();
        $encode = json_encode($dia_diem);
        return $encode;
    }

    public function edit($id)
    {
        $dia_diem = DB::table('dlct_diadiem')
        ->select('id','dd_tendiadiem', 'dd_gioithieu','dn_diachi','dd_sodienthoai', 'dd_kinhdo',
                'dd_vido', 'nd_idnguoidung')
        ->where('id', $id)
        ->get();
        $encode = json_encode($dia_diem);
        return $encode;
    }
  
    public function update(Request $request, $id)
    {
        $diadiem                 = diadiemModel::findOrFail($id);
        $diadiem->dd_tendiadiem  = $request->input('dd_tendiadiem');
        $diadiem->dd_gioithieu   = $request->input('dd_gioithieu');
        $diadiem->dn_diachi      = $request->input('dn_diachi');
        $diadiem->dd_sodienthoai = $request->input('dd_sodienthoai');
        $diadiem->dd_kinhdo      = $request->input('dd_kinhdo');
        $diadiem->dd_vido        = $request->input('dd_vido');
        $diadiem->nd_idnguoidung = $request->input('nd_idnguoidung');        
        $diadiem->save();
    }

    public function destroy($id)
    {
        $diadiem = diadiemModel::findOrFail($id);
        $diadiem->delete();
    }
}
