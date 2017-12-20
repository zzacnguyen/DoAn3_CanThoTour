<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lichtrinhModel;
use Illuminate\Support\Facades\DB;
class lichtrinhController extends Controller
{
 
    public function index()
    {
        $lich_trinh = DB::table('dlct_lichtrinh')
        ->select('id','lt_ngaylichtrinh', 'lt_tenlichtrinh','lt_gioithieu')
        ->paginate(10);
        $encode=json_encode($khach_san);
        return $encode;
    }
 
    public function create()
    {
        //this is function get file create in android
    }
 
    public function store(Request $request)
    {
        $lichtrinh                   = new lichtrinhModel;
        $lichtrinh->lt_ngaylichtrinh = $request->input('lt_ngaylichtrinh');
        $lichtrinh->lt_tenlichtrinh  = $request->input('lt_tenlichtrinh');
        $lichtrinh->lt_gioithieu     = $request->input('lt_gioithieu');
        $lichtrinh->save();
    }
 
    public function show($id)
    {
             
        $lich_trinh = DB::table('dlct_lichtrinh')
        ->select('id','lt_ngaylichtrinh', 'lt_tenlichtrinh','lt_gioithieu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($lich_trinh);
        return $encode;
    }
 
    public function edit($id)
    {        
        $lich_trinh = DB::table('dlct_lichtrinh')
        ->select('id','lt_ngaylichtrinh', 'lt_tenlichtrinh','lt_gioithieu')
        ->where('id', $id)
        ->get();
        $encode=json_encode($lich_trinh);
        return $encode;
       
    }
 
    public function update(Request $request, $id)
    {
        $lichtrinh                   = lichtrinhModel::findOrFail($id);
        $lichtrinh->lt_ngaylichtrinh = $request->input('lt_gioithieu');
        $lichtrinh->lt_tenlichtrinh  = $request->input('lt_gioithieu');
        $lichtrinh->lt_gioithieu     = $request->input('lt_gioithieu');
        $lichtrinh->save();
        
    }

 
    public function destroy($id)
    {
        $lichtrinh = lichtrinhModel::findOrFail($id);
        $lichtrinh->delete();
    }
}
