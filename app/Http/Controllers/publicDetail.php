<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class publicDetail extends Controller
{
    public function get_detail($id)
    {
    	$placecount       = $this::count_place_display();
    	$service = $this::get_service_id($id);
    	echo $service->sv_name;
    	return view('VietNamTour.content.detail', compact('placecount','service'));
    }

    public function get_service_id($id)
    {
    	$result = DB::select("SELECT * FROM sv_hotel AS h WHERE h.sv_id = '$id'");
    	foreach ($result as $value) {
    		$result['sv_name'] = $value->sv_name;
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

}
