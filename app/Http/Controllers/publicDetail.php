<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\touristPlacesModel;

class publicDetail extends Controller
{
    public function get_detail($id,$type)
    {
    	$placecount       = $this::count_place_display();
    	$sv = $this::get_service_id($id,$type);
    	if ($sv == null) {
    		return view('VietNamTour.404');
    	}
    	else{
    		return view('VietNamTour.content.detail', compact('placecount','sv'));
    	}
    }

    public function get_service_id($id,$type)
    {
    	switch ($type) {
    		case 1:
    			$result = DB::select("SELECT * FROM sv_eat AS h WHERE h.sv_id = '$id'");
    			break;
    		case 2:
    			$result = DB::select("SELECT * FROM sv_hotel AS h WHERE h.sv_id = '$id'");
    			break;
    		case 3:
    			$result = DB::select("SELECT * FROM sv_stranport AS h WHERE h.sv_id = '$id'");
    			break;
    		case 4:
    			$result = DB::select("SELECT * FROM sv_sightseeting AS h WHERE h.sv_id = '$id'");
    			break;
    		case 5:
    			$result = DB::select("SELECT * FROM sv_entertaiment AS h WHERE h.sv_id = '$id'");
    			break;
    		default:
    			$result = DB::select("SELECT * FROM sv_eat AS h WHERE h.sv_id = '$id'");
    			break;
    	}

    	foreach ($result as $value) {
    		$result['sv_id'] = $value->sv_id;
    		$result['sv_name'] = $value->sv_name;
    		$result['id_place'] = $value->sv_name;
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
    		$result['sv_website'] = $value->sv_website;
    		$result['image_banner'] = $value->image_banner;
    		$result['image_details_1'] = $value->image_details_1;
    		$result['image_details_2'] = $value->image_details_2;
    		$result['sv_open'] = $value->sv_open;
    		$result['sv_open'] = $value->sv_open;
    		$result['sv_open'] = $value->sv_open;
    	}
    	if ($result == null) {
    		echo "404";
    	}
    	else{
    		return $result;
    	}
    }

    public function count_place_display()
    {
        $result = DB::select('CALL count_city_place()');
        return $result;
    }



    // lan can
    public static function distance($lat1, $lon1, $lat2, $lon2) 
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

    public static function getServicesAll($place_id,$typeServices, $distance)
    {
        switch ($typeServices) {
            case '1':
                $result = DB::table('vnt_services')
                                    ->Join('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id', 'vnt_eating.eat_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get()->toArray();
                if (!empty($result)) {
                    
                    $lam['lam'] = $result->id;
                    if (isset($result)) {
                        return $result;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '2':
                $result = DB::table('vnt_services')
                                    ->Join('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_hotels.hotel_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'hotel_name' => $value->hotel_name,'image_id' => $value->image_id,'image_details_1' => 'image_details_1','distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '3':
                $result = DB::table('vnt_services')
                                    ->Join('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_transport.transport_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'transport_name' => $value->transport_name,'image_id' => $value->image_id,'image_details_1' => 'image_details_1','distance' => $distance);
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
                    // foreach ($result as $value) {
                    //     $resultCustom[] = array('id'=> $value->id,'sightseeing_name' => $value->sightseeing_name,'image_id' => $value->image_id,'image_details_1' => 'image_details_1','distance' => $distance);
                    // }
                    foreach ($result as $value) {
                    	$lam['lam'] = $result->id;
                    }
                    if (isset($lam)) {
                        return $lam;
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
                        $resultCustom[] = array('id'=> $value->id,'entertainments_name' => $value->entertainments_name,'image_id' => $value->image_id,'image_details_1' => 'image_details_1','distance' => $distance);
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
            if (!empty($arr_distance)) {
                ksort($arr_distance);
                echo "<pre>";
                echo print_r($arr_distance);
                echo "</pre>";
                foreach ($arr_distance as $value) {
                    $arr_distancePlace[$value['id']] = $value['distantce'];
                }

                echo "<pre>";
                echo print_r($arr_distancePlace);
                echo "</pre>";
                // return $arr_distancePlace[''];
                // foreach ($arr_distancePlace as $key => $value) {
                //     if (!empty($this::getServicesAll($key,$type,$value))) {
                        
                //         // $r = $this::getServicesAll($key,$type,$value);
                //     }
                // }
                // if (isset($r)) {
                //     // $resultAll['data'] = $r;
                //     // $resultAll['status'] = "OK";

                //     return json_encode($r);
                // }
                // else{
                //     $resultAll = array('data' => null,'status' => 'NOT FOUND');
                //     return json_encode($resultAll);
                // }
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

}
