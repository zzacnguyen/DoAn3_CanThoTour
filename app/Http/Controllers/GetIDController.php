<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anuongModel;
use App\binhluanModel;
use App\chitietlichtrinhModel;
use App\lichtrinhModel;
use App\diadiemModel;
use App\dichvuModel;
use App\khachsanModel;
use App\loaihinhsukienModel;
use App\nguoidungModel;
use App\phuongtienModel;
use App\thamquanModel;
use App\tukhoaModel;
use App\vuichoiModel;
use App\yeuthichModel;

use Illuminate\Support\Facades\DB;
class GetIDController extends Controller
{
    public function LayIDDichVu()
    {
        $dich_vu = DB::table('dlct_dichvu')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($dich_vu);
        return $encode;
    }
    public function LayIDiaDiem()
    {
        $dia_diem = DB::table('dlct_diadiem')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($dia_diem);
        return $encode;
    }
    public function LayIDLichTrinh()
    {
        $lich_trinh = DB::table('dlct_lichtrinh')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($lich_trinh);
        return $encode;
    }
    public function LayIDKhachSan()
    {
        $khach_san = DB::table('dlct_khachsan')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($khach_san);
        return $encode;
    }

    public function LayIDBinhLuan()
    {
        $binh_luan = DB::table('dlct_binhluan')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($binh_luan);
        return $encode;
    }
    public function LayIDThamQuan()
    {
        $tham_quan = DB::table('dlct_thamquan')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($tham_quan);
        return $encode;
    }
    public function LayIDYeuThich()
    {
        $yeu_thich = DB::table('dlct_yeuthich')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($yeu_thich);
        return $encode;
    } 

    public function LayIDVuiChoi()
    {
        $vui_choi = DB::table('dlct_yeuthich')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($vui_choi);
        return $encode;
    }

    public function LayIDAnUong()
    {
        $an_uong = DB::table('dlct_anuong')
        ->select('id')->orderBy('id', 'asc')->get();
        $encode=json_encode($an_uong);
        return $encode;
    }
    public function LayIDSuKien()
    {
        $su_kien = DB::table('dlct_sukien')
        ->select('id')
        ->orderBy('id', 'asc')->get();
        $encode=json_encode($su_kien);
        return $encode;
    }
    
}
