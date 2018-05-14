<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristPlacesModel;
use App\servicesModel;
use DB;

class SearchController extends Controller
{
    //
    public function distance($lat1, $lon1, $lat2, $lon2) 
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

    public function distanceRadius($latitude, $longitude, $radius)
    {
        $places = touristPlacesModel::all();
        foreach ($places as $p) {
            $p_latitude = (double)$p['pl_latitude'];
            $p_longitude = (double)$p['pl_longitude'];
            $distancePlace = $this::distance($latitude, $longitude, $p_latitude, $p_longitude);
            if ($distancePlace <= $radius && $distancePlace > 1) {
                $result[$distancePlace] = array('id' => $p['id'],'pl_name' => $p['pl_name'],'distantce' => $distancePlace, 'latitude' => $p['pl_latitude'],'longitude' => $p['pl_longitude']);
            }
        }
        if (isset($result)) { return $result; }
        else{ return null; } 
    }

    public function searchPlaceVicinity($user_lat, $user_lon, $radius)
    {
        $result = $this::distanceRadius($user_lat,$user_lon,$radius);
        if (isset($result)) 
        {
            ksort($result);
            $temp = 0;
            foreach ($result as $item) {
                if ($temp < 10) {
                    $jsonResult[] = $item;
                    $temp++;
                }
                else{break;}
            }
            $jsonResultData = array('data'=>$jsonResult,'status'=>'OK');
            return json_encode($jsonResultData);
        }
        else{
            $jsonResult['data'] = null;
            $jsonResult['status'] = 'NOT FOUND';
            return json_encode($jsonResult);
        }
    }

    public static function getServicesAll($place_id,$typeServices, $distance)
    {
        switch ($typeServices) {
            case '1':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id', 'vnt_eating.eat_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'eat_name' => $value->eat_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '2':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_hotels.hotel_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'hotel_name' => $value->hotel_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '3':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_transport.transport_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'transport_name' => $value->transport_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '4':
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_sightseeing.sightseeing_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'sightseeing_name' => $value->sightseeing_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '5':
                $result = DB::table('vnt_services')
                                    ->join('vnt_entertainments','vnt_services.id','=','vnt_entertainments.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_entertainments.entertainments_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'entertainments_name' => $value->entertainments_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
        }
    }

    //tìm dịch vụ lân cận
    public function searchServicesVicinity($latitude,$longitude, $type,int $radius)
    {
        if ($radius >=100) 
        {
            $arr_distance = $this::distanceRadius($latitude,$longitude,$radius);
            // dd($arr_distance);
            if (!empty($arr_distance)) {
                ksort($arr_distance);
                foreach ($arr_distance as $value) {
                    $arr_distancePlace[$value['id']] = $value['distantce'];
                }
                foreach ($arr_distancePlace as $key => $value) {
                    if (!empty($this::getServicesAll($key,$type,$value))) {
                        foreach ($this::getServicesAll($key,$type,$value) as $k => $v) {
                            $r[] = $v;
                        }
                    }
                }
                if (isset($r)) {
                    $resultAll['data'] = $r;
                    $resultAll['status'] = "OK";
                    return json_encode($resultAll);
                }
                else{
                    $resultAll = array('data' => null,'status' => 'NOT FOUND');
                    return json_encode($resultAll);
                }
            }
            else{
                $resultAll = array('data' => null,'status' => 'NOT FOUND');
                return json_encode($resultAll);
            }
        }
        else
        {
            $resultAll = array('data' => null,'status' => 'DISTANCE');
            return json_encode($resultAll);
        } 
    }

    public function searchServicesTypeKeyword($type,$keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        switch ($type) {
            case '0':
                $result = DB::table('vnt_services') // idhinhanh, anhimage_detail_1
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_transport', 'vnt_services.id', '=', 'vnt_transport.service_id')
                                    ->leftJoin('vnt_entertainments', 'vnt_services.id', '=', 'vnt_entertainments.service_id')
                                    ->leftJoin('vnt_sightseeing', 'vnt_services.id', '=', 'vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id', 'vnt_eating.eat_name','vnt_hotels.hotel_name','vnt_sightseeing.sightseeing_name','vnt_transport.transport_name','vnt_entertainments.entertainments_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('eat_name','like',"%$keyword_handing%")
                                    ->orWhere('hotel_name','like',"%$keyword_handing%")
                                    ->orWhere('sightseeing_name','like',"%$keyword_handing%")
                                    ->orWhere('transport_name','like',"%$keyword_handing%")
                                    ->orWhere('entertainments_name','like',"%$keyword_handing%")->take(30)->paginate(10);
        return json_encode($result);
                break;
            case '1':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id', 'vnt_eating.eat_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('eat_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '2':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_hotels.hotel_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('hotel_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '3':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_transport.transport_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('transport_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '4':
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_sightseeing.sightseeing_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('sightseeing_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '5':
                $result = DB::table('vnt_services')
                                    ->join('vnt_entertainments','vnt_services.id','=','vnt_entertainments.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_entertainments.entertainments_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('entertainments_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
        }
    }
    
    public static function searchServicesVicinityWEB($latitude,$longitude, $type,int $radius)
    {
       if ($radius >=100) 
        {
            $arr_distance = $this::distanceRadius($latitude,$longitude,$radius);
            if (!empty($arr_distance)) {
                ksort($arr_distance);
                foreach ($arr_distance as $value) {
                    $arr_distancePlace[$value['id']] = $value['distantce'];
                }
                foreach ($arr_distancePlace as $key => $value) {
                    if (!empty($this::getServicesAll($key,$type,$value))) {
                        foreach ($this::getServicesAll($key,$type,$value) as $k => $v) {
                            $r[] = $v;
                        }
                    }
                }
                if (isset($r)) {
                    return $r;
                }
                else{
                    return "Loi1";
                }
            }
            else{
                return "Loi2";
            }
        }
        else
        {
            return "Loi3";
        } 
    }



    // search quanh day web
    public function timquanhday($latitude, $longitude, $radius)
    {
        $type = 1;
        // $place = $this::distance_Radius_web($latitude, $longitude, $radius);
        $arr_distance = $this::distanceRadius($latitude,$longitude,$radius);
            // dd($arr_distance);
            if (!empty($arr_distance)) {
                ksort($arr_distance);
                // return $arr_distance;
                foreach ($arr_distance as $value) {
                    // $arr_distancePlace[$value['id']] = $value['distantce'];
                    if (!empty($this::getServicesAll_2($value['id'],$value['distantce']))) {
                        foreach ($this::getServicesAll_2($value['id'],$value['distantce']) as $k => $v) {
                            $r[] = $v;
                        }
                    }
                }
                // return $arr_distancePlace;
                // foreach ($arr_distancePlace as $key => $value) {
                //     if (!empty($this::getServicesAll_2($key,$type,$value))) {
                //         foreach ($this::getServicesAll_2($key,$type,$value) as $k => $v) {
                //             $r[] = $v;
                //         }
                //     }
                // }
                if (isset($r)) {
                    return $r;
                }
                else{
                    return null;
                }
            }
            else{
                return null;
            }
    }


    public function getServicesAll_2($place_id, $distance)
    {
        $result = DB::select("select * FROM c_city_district_ward_place_service where id_place = '$place_id' AND sv_status = 1
");
        // return $result;
        foreach ($result as $value) {
            $likes = DB::table('vnt_likes')->where('service_id', '=',$value->id_service)->count();
            // echo "string";
            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$value->id_service)->first();
            if (!empty($ratings)) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = 0; }
            
            $result_type = $this::get_name_ser($value->id_service,$value->sv_types);
            if ($result_type != null) {
                foreach ($result_type as $v) {
                    $mang[] = array(
                        'id_service'        => $value->id_service,
                        'name'              => $v->sv_name,
                        'image'             => $v->image_details_1,
                        // // 'name_city'         => $name_city,
                        'like'              => $likes,
                        'view'              => $value->sv_counter_view,
                        'point'             => $value->sv_counter_point,
                        'rating'            => $ponit_rating,
                        'sv_type'           => $value->sv_types,
                        'distance'          => $distance
                    );
                }
            }      
        }
        if (isset($mang)) {
            return $mang;
        }
        else{
            return null;
        }
    }




    public function timquanhday_type($latitude, $longitude, $radius)
    {
        $type = 1;
        // $place = $this::distance_Radius_web($latitude, $longitude, $radius);
        $arr_distance = $this::distanceRadius($latitude,$longitude,$radius);
            // dd($arr_distance);
            if (!empty($arr_distance)) {
                ksort($arr_distance);
                // dd($arr_distance);
                $lamlam = array();
                
                $lamlam['eat'] = null;
                $lamlam['hotel'] = null;
                $lamlam['tran'] = null;
                $lamlam['see'] = null;
                $lamlam['enter'] = null;
                foreach ($arr_distance as $value2) {
                    $id_place = (int)$value2['id'];
                    $distance = (float)$value2['distantce'];
                    $result = DB::select("select * FROM c_city_district_ward_place_service where id_place = '$id_place' AND sv_status = 1");
                    foreach ($result as $value) {
                        $likes = DB::table('vnt_likes')->where('service_id', '=',$value->id_service)->count();
                        // echo "string";
                        $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$value->id_service)->first();
                        if (!empty($ratings)) {
                            $ponit_rating = $ratings->vr_rating;
                        }else{ $ponit_rating = 0; }
                        
                        $result_type = $this::get_name_ser($value->id_service,$value->sv_types);

                        $sv_type = (int)$value->sv_types;

                        if ($result_type != null) {
                            foreach ($result_type as $v) {
                                $mang[] = array(
                                    'id_service'        => $value->id_service,
                                    'name'              => $v->sv_name,
                                    'image'             => $v->image_details_1,
                                    // // 'name_city'         => $name_city,
                                    'like'              => $likes,
                                    'view'              => $value->sv_counter_view,
                                    'point'             => $value->sv_counter_point,
                                    'rating'            => $ponit_rating,
                                    'sv_type'           => $sv_type,
                                    'distance'          => $distance
                                );

                                if ($sv_type == 1) {
                                    if ($lamlam['eat'] == null) {
                                        $lamlam['eat'] = $mang;
                                    }
                                    else{
                                        $lamlam['eat'] = array_merge($lamlam['eat'],$mang);
                                    }
                                    $mang = null;
                                }

                                if($sv_type == 2){
                                    if ($lamlam['hotel'] == null) {
                                        $lamlam['hotel'] = $mang;
                                    }
                                    else{
                                        $lamlam['hotel'] = array_merge($lamlam['hotel'],$mang);
                                    }
                                    $mang = null;
                                }

                                if($sv_type == 3){
                                    if ($lamlam['tran'] == null) {
                                        $lamlam['tran'] = $mang;
                                    }
                                    else{
                                        $lamlam['tran'] = array_merge($lamlam['tran'],$mang);
                                    }
                                    $mang = null;
                                }

                                if($sv_type == 4){
                                    if ($lamlam['see'] == null) {
                                        $lamlam['see'] = $mang;
                                    }
                                    else{
                                        $lamlam['see'] = array_merge($lamlam['see'],$mang);
                                    }
                                    $mang = null;
                                }

                                if($sv_type == 5){
                                    if ($lamlam['enter'] == null) {
                                        $lamlam['enter'] = $mang;
                                    }
                                    else{
                                        $lamlam['enter'] = array_merge($lamlam['enter'],$mang);
                                    }
                                    $mang = null;
                                }
                            }
                        }      
                    }
                }
                return $lamlam;
            }
            else{
                return null;
            }
    }



    public function getServicesAll_type($place_id, $distance)
    {
        $result = DB::select("select * FROM c_city_district_ward_place_service where id_place = '$place_id' AND sv_status = 1
");
         // dd($result);
        foreach ($result as $value) {
            $likes = DB::table('vnt_likes')->where('service_id', '=',$value->id_service)->count();
            // echo "string";
            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$value->id_service)->first();
            if (!empty($ratings)) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = 0; }
            
            $result_type = $this::get_name_ser($value->id_service,$value->sv_types);
            $result_type2[] = $this::get_name_ser($value->id_service,$value->sv_types);

            $sv_type = (int)$value->sv_types;

            if ($result_type != null) {
                foreach ($result_type as $v) {
                    $mang[] = array(
                        'id_service'        => $value->id_service,
                        'name'              => $v->sv_name,
                        'image'             => $v->image_details_1,
                        // // 'name_city'         => $name_city,
                        'like'              => $likes,
                        'view'              => $value->sv_counter_view,
                        'point'             => $value->sv_counter_point,
                        'rating'            => $ponit_rating,
                        'sv_type'           => $value->sv_types,
                        'distance'          => $distance
                    );

                    // if ($sv_type == 1) {
                    //     $result2['eat'] = $mang;
                    //     $mang = null;
                    // }else{$result2['eat'] = null;}

                    // if($sv_type == 2){
                    //     $result2['hotel'] = $mang;
                    //     $mang = null;
                    // }else{$result2['hotel'] = null;}

                    // if($sv_type == 3){
                    //     $result2['tran'] = $mang;
                    //     $mang = null;
                    // }else{$result2['tran'] = null;}

                    // if($sv_type == 4){
                    //     $result2['see'] = $mang;
                    //     $mang = null;
                    // }else{$result2['see'] = null;}

                    // if($sv_type == 5){
                    //     $result2['enter'] = $mang;
                    //     $mang = null;
                    // }else{$result2['enter'] = null;}
                }
            }      
        }

        if (isset($mang)) {
            return $mang;
            // dd($mang);
            // return $result_type2;
            // dd($result_type2);
        }
        else{
            return null;
        }
    }


    public function get_name_ser($id_service, $type)
    {
        switch ($type) {
            case 1:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_eat WHERE sv_id='$id_service' AND sv_status=1");
            break;
            case 2:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_hotel WHERE sv_id='$id_service' AND sv_status=1");
            break;
            case 3:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_stranport WHERE sv_id='$id_service' AND sv_status=1");
            break;
            case 4:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_sightseeting WHERE sv_id='$id_service' AND sv_status=1");
            break;
            case 5:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_entertaiment WHERE sv_id='$id_service' AND sv_status=1");
            break;
        }
        if (isset($result)) {
            return $result;
        }
        else{
            return null;
        }
    }



}
