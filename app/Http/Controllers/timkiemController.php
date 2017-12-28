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
        $euclideDistance = sqrt(pow(($latitude2-$latitude),2) + pow(($longitude2 - $longitude),2));
    	return $euclideDistance;
        // return ($latitude - $latitude2)*($latitude - $latitude2);
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
        $dia_diem = dichvuModel::all();

        foreach ($dia_diem as $l) {
            $vido = (double)$l['dd_vido'];
            $kinhdo = (double)$l['dd_kinhdo'];
            $mang[] = $kinhdo*$kinhdo;
            $euclideDistance = $this::euclideDistance($user_latitude,$user_longitude,$vido,$kinhdo);
            if ($euclideDistance <= $radius && $euclideDistance > 0) {
                $list_result[] = array('id' => $l['id'],'dd_tendiadiem' => $l['dd_tendiadiem'],'khoangcach' => $euclideDistance, 'vido' => $l['dd_vido'],'kinhdo' => $l['dd_kinhdo']);
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
    

    //tìm dịch vụ lân cận
    public function search_dichvu_lancan($id_dichvu)
    {
        $dich_vu_1 = DB::table('dlct_dichvu')->where('id',$id_dichvu)->first();
        $id_diadiem = $dich_vu_1->dd_iddiadiem;
        $loai_hinh_dv = $dich_vu_1->dv_loaihinh;
        $dia_diem = DB::table('dlct_diadiem')->where('id',$id_diadiem)->first();
        $vd_diadiem = (double)$dia_diem->dd_vido;
        $kd_diadiem = (double)$dia_diem->dd_kinhdo;
        $dia_diem_all = diadiemModel::all();
        foreach ($dia_diem_all as $l) 
        {
            $vido = (double)$l['dd_vido'];
            $kinhdo = (double)$l['dd_kinhdo'];
            $euclideDistance = $this::euclideDistance($vd_diadiem,$kd_diadiem,$vido,$kinhdo);
            
            if ($euclideDistance <= 500 && $euclideDistance > 0) {  
                // $mang_khoangcach[$l['id']] = $euclideDistance; 
                $mang_khoangcach2[] = array($l['id']=>$euclideDistance); 
            }
        }

        // for ($i=0; $i < 3; $i++) 
        // { 
        //     $minn = min($mang_khoangcach2);
        //     $mang_sapxep[] = $minn;
        //     unset($mang_khoangcach[key($minn)]);
        //     $minn2 = min($mang_khoangcach);
        // }
        // echo '<pre>';
        // print_r($mang_khoangcach);
        // // print_r($minn);
        // // print_r($mang_sapxep);
        // echo '</pre>';

        $minn = min($mang_khoangcach2);
        $id_min_diadiem = key($minn);

        $dich_vu_search = DB::table('dlct_dichvu')
                        ->leftJoin('dlct_anuong', 'dlct_dichvu.id', '=', 'dlct_anuong.dv_iddichvu')
                        ->leftJoin('dlct_khachsan', 'dlct_dichvu.id', '=', 'dlct_khachsan.dv_iddichvu')
                        ->leftJoin('dlct_vuichoi', 'dlct_dichvu.id', '=', 'dlct_vuichoi.dv_iddichvu')
                        ->leftJoin('dlct_phuongtien', 'dlct_dichvu.id', '=', 'dlct_phuongtien.dv_iddichvu')
                        ->leftJoin('dlct_hinhanh', 'dlct_dichvu.id', '=', 'dlct_hinhanh.dv_iddichvu')
                        ->select('dlct_dichvu.id', 'dlct_khachsan.ks_tenkhachsan', 'dlct_anuong.au_ten','dlct_vuichoi.vc_tendiemvuichoi','dlct_phuongtien.pt_tenphuongtien','dlct_hinhanh.id as id_hinhanh','dlct_hinhanh.chitiet1')
                        ->where('dd_iddiadiem',$id_min_diadiem)->paginate(10);
        if (empty($dich_vu_search))
            return json_encode("Không tìm thấy dịch vụ");
        else
            return json_encode($dich_vu_search);
    }


    public function search_dichvu_all($keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")->take(30)->paginate(5);
        return json_encode($result);
    }



    public function search_dichvu_type($keyword, $type)
    {
        $keyword_handing = str_replace("+"," ", $keyword);
        switch ($type) {
            case '1':
                $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
                                        ->where('dv_loaihinh',1)
                                        ->take(30)->paginate(5);
                return json_encode($result);
                break;

            case '2':
                $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
                                        ->where('dv_loaihinh',2)
                                        ->take(30)->paginate(5);
                return json_encode($result);
                break;

            case '3':
                $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
                                        ->where('dv_loaihinh',3)
                                        ->take(30)->paginate(5);
                return json_encode($result);
                break;

            case '4':
                $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
                                        ->where('dv_loaihinh',4)
                                        ->take(30)->paginate(5);
                return json_encode($result);
                break;

            case '5':
                $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
                                        ->where('dv_loaihinh',5)
                                        ->take(30)->paginate(5);
                return json_encode($result);
                break;

            default:
                $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
                                        ->where('dv_loaihinh',1)
                                        ->take(30)->paginate(5);
                return json_encode($result);
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

// sửa đường dẫn search lại
// tính khoảng cách trước rồi mới select
// tinh khoang cach giua 2 toa do thuc te
// load du lieu mau và test 
//KẾT QUẢ TRẢ VỀ TỌA ĐỘ, ĐỊA CHỈ, KHOẢNG CÁCH 