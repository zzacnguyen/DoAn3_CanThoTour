<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phuongtienModel;
use Illuminate\Support\Facades\DB;
class phuongtienController extends Controller
{
 
    public function index()
    {
        $phuong_tien = DB::table('dlct_phuongtien')
        ->select('id','pt_tenphuongtien','dlct_hinhanh.id AS id_hinhanh','dlct_hinhanh.chitiet1', 'pt_loaihinh','dlct_phuongtien.dv_iddichvu')
        ->leftJoin('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_phuongtien.dv_iddichvu')
        
        ->paginate(10);
        $encode=json_encode($phuong_tien);
        return $encode;
    }
 
    public function create()
    {
        //this is function get file create in android
    }
 
    public function store(Request $request)
    {
        $phuongtien                   = new phuongtienModel();
        $phuongtien->pt_tenphuongtien = $request->input('pt_tenphuongtien');
        $phuongtien->pt_loaihinh      = $request->input('pt_loaihinh');
        $phuongtien->dv_iddichvu      = $request->input('dv_iddichvu');
        
        $phuongtien->save();
    }
 
    public function show($id)
    {
        $phuong_tien = DB::table('dlct_phuongtien')
        ->select('id','pt_tenphuongtien', 'pt_loaihinh','dv_iddichvu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($phuong_tien);
        return $encode;
    }
 
    public function edit($id)
    {
        $phuong_tien = DB::table('dlct_phuongtien')
        ->select('id','pt_tenphuongtien', 'pt_loaihinh','dv_iddichvu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($phuong_tien);
        return $encode;
    }
 
    public function update(Request $request, $id)
    {
        $phuongtien                   = phuongtienModel::findOrFail($id);
        $phuongtien->pt_tenphuongtien = $request->input('pt_tenphuongtien');
        $phuongtien->pt_loaihinh      = $request->input('pt_loaihinh');
        $phuongtien->dv_iddichvu      = $request->input('dv_iddichvu');
        $phuongtien->save();
    }
 
    public function destroy($id)
    {
        $phuongtien = phuongtienModel::findOrFail($id);
        $phuongtien->delete();
    }
}
