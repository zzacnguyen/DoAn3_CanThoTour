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
        // if ($unit == "K") //trả về kilomet 
        //     return ($miles * 1.609344);
        // else if ($unit == "N") //trả về khoảng cách tính theo hải lý 
        //     return ($miles * 0.8684);
        // else
        //     return $miles;
    }


    // trả về danh sách địa điểm sắp xếp tăng dần theo khoảng cách
    public function searchLocationByRadiusAndKeyword($user_latitude, $user_longitude, $radius, $keyword)
    {
        // handing $keyword
        $keyword_handing = str_replace("+", " ", $keyword);
        $list_Location = diadiemModel::where('dd_tendiadiem','like','%'.$keyword_handing.'%')
                                       ->orwhere('dd_gioithieu','like','%'.$keyword_handing.'%')
                                       ->orwhere('dd_diachi','like','%'.$keyword_handing.'%')->get();
        $list_result = array(); 
        foreach ($list_Location as $l) {
            $euclideDistance = $this::distance($user_latitude,$user_longitude,$l['dd_vido'],$l['dd_kinhdo']);
            if ($euclideDistance <= $radius && $euclideDistance >0) {
                $list_result[$euclideDistance] = array('id' => $l['id'],'dd_tendiadiem' => $l['dd_tendiadiem'],'khoangcach' => $euclideDistance, 'vido' => $l['dd_vido'],'kinhdo' => $l['dd_kinhdo']);
            }
        }

        ksort($list_result); // sap xep mang theo thu tu tang dan theo khoang cach
        // $json_list = array();
        foreach ($list_result as $new) {
            $json_list[] = $new;
        }
        if (!empty($list_result)) {
            return json_encode($json_list);
            // echo '<pre>';
            // print_r($json_list);
            // echo '</pre>';
        }
        else
            return json_encode("Không tìm thấy địa điểm phù hợp");
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

        if(!empty($list_result))
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
                                    ->select('dlct_dichvu.id','dlct_khachsan.ks_tenkhachsan','dlct_khachsan.ks_website','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
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
                if (count($mang_khoangcach) > 1) 
                {
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
                }
                else
                {
                    $id_diadiem_gannhat = array_values($mang_khoangcach)[0];
                    $dich_vu_search = $this::get_dichvu($id_diadiem_gannhat);
                    return json_encode($dich_vu_search);
                }  
            }
            else
                return json_encode("Không có tìm thấy địa điểm lân cận");
        }
        else
            return json_encode("Định dạng không đúng");
            
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

    // tìm kiếm dưa theo loại và từ khoá
    public function search_type_keyword($type, $keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        switch ($type) 
        {
            case 'diadiem':
                $result = DB::select("SELECT * FROM dlct_diadiem as d 
                                        INNER JOIN dlct_dichvu as dv ON d.id = dv.dd_iddiadiem 
                                        WHERE d.dd_tendiadiem LIKE '%$keyword_handing%'
                                    ");
                return  json_encode($result);
                break;
            case 'dichvu':
                $result = DB::select("SELECT dv.id,dv.dv_gioithieu,dv.dv_giomocua,dv.dv_giodongcua,dv.dv_giacaonhat,dv.dv_giacaonhat,
                                        a.id,a.dd_tendiadiem,a.dd_gioithieu,a.dd_diachi 
                                        FROM dlct_dichvu as dv INNER JOIN dlct_diadiem as a ON dv.dd_iddiadiem = a.id 
                                        WHERE dv.dv_gioithieu LIKE '%$keyword_handing%' 
                                    ");
                return  json_encode($result);
                // echo '<pre>';
                // print_r($result);
                // echo '</pre>';
                break;
            case 'khachsan':
                $result = khachsanModel::where('ks_tenkhachsan','like','%'.$keyword_handing.'%')
                                        ->orwhere('ks_gioithieu','like','%'.$keyword_handing.'%')->get();
                return json_encode($result);
                break;
        }
    }

    public function search_keyword_location($keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        $list_Location = diadiemModel::where('dd_tendiadiem','like','%'.$keyword_handing.'%')
                                       ->orwhere('dn_diachi','like','%'.$keyword_handing.'%')->get();
        foreach ($list_Location as $list) {
            $new_list[] = array('dd_id' => $list['id'],'dd_tendiadiem' => $list['dd_tendiadiem'],'gioithieu' =>$list['dd_gioithieu'], 'diachi' => $list['dn_diachi']);
        }
        if (empty($new_list)) {
            return json_encode("Không tìm thấy địa điểm phù hợp");
        }
        else
            return json_encode($new_list);
    }

    public function search_case($type, $keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        $new = array();
        switch ($type) {
            case 'anuong':
                $result = DB::select("SELECT dv.id,dv.dv_gioithieu,dv.dv_giomocua,dv.dv_giodongcua,dv.dv_giacaonhat,dv.dv_giathapnhat FROM `dlct_dichvu_tukhoa` AS t INNER JOIN dlct_dichvu as dv ON t.dv_iddichvu = dv.id WHERE t.tk_idtukhoa = 1 AND dv.dv_gioithieu LIKE '%$keyword_handing%'");
                if (!empty($result))
                    return $result;
                else
                    return null;
                break;

            case 'thamquan':
                $result = DB::select("SELECT dv.id,dv.dv_gioithieu,dv.dv_giomocua,dv.dv_giodongcua,dv.dv_giacaonhat,dv.dv_giathapnhat FROM `dlct_dichvu_tukhoa` AS t INNER JOIN dlct_dichvu as dv ON t.dv_iddichvu = dv.id WHERE t.tk_idtukhoa = 2 AND dv.dv_gioithieu LIKE '%$keyword_handing%'");
                if (!empty($result))
                    return $result;
                else
                    return null;
                break;

            case 'khachsan':
                $result = khachsanModel::where('ks_tenkhachsan','like','%'.$keyword_handing.'%')
                                        ->orwhere('ks_gioithieu','like','%'.$keyword_handing.'%')->get();
                if (!empty($result))
                    return $result;
                else
                    return null;
                break;
            
            case 'diadiem':
                $result = diadiemModel::where('dd_tendiadiem','like','%'.$keyword_handing.'%')
                                       ->orwhere('dd_diachi','like','%'.$keyword_handing.'%')->get();
                foreach ($result as $list) {
                    $new_list[] = array('dd_id' => $list['id'],'dd_tendiadiem' => $list['dd_tendiadiem'],'gioithieu' =>$list['dd_gioithieu'], 'diachi' => $list['dn_diachi']);
                }
                if (!empty($new_list)) {
                    return $new_list;
                }
                else
                    return null;
                break;
        }
    }

    public function search_all($keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        // search DiaDiem
        $result_DiaDiem = $this::search_case('diadiem',$keyword);
        $count_DiaDiem = count($result_DiaDiem); // sum dia diem 
        $string_DiaDiem = $count_DiaDiem.'DiaDiem';
        if (!empty($result_DiaDiem))
            $result[$string_DiaDiem] = $result_DiaDiem;
        else
            $result['0DiaDiem'] = null;

        // search AnUong
        $result_AnUong = $this::search_case('anuong',$keyword);
        $count_AnUong = count($result_AnUong);
        $string_AnUong = $count_AnUong.'AnUong';
        if (!empty($result_AnUong))
            $result[$string_AnUong] = $result_AnUong;
        else
            $result['0AnUong'] = null;

        // search ThamQuan
        $result_ThamQuan = $this::search_case('thamquan',$keyword);
        $count_ThamQuan = count($result_AnUong);
        $string_ThamQuan = $count_ThamQuan.'ThamQuan';
        if (!empty($result_ThamQuan))
            $result[$string_ThamQuan] = $result_ThamQuan;
        else
            $result['0ThamQuan'] = null;

        // search KhachSan
        $result_KhachSan = $this::search_case('khachsan',$keyword);
        $count_KhachSan = count($result_AnUong);
        $string_KhachSan = $count_KhachSan.'KhachSan';
        if (!empty($result_KhachSan))
            $result[$string_KhachSan] = $result_KhachSan;
        else
            $result['0KhachSan'] = null;

        // ket qua cuoi cung
        return json_encode($result);

    }

}
