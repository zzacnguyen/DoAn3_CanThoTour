<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thamquanModel;
use Illuminate\Support\Facades\DB;
class thamquanController extends Controller
{
 
    public function index()
    {
        $tham_quan = DB::table('dlct_thamquan')
        ->select('id','tq_tendiemthamquan', 'tq_gioithieu','dv_iddichvu')
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
        ->select('id','tq_tendiemthamquan', 'tq_gioithieu','dv_iddichvu')
        ->where('id', $id)
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
