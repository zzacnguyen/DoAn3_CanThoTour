<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thamquanModel;
use Illuminate\Support\Facades\DB;
class thamquanController extends Controller
{
 
    public function index()
    {
        $url  = 'http://localhost/DoAn3_CanThoTour/public/thumbnails/';
        
        $tham_quan = DB::table('dlct_thamquan')
        ->select('dlct_thamquan.id','tq_tendiemthamquan', 'dlct_hinhanh.id AS id_hinhanh','dlct_hinhanh.chitiet1')
        ->leftJoin('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_thamquan.dv_iddichvu')
        ->paginate(10);
        $encode=json_encode($tham_quan);
        return $encode;
    }

 
    public function create()
    {
        //this is function get file create in android
    }

 
    public function store(Request $request)
    {
        $thamquan                     = new thamquanModel();
        $thamquan->tq_tendiemthamquan = $request->input('tq_tendiemthamquan');
        $thamquan->tq_gioithieu       = $request->input('tq_gioithieu');
        $thamquan->dv_iddichvu        = $request->input('dv_iddichvu');
        $thamquan->save();
    }
 
    public function show($id)
    {
        $tham_quan = DB::table('dlct_thamquan')
        ->select('dlct_thamquan.id','tq_tendiemthamquan', 'dlct_diadiem.dd_diachi','dlct_diadiem.dd_sodienthoai',
            'dlct_dichvu.dv_giathapnhat', 'dlct_dichvu.dv_giacaonhat', 'dlct_dichvu.dv_giomocua','dlct_dichvu.dv_giodongcua',
            'dlct_dichvu.dv_gioithieu')
        ->join('dlct_dichvu', 'dlct_dichvu.id', '=', 'dlct_thamquan.dv_iddichvu')
        ->join('dlct_diadiem', 'dlct_dichvu.dd_iddiadiem', '=', 'dlct_diadiem.id')
        
        ->where('dlct_thamquan.id', $id)
        ->get();
        $encode=json_encode($tham_quan);
        return $encode;
    }
 
    public function edit($id)
    {
        $tham_quan = DB::table('dlct_thamquan')
        ->select('id','tq_tendiemthamquan', 'tq_gioithieu','dv_iddichvu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($tham_quan);
        return $encode;
    }
 
    public function update(Request $request, $id)
    {
        $thamquan                     = thamquanModel::findOrFail($id);
        $thamquan->tq_tendiemthamquan = $request->input('tq_tendiemthamquan');
        $thamquan->tq_gioithieu       = $request->input('tq_gioithieu');
        $thamquan->dv_iddichvu        = $request->input('dv_iddichvu');
        $thamquan->save();
    }

 
    public function destroy($id)
    {
        $thamquan = thamquanModel::findOrFail($id);
        $thamquan->delete();
    }
}
