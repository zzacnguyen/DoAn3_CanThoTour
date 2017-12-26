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
        ->select('dlct_sukien.dv_iddichvu as id', 'dlct_sukien.sk_tensukien', 'dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1', DB::raw('DATE_FORMAT(sk_ngaybatdau, "%d-%m-%Y") as sk_ngaybatdau'),DB::raw('DATE_FORMAT(sk_ngayketthuc, "%d-%m-%Y") as sk_ngayketthuc'))
        ->leftJoin('dlct_hinhanh', 'dlct_hinhanh.dv_iddichvu', '=', 'dlct_sukien.dv_iddichvu')
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

        // $this->validate($request,
        //  [
        //     'sk_ngaybatdau' => 'date_format:"d-m-Y',
        //     'sk_ngayketthuc' => 'date_format:"d-m-Y'
        // ]);
        $sukien                        = new sukienModel();
        $sukien->sk_tensukien          = $request->input('sk_tensukien');
        $sukien->sk_ngaybatdau         = $request->input('sk_ngaybatdau');
        $sukien->sk_ngayketthuc        = $request->input('sk_ngayketthuc');
        $sukien->dv_iddichvu           = $request->input('dv_iddichvu');
        $sukien->lhsk_idloaihinhsukien = $request->input('lhsk_idloaihinhsukien');
        $sukien->save();

    }
 
    public function show($id)
    {
        $su_kien = DB::table('dlct_sukien')
        ->select('id','sk_tensukien', 'sk_ngaybatdau')
        ->where('id', $id)
        ->get();
        $encode=json_encode($su_kien);
        return $encode;
    }
 
    public function edit($id)
    {
        $su_kien = DB::table('dlct_sukien')
        ->select('id','sk_tensukien', 'sk_ngaybatdau','sk_ngayketthuc', 'dv_iddichvu', 'lhsk_idloaihinhsukien')
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
        $sukien->sk_ngaybatdau         = $request->input('sk_ngayketthuc');
        $sukien->dd_iddiadiem          = $request->input('dv_iddichvu');
        $sukien->lhsk_idloaihinhsukien = $request->input('lhsk_idloaihinhsukien');     $sukien->save();
    }
 
    public function destroy($id)
    {
        $sukien=sukienModel::findOrFail($id);
        $sukien->delete();
    }
}
