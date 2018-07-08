<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\touristPlacesModel;
use App\likesModel;
use App\servicesModel;
use App\ratingsModel;
use Carbon;

class publicDetail extends Controller
{
    public function get_detail($id,$type)
    {
        $this::addview($id);
    	$sv = $this::get_service_id($id,$type);

        $sv_lancan = $this::dichvu_lancan($sv['city_id'],$id,20);
        // dd($sv_lancan);
    	if ($sv == null) {
    		return view('VietNamTour.404');
    	}
    	else{
    		return view('VietNamTour.content.detail', compact('sv','sv_lancan'));
    	}
    }

    public function get_service_id($id,$type)
    {
        $service = DB::select("CALL find_serviceOfcity(?)",array($id)); //load serice-place-ward-district-city
        if ($service == null) {
            $result = null;
        }
        else{
            switch ($type) { //load ten theo id service
                case 1:
                    $dv = DB::table('vnt_eating')->where('service_id',$id)->select('eat_name as sv_name')->first();
                    break;
                case 2:
                    $dv = DB::table('vnt_hotels')->where('service_id',$id)->select('hotel_name as sv_name')->first();
                    break;
                case 3:
                    $dv = DB::table('vnt_transport')->where('service_id',$id)->select('transport_name as sv_name')->first();
                    break;
                case 4:
                    $dv = DB::table('vnt_sightseeing')->where('service_id',$id)->select('sightseeing_name as sv_name')->first();
                    break;
                case 5:
                    $dv = DB::table('vnt_entertainments')->where('service_id',$id)->select('entertainments_name as sv_name')->first();
                    break;
                default:
                    $dv = null;
                    break;
            }

            $image = DB::table('vnt_images')->where('service_id',$id)->first();// load anh cua service

            $likes = DB::table('vnt_likes')->where('service_id', '=',$id)->count();

            $ratings = DB::select("SELECT avg(vr_rating) as 'rating' FROM `vnt_visitor_ratings` WHERE service_id = '$id'");
            foreach ($ratings as $val) {
                $rating_sv = round($val->rating,1);
            }
            if (!empty($rating_sv)) {
                $ponit_rating = $rating_sv;
            }else{ $ponit_rating = 0; }

            if ($dv == null || !isset($dv)) {
                $result = null;
            }
            else{
                foreach ($service as $value) {
                    $result['sv_id'] = $value->id_service;
                    $result['sv_name'] = $dv->sv_name;
                    $result['city_id'] = $value->id_city;
                    $result['city_name'] = $value->name_city;
                    $result['district_name'] = $value->name_district;
                    $result['ward_name'] = $value->name_ward;
                    $result['place_name'] = $value->name_place;
                    $result['sv_view'] = $value->sv_counter_view;
                    $result['sv_point'] = $value->sv_counter_point;
                    $result['sv_like'] = $likes;
                    $result['sv_rating'] = $ponit_rating;
                    $result['sv_content'] = $value->sv_content;

                    $result['id_place'] = $value->id_place;
                    $result['pl_latitude'] = $value->pl_latitude;
                    $result['pl_longitude'] = $value->pl_longitude;
                    $result['sv_close'] = $value->sv_close;
                    $result['sv_counter_point'] = $value->sv_counter_point;
                    $result['sv_counter_view'] = $value->sv_counter_view;
                    $result['sv_description'] = $value->sv_description;
                    $result['sv_highest_price'] = $value->sv_highest_price;
                    $result['sv_lowest_price'] = $value->sv_lowest_price;
                    $result['sv_open'] = $value->sv_open;
                    $result['sv_phone_number'] = $value->sv_phone_number;
                    $result['sv_types'] = $value->sv_types;
                    // $result['sv_website'] = $value->sv_website;
                    if ($image == null) {
                        $result['image_banner'] = null;
                        $result['image_details_1'] = null;
                        $result['image_details_2'] = null;
                    }
                    else{
                        $result['image_banner'] = $image->image_banner;
                        $result['image_details_1'] = $image->image_details_1;
                        $result['image_details_2'] = $image->image_details_2;
                    }

                    $result['sv_open'] = $value->sv_open;
                    $result['sv_open'] = $value->sv_open;
                    $result['sv_open'] = $value->sv_open;
                }
            }
        }

    	if ($result == null || !isset(($result))) {
    		echo "404";
    	}
    	else{
    		return $result;
    	}
    }

    // random image city
    public function image_city($idcity)
    {
        $place = DB::select('CALL load_palce_city_limit1(?)',array($idcity));
        if ($place == null) {
            $image = null;
        }
        else{
            foreach ($place as $value) {
                $id_place = $value->id_place;
            }
            $s = DB::select("SELECT * FROM place_service_image AS p WHERE p.place_id = '$id_place'");
            if ($s == null) {
                $image = null;
            }
            else{
                foreach ($s as $v) {
                    $image = $v->image_details_1;
                }
            }
        }

        return $image;
    }

    public function dichvu_lancan($id_city,$id_service,$limit)
    {
        $result_sv = DB::select("CALL load_service_idcity(?,?,?)",array($id_city,$id_service,$limit));
        foreach ($result_sv as $sv) {
            $image = DB::table('vnt_images')->where('service_id',$sv->id_service)->first();// load anh cua
            $sv_name = $this::getname_Service($sv->id_service,$sv->sv_types);
            if ($image == null) {
                $image_banner = "null";
            }
            else{
                $image_banner = $image->image_banner;
            }

            $result[] = array(
                'sv_id' => $sv->id_service,
                'sv_name' => $sv_name,
                'sv_type' => $sv->sv_types,
                'image_banner' => $image_banner
            );
        }
        if (!isset($result)) {
            return null;
        }else{
            return $result;
        }

    }

    public function getname_Service($id_service,$type)
    {
        switch ($type) { //load ten theo id service
                case 1:
                    $dv = DB::table('vnt_eating')->where('service_id',$id_service)->select('eat_name as sv_name')->first();
                    break;
                case 2:
                    $dv = DB::table('vnt_hotels')->where('service_id',$id_service)->select('hotel_name as sv_name')->first();
                    break;
                case 3:
                    $dv = DB::table('vnt_transport')->where('service_id',$id_service)->select('transport_name as sv_name')->first();
                    break;
                case 4:
                    $dv = DB::table('vnt_sightseeing')->where('service_id',$id_service)->select('sightseeing_name as sv_name')->first();
                    break;
                case 5:
                    $dv = DB::table('vnt_entertainments')->where('service_id',$id_service)->select('entertainments_name as sv_name')->first();
                    break;
                default:
                    $dv = null;
                    break;
        }

        if ($dv == null) {
            return null;
        }
        else{
            return $dv->sv_name;
        }
    }

    public function getRating($idservice)
    {
        // $result = DB::select("SELECT vr_title, vr_ratings_details,vr_rating,user_id,service_id,created_at,username FROM `vnt_visitor_ratings` AS r INNER JOIN vnt_user AS i ON r.user_id = i.user_id WHERE r.service_id = '$idservice'");

        $result = DB::table('vnt_visitor_ratings')
                    ->join('vnt_user','vnt_visitor_ratings.user_id','=','vnt_user.user_id')
                    ->leftjoin('vnt_contact_info','vnt_visitor_ratings.user_id','=','vnt_contact_info.user_id')
                    ->select('id','vr_title','vr_ratings_details','vr_rating','vnt_visitor_ratings.user_id','service_id','vnt_visitor_ratings.created_at','username','contact_avatar')
                    ->where('service_id',$idservice)->get();
        return $result;
    }

    public function checkUserRating($idservice,$iduser)
    {
        $result = DB::table('vnt_visitor_ratings')
                    ->join('vnt_user','vnt_visitor_ratings.user_id','=','vnt_user.user_id')
                    ->leftjoin('vnt_contact_info','vnt_visitor_ratings.user_id','=','vnt_contact_info.user_id')
                    ->select('id','vr_title','vr_ratings_details','vr_rating','vnt_visitor_ratings.user_id','service_id','vnt_visitor_ratings.created_at','username','contact_avatar')
                    ->where('service_id',$idservice)
                    ->where('vnt_visitor_ratings.user_id',$iduser)
                    ->orderBy('vnt_visitor_ratings.created_at','desc')
                    ->limit(10)
                    ->get();
        return json_encode($result);
    }

    public function save_rating($id_service, $rating, $detail,$userid)
    {
        $ra = (int)$rating;
        $user_id = $userid;
        $rating = new ratingsModel();
        $rating->vr_title = "d";
        $rating->vr_ratings_details = $detail;
        $rating->vr_rating = $ra;
        $rating->user_id = $user_id;
        $rating->service_id = $id_service;

        $mytime = Carbon\Carbon::now();
        $rating->created_at = $mytime->toDateTimeString();

        if($rating->save()){
            return 1;
        }
        else{return -1;}
    }

    public function save_update_rating($id_service, $rating, $detail,$user_id)
    {
        // return $detail;
        $mytime = Carbon\Carbon::now();
        DB::table('vnt_visitor_ratings')
            ->where('user_id', $user_id)
            ->where('service_id', $id_service)
            ->update(['vr_rating' => $rating,'vr_title'=>'s', 'vr_ratings_details' => $detail, 'created_at' => $mytime->toDateTimeString()]);
        return 1;
    }

    public function checkLike($userid,$idservice)
    {
        // kiem tra nguoi dung co login hay chưa
        $like = DB::table('vnt_likes')->where('user_id',$userid)->where('service_id',$idservice)->select('id')->first();
        if ($like == null) {
            $result = -1;
        }
        else{
            $result = 1;
        }
        return json_encode($result);
    }

    public function addview($idservice)
    {
        $result = servicesModel::findOrFail($idservice);
        if ($result == null) {
            $view = 1;
        }else{
            $view = $result->sv_counter_view + 1;
        }
        $result->sv_counter_view = $view;

        $result->save();
    }

    public function ThemVaCapNhatLike($idservice, $userid)
    {
        $checkLike = likesModel::where('user_id',$userid)->where('service_id',$idservice)->first();
        $like = new likesModel();
        if ($checkLike == null) {
            $like->user_id = $userid;
            $like->service_id = $idservice;
            $mytime = Carbon\Carbon::now();
            $like->created_at = $mytime->toDateTimeString();
            $like->save();
            return 1;
        }
        else{
            DB::table('vnt_likes')->where('user_id', $userid)->where('service_id',$idservice)->delete();
            return 2;
        }
    }

    public function get_service_top_view($limit){
        $sv = DB::select("SELECT id_city,name_city,id_service, sv_types,sv_counter_point,sv_counter_view FROM c_city_district_ward_place_service WHERE sv_status = 1 ORDER BY sv_counter_view DESC LIMIT $limit");
        // return $sv;
        foreach ($sv as $value) {
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
                        'name_city'         => $value->name_city,
                        'like'              => $likes,
                        'view'              => $value->sv_counter_view,
                        'point'             => $value->sv_counter_point,
                        'rating'            => $ponit_rating,
                        'sv_type'           => $value->sv_types
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


    public function count_rating_service($idserive){
        $result = DB::select("select COUNT(service_id) as 'num_rating' FROM vnt_visitor_ratings WHERE service_id = '$idserive' GROUP BY service_id");
        return json_encode($result);
    }

    public function get_quyen_user($userid)
    {
        $result = DB::select('CALL login_info_phone(?)',array($userid));
            // dd($result);
            $level = 0;
            foreach ($result as $result) {
                if ($result->admin != null) {
                    $level = 1;
                }
                else if($result->moderator != null && $result->active_mod == 1){
                    $level = 2;
                }
                else if($result->partner != null && $result->active_partner == 1){
                    $level = 3;
                }
                else if($result->enterprise != null && $result->active_enter == 1){
                    $level = 4;
                }
                else if($result->tour_guide != null && $result->active_tour == 1){
                    $level = 5;
                }

                $result_info = array(
                    'id' => $result->user_id,
                    'username' =>$result->username,
                    'avatar' =>$result->contact_avatar,
                    'level' =>$level
                );
            }
        return json_encode($result_info);
    }

    public function delete_rating($id)
    {
        $result = ratingsModel::where('id',$id)->delete();
        if ($result) {
            return 1;
        }
        else{
            return -1;
        }
    }


//====================  MAP ===========================

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
        $places = touristPlacesModel::where('pl_status',1)->get();
        // return 1;
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

    public function get_location_service_vicinity($latitude, $longitude, $radius)
    {
        $type = 1;
        
        $arr_distance = $this::distanceRadius($latitude,$longitude,$radius);
            // dd($arr_distance);
            if (!empty($arr_distance)) {
                // ksort($arr_distance);
                // return $arr_distance;
                foreach ($arr_distance as $value) {
                    
                    if (!empty($this::getServicesAll_2($value['id'],$value['distantce'],$value['latitude'],$value['longitude']))) {
                        foreach ($this::getServicesAll_2($value['id'],$value['distantce'],$value['latitude'],$value['longitude']) as $k => $v) {
                            $r[] = $v;
                        }
                    }
                }
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


    public function getServicesAll_2($place_id, $distance, $lat, $lng)
    {
        $result = DB::select("select * FROM c_city_district_ward_place_service where id_place = '$place_id' AND sv_status = 1
");
        // return $result;
        foreach ($result as $value) {
            $likes = DB::table('vnt_likes')->where('service_id', '=',$value->id_service)->count();
            // echo "string";
            $ratings = DB::select("SELECT avg(vr_rating) as 'rating' FROM `vnt_visitor_ratings` WHERE service_id = '$value->id_service'");
            foreach ($ratings as $val) {
                $rating_sv = round($val->rating,1);
            }
            if (!empty($rating_sv)) {
                $ponit_rating = $rating_sv;
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
                        'distance'          => $distance,
                        'lat'               => $lat,
                        'lng'               => $lng
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

    public function count_share($url = "https://www.facebook.com/lam.themen")
    {
        $url = "https://www.youtube.com/watch?v=El_8oFXGehY&t=111s";
        $lam = "http://graph.facebook.com/?ids=".urlencode($url);
        // return $url;
        $json = json_decode(file_get_contents("http://graph.facebook.com/?ids=".urlencode($url)),true);
        return $json;

        // $source_url = 'https://www.facebook.com/lam.themen';
        // $rest_url = "http://api.facebook.com/restserver.php?format=json&method=links.getStats&urls=".urlencode($source_url);
        // $json = json_decode(file_get_contents($rest_url),true);
        // return $json;
    }

}
