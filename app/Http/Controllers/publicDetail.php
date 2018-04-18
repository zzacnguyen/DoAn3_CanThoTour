<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\touristPlacesModel;

class publicDetail extends Controller
{
    public function get_detail($id,$type)
    {
    	$sv = $this::get_service_id($id,$type);
        $sv_lancan = $this::dichvu_lancan($id);

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
                    $dv = DB::table('vnt_hotel')->where('service_id',$id)->select('hotel_name as sv_name')->first();
                    break;
                case 3:
                    $dv = DB::table('vnt_transport')->where('service_id',$id)->select('transport_name as sv_name')->first();
                    break;
                case 4:
                    $dv = DB::table('vnt_sightseeing')->where('service_id',$id)->select('sightseeing_name as sv_name')->first();
                    break;
                case 5:
                    $dv = DB::table('vnt_entertainments')->where('service_id',$id)->select('entertaiments_name as sv_name')->first();
                    break;
                default:
                    $dv = null;
                    break;
            }

            $image = DB::table('vnt_images')->where('service_id',$id)->first();// load anh cua service

            $likes = DB::table('vnt_likes')->where('service_id', '=',$id)->count();

            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$id)->first();
            if (!empty($ratings)) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = 0; }

            if ($dv == null || !isset($dv)) {
                $result = null;
            }
            else{
                foreach ($service as $value) {
                    $result['sv_id'] = $value->id_service;
                    $result['sv_name'] = $dv->sv_name;
                    $result['city_name'] = $value->name_city;
                    $result['district_name'] = $value->name_district;
                    $result['ward_name'] = $value->name_ward;
                    $result['place_name'] = $value->name_place;
                    $result['sv_view'] = $value->sv_counter_view;
                    $result['sv_point'] = $value->sv_counter_point;
                    $result['sv_like'] = $likes;
                    $result['sv_rating'] = $ponit_rating;

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

    public function dichvu_lancan($id_service)
    {
        $place = DB::table('vnt_services')
                    ->join('vnt_tourist_places as p','vnt_services.tourist_places_id','=','p.id')
                    ->where('vnt_services.id',$id_service)
                    ->select('p.id','p.city_id')
                    ->first();
        // load địa điêm cùng tỉnh thành phố    
        $ward_place = DB::table('vnt_tourist_places as p')
                        ->where('p.id','<>','$place->id')
                        ->where('p.city_id',$place->city_id)
                        ->select('p.id','p.pl_name','p.city_id')
                        ->get();

        foreach ($ward_place as $value) {

            $lam = DB::select('CALL load_lancan(?)',array($value->id));
            foreach ($lam as $s) {
                $result[] = array(
                    'sv_id' =>$s->sv_id,
                    'place_id' =>$s->place_id,
                    'sv_type' =>$s->sv_types,
                    'place_name' =>$s->pl_name,
                    'image' =>$s->image_details_1
                );
            }
            
        }
        return $result;
    }


    
}
