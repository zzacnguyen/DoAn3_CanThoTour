<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoidungModel;
use Illuminate\Support\Facades\DB;
class nguoidungController extends Controller
{
 
    public function index()
    {
        $nguoi_dung = DB::table('dlct_nguoidung')
        ->select('id','nd_tendoanhnghiep', 'nd_sodienthoai','nd_website','nd_email', 'nd_diachi','nd_quocgia',
                 'nd_ngonngu', 'nd_ghichu', 'nd_loainguoidung')
        ->paginate(10);
        $encode = json_encode($nguoi_dung);
        return $encode;
    }

  
    public function create()
    {
        //this is function get file create in android
    }
 
    public function store(Request $request)
    {
        $nguoidung                    = new nguoidungModel();
        $nguoidung->nd_tendoanhnghiep = $request->input('nd_tendoanhnghiep');
        $nguoidung->nd_tendangnhap    = $request->input('nd_tendangnhap');
        $nguoidung->nd_sodienthoai    = $request->input('nd_sodienthoai');
        $nguoidung->nd_website        = $request->input('nd_website');
        $nguoidung->nd_matkhau        = $request->input('nd_matkhau');
        $nguoidung->nd_email          = $request->input('nd_email');
        $nguoidung->nd_diachi         = $request->input('nd_diachi');
        $nguoidung->nd_ngonngu        = $request->input('nd_ngonngu');
        $nguoidung->nd_quocgia        = $request->input('nd_quocgia');
        $nguoidung->nd_ghichu         = $request->input('nd_ghichu');
        $nguoidung->nd_loainguoidung  = $request->input('nd_loainguoidung');
        $nguoidung->save();
    }
 
    public function show($id)
    {
        nguoidungModel::findOrFail($id);
        $nguoi_dung = DB::table('dlct_nguoidung')
        ->select('nd_tendoanhnghiep', 'nd_sodienthoai','nd_website','nd_email', 'nd_diachi','nd_quocgia',
                 'nd_ngonngu', 'nd_ghichu', 'nd_loainguoidung')
        ->where('id',$id)
        ->get();
        $encode = json_encode($nguoi_dung);
        return $encode;
    }

  
    public function edit($id)
    {
        nguoidungModel::findOrFail($id);
        $nguoi_dung = DB::table('dlct_nguoidung')
        ->select('nd_tendoanhnghiep', 'nd_sodienthoai','nd_website','nd_email', 'nd_diachi','nd_quocgia',
                 'nd_ngonngu', 'nd_ghichu', 'nd_loainguoidung')
        ->where('id',$id)
        ->get();
        $encode = json_encode($nguoi_dung);
        return $encode;
    }
 
    public function update(Request $request, $id)
    {
        $nguoidung                    = nguoidungModel::findOrFail($id);
        $nguoidung->nd_tendoanhnghiep = $request->input('nd_tendoanhnghiep');
        $nguoidung->nd_tendangnhap    = $request->input('nd_tendangnhap');
        $nguoidung->nd_sodienthoai    = $request->input('nd_sodienthoai');
        $nguoidung->nd_website        = $request->input('nd_website');
        $nguoidung->nd_matkhau        = $request->input('nd_matkhau');
        $nguoidung->nd_email          = $request->input('nd_email');
        $nguoidung->nd_diachi         = $request->input('nd_diachi');
        $nguoidung->nd_ngonngu        = $request->input('nd_ngonngu');
        $nguoidung->nd_quocgia        = $request->input('nd_quocgia');
        $nguoidung->nd_ghichu         = $request->input('nd_ghichu');
        $nguoidung->nd_loainguoidung  = $request->input('nd_loainguoidung');
        $nguoidung->save();
    }
 
    public function destroy($id)
    {
        $nguoidung = nguoidungModel::findOrFail($id);
        $nguoidung->delete();
    }
}
