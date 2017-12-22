<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vuichoiModel;
use Illuminate\Support\Facades\DB;
class vuichoiController extends Controller
{
 
    public function index()
    {
        $vui_choi = DB::table('dlct_vuichoi')
        ->select('dlct_vuichoi.id AS id_vuichoi','vc_tendiemvuichoi','dlct_hinhanh.id AS id_hinhanh','dlct_hinhanh.chitiet1' ,'vc_gioithieu', 'dlct_vuichoi.dv_iddichvu AS id_dichvu')
        ->join('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_vuichoi.dv_iddichvu')
        ->paginate(10);
        $encode=json_encode($vui_choi);
        return $encode;
    }
 
    public function create()
    {
        //this is function get file create in android
    }
 
    public function store(Request $request)
    {
        $vuichoi                    = new vuichoiModel();  
        $vuichoi->vc_tendiemvuichoi = $request->input('vc_tendiemvuichoi');
        $vuichoi->vc_gioithieu      = $request->input('vc_gioithieu');
        $vuichoi->dv_iddichvu       = $request->input('dv_iddichvu');
        $vuichoi->save();
    }
 
    public function show($id)
    {
        $vui_choi = DB::table('dlct_vuichoi')
        ->select('id','vc_tendiemvuichoi', 'vc_gioithieu', 'dv_iddichvu')->where('id', $id)

        
        ->get();
        $encode=json_encode($vui_choi);
        return $encode;
    }
 
    public function edit($id)
    {
        $vui_choi = DB::table('dlct_vuichoi')
        ->select('id','vc_tendiemvuichoi', 'vc_gioithieu', 'dv_iddichvu')->where('id', $id)
        ->get();
        $encode=json_encode($vui_choi);
        return $encode;
    }
 
    public function update(Request $request, $id)
    {
        $vuichoi                    = vuichoiModel::findOrFail($id);
        $vuichoi->vc_tendiemvuichoi = $request->input('vc_tendiemvuichoi');
        $vuichoi->vc_gioithieu      = $request->input('vc_gioithieu');
        $vuichoi->dv_iddichvu       = $request->input('dv_iddichvu');
        $vuichoi->save();
    }
 
    public function destroy($id)
    {
        $vuichoi=vuichoiModel::findOrFail($id);
        $vuichoi->delete();
    }
}
