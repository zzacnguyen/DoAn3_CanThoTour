<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristPlacesModel;
use App\servicesModel;
use App\imagesModel;
use App\eatingModel;
use App\sightseeingModel;
use App\transportModel;
use App\hotelsModel;
use Illuminate\Support\Facades\DB;
class tourist_places_controller extends Controller
{


	//function get id last insert places - ĐÃ TEST
	function GetIDLastPlace()
	{
		$lastPlaces = DB::table('vnt_tourist_places')->orderBy('id', 'desc')->first();
        $convert = (array)$lastPlaces;
        $id_place = $convert['id'];
        return $id_place;		
	}

    public function AddPlace(Request $request, $number_types)
	{
		$place             		= new touristPlacesModel;
        $place->pl_name   		= $request->input('pl_name');
        $place->pl_details 		= $request->input('pl_details');
        $place->pl_address 		= $request->input('pl_address');
        $place->pl_phone_number = $request->input('pl_phone_number');
        $place->pl_latitude 	= $request->input('pl_latitude');
        $place->pl_longitude 	= $request->input('pl_longitude');
        $place->pl_status 		= "Active";
        $place->user_id 		= $request->input('user_id');
        $place->save();
        $id_place = $this::GetIDLastPlace();
        return json_encode($id_place);
	}
}
