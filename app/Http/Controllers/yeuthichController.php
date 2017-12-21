<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yeuthichModel;
use Illuminate\Support\Facades\DB;
class yeuthichController extends Controller
{

    public function index()
    {
        $yeu_thich = DB::table('dlct_yeuthich')
        ->select('dlct_yeuthich.id','dd_iddiadiem', 'dlct_yeuthich.nd_idnguoidung', 'dd_tendiadiem')
        ->join('dlct_diadiem', 'dlct_diadiem.id', '=', 'dlct_yeuthich.dd_iddiadiem')
        ->get();
        $encode=json_encode($yeu_thich);
        return $encode;
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $yeu_thich                      = new yeuthichModel();
        $yeu_thich->dd_iddiadiem       = $request->input('dd_iddiadiem');
        $yeu_thich->nd_idnguoidung     = $request->input('nd_idnguoidung');
        $yeu_thich->save();
    }

    
    public function show($id)
    {
        $yeu_thich = DB::table('dlct_yeuthich')
        ->select('id','dd_iddiadiem', 'nd_idnguoidung')
        ->where('id',$id)
        ->get();
        $encode=json_encode($yeu_thich);
        return $encode;
    }

    
    public function edit($id)
    {
        $yeu_thich = DB::table('dlct_yeuthich')
        ->select('id','dd_iddiadiem', 'nd_idnguoidung')
        ->where('id',$id)
        ->get();
        $encode=json_encode($yeu_thich);
        return $encode;
    }

  
    public function update(Request $request, $id)
    {
        $yeu_thich                      = yeuthichModel::findOrFail($id);
        $yeu_thich->dd_iddiadiem        = $request->input('dd_iddiadiem');
        $yeu_thich->nd_idnguoidung      = $request->input('nd_idnguoidung');

        $yeu_thich->save();
    }

    public function destroy($id)
    {
        $yeu_thich = yeuthichModel::findOrFail($id);
        $yeu_thich->delete();
    }
}
