<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\diadiemModel;
use App\dichvuModel;
use App\khachsanModel;
use App\Http\Controllers\lib_Search;
use DB;
class timkiemController extends Controller
{

    function distance($lat1, $lon1, $lat2, $lon2) 
    {
        // có thế thêm tham số $unit vào hàm để tính theo các đơn vị khác 
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        // $unit = strtoupper($unit);

        return ($miles * 1.609344)*1000; //trả về mét
        
    }

    public function search_lancan($user_latitude, $user_longitude,$radius)
    {
        $dia_diem = diadiemModel::all();

        foreach ($dia_diem as $l) {
            $vido = (double)$l['dd_vido'];
            $kinhdo = (double)$l['dd_kinhdo'];
            $euclideDistance = $this::distance($user_latitude,$user_longitude,$vido,$kinhdo);
            if ($euclideDistance <= $radius && $euclideDistance > 0) {
                $list_result[$euclideDistance] = array('id' => $l['id'],'dd_tendiadiem' => $l['dd_tendiadiem'],'khoangcach' => $euclideDistance, 'vido' => $l['dd_vido'],'kinhdo' => $l['dd_kinhdo']);
            }
        }
        if(isset($list_result))
        {
            ksort($list_result); // sap xep mang theo thu tu tang dan theo khoang cach
            $dem = 0;
            foreach ($list_result as $new) 
            {
                if ($dem < 10)
                {
                    $json_list[] = $new;
                    $dem++;
                }
                else
                    break;
            }
            return json_encode($json_list);
        }
        else
            return json_encode("Không tìm thấy địa điểm phù hợp");
    }
    
    public function get_dichvu($id_diadiem, $type, $khoangcach)
    {
        switch ($type) {
            case 1: // ăn uống
                $result = DB::table('dlct_dichvu') // idhinhanh, anhchitiet1
                                    ->leftJoin('dlct_anuong', 'dlct_dichvu.id', '=', 'dlct_anuong.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id', 'dlct_anuong.au_ten','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dd_iddiadiem',$id_diadiem)
                                    ->where('dv_loaihinh',$type)->take(5)->get();
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return $result;
                break;

            case 2: // khách sạn
                $result = DB::table('dlct_dichvu')
                                    ->leftJoin('dlct_khachsan', 'dlct_dichvu.id', '=', 'dlct_khachsan.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_khachsan.ks_tenkhachsan','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dd_iddiadiem',$id_diadiem)
                                    ->where('dv_loaihinh',$type)->take(5)->get();
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return $result;
                break;

            case 3: // phương tiện
                $result = DB::table('dlct_dichvu')
                                    ->leftJoin('dlct_phuongtien','dlct_dichvu.id','=','dlct_phuongtien.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_phuongtien.pt_tenphuongtien','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dd_iddiadiem',$id_diadiem)
                                    ->where('dv_loaihinh',$type)->take(5)->get();
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return $result;
                break;

            case 4: // phương tiện
                $result = DB::table('dlct_dichvu')
                                    ->join('dlct_thamquan','dlct_dichvu.id','=','dlct_thamquan.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_thamquan.tq_tendiemthamquan','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dd_iddiadiem',$id_diadiem)
                                    ->where('dv_loaihinh',$type)->take(5)->get();
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return $result;
                break;

            case 5: // phương tiện
                $result = DB::table('dlct_dichvu')
                                    ->join('dlct_vuichoi','dlct_dichvu.id','=','dlct_vuichoi.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_vuichoi.vc_tendiemvuichoi','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dd_iddiadiem',$id_diadiem)
                                    ->where('dv_loaihinh',$type)->take(5)->get();
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return $result;
                break;
        }
    }
    //tìm dịch vụ lân cận
    public function search_dichvu_lancan($vido,$kinhdo, $loaihinh,int $radius)
    {
        if ($radius >=100) 
        {
            $vd_diadiem = (double)$vido;
            $kd_diadiem = (double)$kinhdo;
            $dia_diem_all = diadiemModel::all();
            foreach ($dia_diem_all as $l) 
            {
                $vido = (double)$l['dd_vido'];
                $kinhdo = (double)$l['dd_kinhdo'];
                $euclideDistance = $this::distance($vd_diadiem,$kd_diadiem,$vido,$kinhdo);
                // $mang_khoangcach[$euclideDistance] = $l['id'];
                if ($euclideDistance <= $radius && $euclideDistance > 0) {  
                    // $mang_khoangcach2[] = array($l['id']=>$euclideDistance); 
                     $mang_khoangcach[$euclideDistance] = $l['id'];
                }
            }
            // echo "<pre>";
            // print_r($mang_khoangcach);
            // echo "</pre>";
            if (!empty($mang_khoangcach)) 
            {
                // if (count($mang_khoangcach) > 1) 
                // {
                    ksort($mang_khoangcach); // sắp xếp mảng theo khoảng cách tăng dần
                    $dem = 0;
                    foreach ($mang_khoangcach as $key => $new_list) 
                    {
                        if ($dem < 3) 
                        {
                            // $id_diadiem_gannhat[] = $new_list;
                            if (!empty($this::get_dichvu($new_list,$loaihinh, $key))) {
                                // $dich_vu_search[] = $this::get_dichvu($new_list,$loaihinh);

                                foreach ($this::get_dichvu($new_list,$loaihinh,$key) as $key1 => $value) {
                                    $dich_vu_vu[] = $value;
                                    $dich_vu_vu[] = array('khoangcach' => $key);
                                }
                            }
                            $dem++;
                        }
                        else
                            break;
                    }
                    if (isset($dich_vu_vu)) {
                        return json_encode($dich_vu_vu);
                    }
                    else
                    {
                        $err[] = array('loi' => "Không tìm thấy dịch vụ phù hợp");
                        return json_encode($err);
                    }
                // }
                // else
                // {
                //     $id_diadiem_gannhat = array_values($mang_khoangcach)[0];
                //     $dich_vu_search = $this::get_dichvu($id_diadiem_gannhat);
                //     return json_encode($dich_vu_search);
                // }  
            }
            else
            {
                $err[] = array('loi' => "Không có tìm thấy địa điểm lân cận");
                return json_encode($err);
            }
        }
        else
        {
            $err[] = array('loi' => "Định dạng không đúng");
            return json_encode($err);
        } 
    }

    public function search_dichvu_lancan2($vido,$kinhdo, $loaihinh,int $radius)
    {
        if ($radius >=100) 
        {
            $vd_diadiem = (double)$vido;
            $kd_diadiem = (double)$kinhdo;
            $dia_diem_all = diadiemModel::all();
            foreach ($dia_diem_all as $l) 
            {
                $vido = (double)$l['dd_vido'];
                $kinhdo = (double)$l['dd_kinhdo'];
                $euclideDistance = $this::distance($vd_diadiem,$kd_diadiem,$vido,$kinhdo);
                // $mang_khoangcach[$euclideDistance] = $l['id'];
                if ($euclideDistance <= $radius && $euclideDistance > 0) {  
                    // $mang_khoangcach2[] = array($l['id']=>$euclideDistance); 
                     $mang_khoangcach[$euclideDistance] = $l['id'];
                }
            }
            // echo "<pre>";
            // print_r($mang_khoangcach);
            // echo "</pre>";
            if (!empty($mang_khoangcach)) 
            {
                // if (count($mang_khoangcach) > 1) 
                // {
                    ksort($mang_khoangcach); // sắp xếp mảng theo khoảng cách tăng dần
                    $dem = 0;
                    $demm = 0;
                    foreach ($mang_khoangcach as $key => $new_list) 
                    {
                        if ($dem < 3) 
                        {
                            // $id_diadiem_gannhat[] = $new_list;
                            if (!empty($this::get_dichvu($new_list,$loaihinh, $key))) {
                                // $dich_vu_search[] = $this::get_dichvu($new_list,$loaihinh);
                                $ketqua = $this::get_dichvu($new_list,$loaihinh,$key);
                                foreach ($ketqua as $value) {
                                    $dich_vu_vu[] = $value;
                                    $dich_vu_vu[] = array('khoangcach' => $key);
                                }
                            }
                            $dem++;
                        }
                        else
                            break;
                    }
                    if (isset($dich_vu_vu)) {
                        $result[] = $dich_vu_vu;
                        return json_encode($result);
                    }
                    else
                    {
                        $result = array('result' => null,'error' => 1,'status' => "ZERO_RESULTS");
                        return json_encode($result);
                    }
                // }
                // else
                // {
                //     $id_diadiem_gannhat = array_values($mang_khoangcach)[0];
                //     $dich_vu_search = $this::get_dichvu($id_diadiem_gannhat);
                //     return json_encode($dich_vu_search);
                // }  
            }
            else
            {
                $result = array('result' => null,'error' => 1,'status' => "ZERO_RESULTS");
                return json_encode($result);
            }
        }
        else
        {
            $result = array('result' => null,'error' => 1,'status' => "ZERO_RESULTS");
                return json_encode($result);
        } 
    }

    public function search_dichvu_all($keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        // $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
        //                         ->select('')->take(30)->paginate(5);
        $result = DB::table('dlct_dichvu') // idhinhanh, anhchitiet1
                                    ->leftJoin('dlct_anuong', 'dlct_dichvu.id', '=', 'dlct_anuong.dv_iddichvu')
                                    ->leftJoin('dlct_khachsan', 'dlct_dichvu.id', '=', 'dlct_khachsan.dv_iddichvu')
                                    ->leftJoin('dlct_phuongtien', 'dlct_dichvu.id', '=', 'dlct_phuongtien.dv_iddichvu')
                                    ->leftJoin('dlct_vuichoi', 'dlct_dichvu.id', '=', 'dlct_vuichoi.dv_iddichvu')
                                    ->leftJoin('dlct_thamquan', 'dlct_dichvu.id', '=', 'dlct_thamquan.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id', 'dlct_anuong.au_ten','dlct_khachsan.ks_tenkhachsan','dlct_thamquan.tq_tendiemthamquan','dlct_phuongtien.pt_tenphuongtien','dlct_vuichoi.vc_tendiemvuichoi','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dv_gioithieu','like',"%$keyword_handing%")->take(30)->paginate(10);
        return json_encode($result);
    }

    public function search_dichvu_type($type,$keyword)
    {
        $keyword_handing = str_replace("+"," ", $keyword);

        switch ($type) {
            case 1: // ăn uống
                $result = DB::table('dlct_dichvu') // idhinhanh, anhchitiet1
                                    ->leftJoin('dlct_anuong', 'dlct_dichvu.id', '=', 'dlct_anuong.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id', 'dlct_anuong.au_ten','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dv_gioithieu','like',"%$keyword_handing%")
                                    ->where('dv_loaihinh',$type)
                                    ->paginate(10);
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return json_encode($result);
                break;

            case 2: // khách sạn
                $result = DB::table('dlct_dichvu')
                                    ->leftJoin('dlct_khachsan', 'dlct_dichvu.id', '=', 'dlct_khachsan.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_khachsan.ks_tenkhachsan','dlct_khachsan.ks_website','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dv_gioithieu','like',"%$keyword_handing%")
                                    ->where('dv_loaihinh',$type)
                                    ->paginate(10);
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return json_encode($result);
                break;

            case 3: // phương tiện
                $result = DB::table('dlct_dichvu')
                                    ->join('dlct_phuongtien','dlct_dichvu.id','=','dlct_phuongtien.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_phuongtien.pt_tenphuongtien','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dv_gioithieu','like',"%$keyword_handing%")
                                    ->where('dv_loaihinh',$type)
                                    ->paginate(10);
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return json_encode($result);
                break;

            case 4: // phương tiện
                $result = DB::table('dlct_dichvu')
                                    ->join('dlct_thamquan','dlct_dichvu.id','=','dlct_thamquan.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_thamquan.tq_tendiemthamquan','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dv_gioithieu','like',"%$keyword_handing%")
                                    ->where('dv_loaihinh',$type)
                                    ->paginate(10);
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return json_encode($result);
                break;

            case 5: // phương tiện
                $result = DB::table('dlct_dichvu')
                                    ->join('dlct_vuichoi','dlct_dichvu.id','=','dlct_vuichoi.dv_iddichvu')
                                    ->leftJoin('dlct_hinhanh','dlct_dichvu.id','=','dlct_hinhanh.dv_iddichvu')
                                    ->select('dlct_dichvu.id','dlct_vuichoi.vc_tendiemvuichoi','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                                    ->where('dv_gioithieu','like',"%$keyword_handing%")
                                    ->where('dv_loaihinh',$type)
                                    ->paginate(10);
                if (empty($result))
                    return json_encode("Không tìm thấy dịch vụ phù hợp");
                else
                    return json_encode($result);
                break;
            default:
                # code...
                break;
        }
    }
    
}
