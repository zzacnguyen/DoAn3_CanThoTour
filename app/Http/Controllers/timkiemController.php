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
	// Tinh khoang cach dua vao cong thuc 
	// d = sqrt((x2 - x1)^2 + (y2  - y1)^2 )
    public function euclideDistance($latitude, $longitude, $latitude2, $longitude2)
    {
        $euclideDistance = sqrt(($latitude2-$latitude)*($latitude2-$latitude) + ($longitude2 - $longitude)*($longitude2 - $longitude));
    	return $euclideDistance;
   	}


    // trả về danh sách địa điểm sắp xếp tăng dần theo khoảng cách
    public function searchLocationByRadiusAndKeyword($user_latitude, $user_longitude, $radius, $keyword)
    {
        // handing $keyword
        $keyword_handing = str_replace("+", " ", $keyword);
        $list_Location = diadiemModel::where('dd_tendiadiem','like','%'.$keyword_handing.'%')
                                       ->orwhere('dd_gioithieu','like','%'.$keyword_handing.'%')
                                       ->orwhere('dn_diachi','like','%'.$keyword_handing.'%')->get();
        $list_result = array(); 
        foreach ($list_Location as $l) {
            $euclideDistance = $this::euclideDistance($user_latitude,$user_longitude,$l['dd_vido'],$l['dd_kinhdo']);
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
            $euclideDistance = $this::euclideDistance($user_latitude,$user_longitude,$l['dd_vido'],$l['dd_kinhdo']);
            if ($euclideDistance <= $radius) {
                $list_result[$euclideDistance] = array('id' => $l['id'],'dd_tendiadiem' => $l['dd_tendiadiem'],'khoangcach' => $euclideDistance, 'vido' => $l['dd_vido'],'kinhdo' => $l['dd_kinhdo']);
            }
        }
        if(!empty($list_result))
        {
            ksort($list_result); // sap xep mang theo thu tu tang dan theo khoang cach
            foreach ($list_result as $new) {
                $json_list[] = $new;
            }
            if (!empty($list_result)) {
                return json_encode($json_list);
            }
            else
                return json_encode("Không tìm thấy địa điểm phù hợp");
        }
        else
            return json_encode("Không tìm thấy địa điểm phù hợp");
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
                                        a.id,a.dd_tendiadiem,a.dd_gioithieu,a.dn_diachi 
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
                                       ->orwhere('dn_diachi','like','%'.$keyword_handing.'%')->get();
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

// sửa đường dẫn search lại
// tính khoảng cách trước rồi mới select
// tinh khoang cach giua 2 toa do thuc te
// load du lieu mau và test 
//KẾT QUẢ TRẢ VỀ TỌA ĐỘ, ĐỊA CHỈ, KHOẢNG CÁCH 