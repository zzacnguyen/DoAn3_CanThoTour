<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tukhoaModel;
use Illuminate\Support\Facades\DB;
class tukhoaController extends Controller
{

    public function index()
    {
        $tu_khoa = DB::table('dlct_tukhoa')
        ->select('id','tk_tukhoa')
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
        $tu_khoa              = new tukhoa_dichvu_Model;
        $tu_khoa->tk_tukhoa = $request->input('tk_tukhoa');
        $tu_khoa->save();
    }


    public function show($id)
    {
        $tu_khoa = DB::table('dlct_tukhoa')
        ->select('id','tk_tukhoa')
        ->get();
        $encode=json_encode($tu_khoa_dich_vu);
        return $encode;
    }


    public function edit($id)
    {
        $tu_khoa = DB::table('dlct_tukhoa')
        ->select('id','tk_tukhoa')
        ->get();
        $encode=json_encode($tu_khoa_dich_vu);
        return $encode;
    }


    public function update(Request $request, $id)
    {
        $tu_khoa              = tukhoa_dichvu_Model::findOrFail($id);
        $tu_khoa->tk_tukhoa = $request->input('tk_tukhoa');
        $tu_khoa->save();
    }


    public function destroy($id)
    {
        $tu_khoa = tukhoaModel::findOrFail($id);
        $tu_khoa->delete();
    }
}
