<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaihinhsukienModel;
use Illuminate\Support\Facades\DB;
class loaihinhsukienController extends Controller
{
 
    public function index()
    {
        $loai_hinh_su_kien = DB::table('dlct_loaihinhsukien')
        ->select('id','lhsk_ten')
        ->paginate(10);
        $encode=json_encode($loai_hinh_su_kien);
        return $encode;
       
        
    }
 
    public function create()
    {
        //this is function get file create in android
    }
 
    public function store(Request $request)
    {
        $loaihinhsukien           = new loaihinhsukienModel();
        $loaihinhsukien->lhsk_ten = $request->input('lhsk_ten');
        $loaihinhsukien->save();
    }
 
    public function show($id)
    {
        $loai_hinh_su_kien = DB::table('dlct_loaihinhsukien')
        ->select('id','lhsk_ten')
        ->where('id', $id)
        ->get();
        $encode=json_encode($loai_hinh_su_kien);
        return $encode;
    }
 
    public function edit($id)
    {
        $loai_hinh_su_kien = DB::table('dlct_loaihinhsukien')
        ->select('id','lhsk_ten')
        ->where('id', $id)
        ->get();
        $encode=json_encode($loai_hinh_su_kien);
        return $encode;
    }
 
    public function update(Request $request, $id)
    {
        $loaihinhsukien           = loaihinhsukienModel::findOrFail($id);
        $loaihinhsukien->lhsk_ten = $request->input('lhsk_ten');
        $loaihinhsukien->save();
    }
 
    public function destroy($id)
    {
        $loaihinhsukien = loaihinhsukienModel::findOrFail($id);
        $loaihinhsukien->delete();
    }
}
