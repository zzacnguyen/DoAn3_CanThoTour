<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tukhoa_dichvu_Model;
use Illuminate\Support\Facades\DB;
class tukhoa_dichvu_Controller extends Controller
{
    public function index()
    {
        $tu_khoa_dich_vu = DB::table('dlct_tukhoa_dichvu')
        ->select('id','tk_idtukhoa', 'dv_iddichvu')
        ->get();
        $encode=json_encode($tu_khoa_dich_vu);
        return $encode;
    }

    public function create()
    {
        //this is function get file create in android
    }

   public function store(Request $request)
    {
        $tukhoa_dichvu              = new tukhoa_dichvu_Model();
        $tukhoa_dichvu->tk_idtukhoa = $request->input('tk_idtukhoa');
        $tukhoa_dichvu->dv_iddichvu = $request->input('dv_iddichvu');
        $tukhoa_dichvu->save();
    }


    public function show($id)
    {
        $tu_khoa_dich_vu = DB::table('dlct_tukhoa_dichvu')
        ->select('id','tk_idtukhoa', 'dv_iddichvu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($tu_khoa_dich_vu);
        return $encode;
    }

    public function edit($id)
    {
        $tu_khoa_dich_vu = DB::table('dlct_tukhoa_dichvu')
        ->select('id','tk_idtukhoa', 'dv_iddichvu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($tu_khoa_dich_vu);
        return $encode;
    }


    public function update(Request $request, $id)
    {
        $tukhoa_dichvu              = tukhoa_dichvu_Model::findOrFail($id);
        $tukhoa_dichvu->tk_idtukhoa = $request->input('tk_idtukhoa');
        $tukhoa_dichvu->dv_iddichvu = $request->input('dv_iddichvu');
        $tukhoa_dichvu->save();
    }


    public function destroy($id)
    {
        $tukhoa_dichvu = tukhoa_dichvu_Model::findOrFail($id);
        $tukhoa_dichvu->delete();
    }
}
