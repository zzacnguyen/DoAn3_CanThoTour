<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class publicSearchController extends Controller
{
    public function get_search()
    {
    	$placecount       = $this::count_place_display();
    	return view('VietNamTour.content.search',compact('placecount'));
    }

    public function count_place_display()
    {
        $result = DB::select('CALL count_city_place()');
        return $result;
    }


	//=================== PLACE CITY =====================
    public function get_place_city($idcity)
    {
    	$placecount       = $this::count_place_display();
    	$sum = $this::count_place_city($idcity);
    	if ($sum == null) {
    		return view('VietNamTour.404');
    	}
    	else{
    		return view('VietNamTour.content.place_city',compact('placecount','sum'));
    	}	
    }

    public function count_place_city($idcity)
    {
    	$city = DB::select("SELECT COUNT(c.id_place) AS sum_place,c.province_city_name FROM city_place_all AS c WHERE c.id = '$idcity'");
    	$sum = 0;
    	$name = "";
    	$result = null;
    	foreach ($city as $value) {
    		$sum = $value->sum_place;
    		$name = $value->province_city_name;
    	}
    	if ($name == null) {
    		$result = null;
    	}
    	else if ($sum == 0 && $name == null) {
    		$result = null;
    	}
    	else if ($name != null){
    		$result = array('name' => $name, 'sum' => $sum);
    	}
    	return $result;
    }

    public function count_servies_type($idcity)
    {
    	$sum_eat = 0;
    	$place = DB::table('vnt_tourist_places as t')->where('t.city_id',$idcity)->select('t.id')->get();

    	foreach ($place as $value) {
    		$sum_eat = $this::count_servies_type_con($value->id,3);
    		echo $sum_eat;
    		echo "<br>";
    	}
    	return $place;
    	// return $sum_eat;
    }

    public function count_servies_type_con($id_place,$type_service) //dem tungtheo tung loai dich vu
    {
    	$sum = 0;
    	$count_ser = DB::select('CALL count_service_city(?,?)',array($id_place,$type_service));
    		foreach ($count_ser as $s) {
    			echo $s->count_ser;
    			return $sum = $s->count_ser;
    		}
		
    }
}
