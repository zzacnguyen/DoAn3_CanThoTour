<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sukienModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class sukienController extends Controller
{


    public function index()
    {
        $dt = Carbon::now();
        $nam_hien_tai = $dt->year;
        $thang_hien_tai = $dt->month;
        $ngay_hien_tai = $dt->day;
        $su_kien = DB::table('dlct_sukien')
        ->select('id','sk_tensukien', 'sk_ngaybatdau','sk_ngayketthuc', 'dd_iddiadiem', 'lhsk_idloaihinhsukien')
        ->whereYear('sk_ngayketthuc', '>=', $nam_hien_tai)
        ->whereDay('sk_ngayketthuc', '>=',$ngay_hien_tai)
        ->whereMonth('sk_ngayketthuc', '>=', $thang_hien_tai)
        ->paginate(10);
        $encode=json_encode($su_kien);
        return $encode;
    
    }
 
    public function create()
    {
        //this is function get file create in android
    }
 
    public function store(Request $request)
    {
        $sukien                        = new sukienModel();
        $sukien->sk_tensukien          = $request->input('sk_tensukien');
        $sukien->sk_ngaybatdau         = $request->input('sk_ngaybatdau');
        $sukien->sk_trangthai          = $request->input('sk_trangthai');
        $sukien->dd_iddiadiem          = $request->input('dd_iddiadiem');
        $sukien->lhsk_idloaihinhsukien = $request->input('lhsk_idloaihinhsukien');
        $sukien->save();

    }
 
    public function show($id)
    {
        $su_kien = DB::table('dlct_sukien')
        ->select('id','sk_tensukien', 'sk_ngaybatdau','sk_trangthai', 'dd_iddiadiem', 'lhsk_idloaihinhsukien')
        ->where('id', $id)
        ->get();
        $encode=json_encode($su_kien);
        return $encode;
    }
 
    public function edit($id)
    {
        $su_kien = DB::table('dlct_sukien')
        ->select('id','sk_tensukien', 'sk_ngaybatdau','sk_trangthai', 'dd_iddiadiem', 'lhsk_idloaihinhsukien')
        ->where('id', $id)
        ->get();
        $encode=json_encode($su_kien);
        return $encode;
    }
 
    public function update(Request $request, $id)
    {
        $sukien                        = sukienModel::findOrFail($id);
        $sukien->sk_tensukien          = $request->input('sk_tensukien');
        $sukien->sk_ngaybatdau         = $request->input('sk_ngaybatdau');
        $sukien->sk_trangthai          = $request->input('sk_trangthai');
        $sukien->dd_iddiadiem          = $request->input('dd_iddiadiem');
        $sukien->lhsk_idloaihinhsukien = $request->input('lhsk_idloaihinhsukien');     $sukien->save();
    }
 
    public function destroy($id)
    {
        $sukien=sukienModel::findOrFail($id);
        $sukien->delete();
    }
}
