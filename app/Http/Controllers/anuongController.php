<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anuongModel;
use Illuminate\Support\Facades\DB;
class anuongController extends Controller
{
    
    public function index()
    { 
        $an_uong = DB::table('dlct_anuong')
        ->select('dlct_anuong.id','au_ten','dlct_hinhanh.id AS id_hinhanh','dlct_hinhanh.chitiet1')
        ->leftJoin('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_anuong.dv_iddichvu')
        ->paginate(10);
        $encode=json_encode($an_uong);
        return $encode;
    }
    
    public function create()
    {
        //this is function get file create in android
    }

    
    public function store(Request $request)
    {
        $anuong               = new anuongModel();
        $anuong->au_ten       = $request->input('au_ten');
        $anuong->dv_iddichvu  = $request->input('dv_iddichvu');
        $anuong->save();
    }


    public function show($id)
    {
        $an_uong = DB::table('dlct_anuong')
        ->select('dlct_anuong.id','au_ten', 'dlct_diadiem.dd_diachi','dlct_diadiem.dd_sodienthoai',
            'dlct_dichvu.dv_giathapnhat', 'dlct_dichvu.dv_giacaonhat', 'dlct_dichvu.dv_giomocua','dlct_dichvu.dv_giodongcua',
            'dlct_dichvu.dv_gioithieu','dlct_anuong.dv_iddichvu')
        ->join('dlct_dichvu', 'dlct_dichvu.id', '=', 'dlct_anuong.dv_iddichvu')
        ->join('dlct_diadiem', 'dlct_dichvu.dd_iddiadiem', '=', 'dlct_diadiem.id')
        
        ->where('dlct_anuong.id',$id)
        ->get();
        $encode=json_encode($an_uong);
        return $encode;
    }

    
    public function edit($id)
    {
        $an_uong = DB::table('dlct_anuong')
        ->select('id','au_ten', 'au_gioithieu','dv_iddichvu')
        ->where('id',$id)
        ->get();
        $encode=json_encode($an_uong);
        return $encode;
    }

    
    public function update(Request $request, $id)
    {
        $anuong               = anuongModel::findOrFail($id);
        $anuong->au_ten       = $request->input('au_ten');
        $anuong->dv_iddichvu  = $request->input('dv_iddichvu');
        $anuong->save();
    }

    
    public function destroy($id)
    {
        $anuong = anuongModel::findOrFail($id);
        $anuong->delete();
    }
}
