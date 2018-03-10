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

    public function AddPlace(Request $request)
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
        return json_encode("id_place:".$id_place);
	}
    public function AddServices(Request $request, $id_place)
    {
        $vnt_services                 = new servicesModel;
        $vnt_services->sv_description   = $request->input('sv_description');
        $vnt_services->sv_open    = $request->input('sv_open');
        $vnt_services->sv_close  = $request->input('sv_close');
        $vnt_services->sv_highest_price  = $request->input('sv_highest_price');
        $vnt_services->sv_lowest_price = $request->input('sv_lowest_price');
        $vnt_services->sv_phone_number   = $request->input('sv_phone_number');
        $vnt_services->sv_status   = "Active";
        $vnt_services->sv_types   = $request->input('sv_types');
        $vnt_services->tourist_places_id   =$id_place;
        $vnt_services->save();
        $lastServices = DB::table('vnt_services')->orderBy('id', 'desc')->first();
        $convert = (array)$lastServices;
        $id_service =  $convert['id'];
        $id_type =  $convert['sv_types'];

        if($id_type == 1)
        {
            $vnt_eating = new eatingModel;
            $vnt_eating->eat_name =  $request->input('eat_name');
            $vnt_eating->eat_status =  "Active";
            $vnt_eating->service_id =  $id_service;
            if($vnt_eating->save()){
                return json_encode("id_service:".$id_service);
            }
            else
            {
                return json_encode("status:500");
            }

        }
        else if($id_type == 2)
        {
            $vnt_hotels = new hotelsModel;
            $vnt_hotels->hotel_name =  $request->input('hotel_name');
            $vnt_hotels->hotel_website =  $request->input('hotel_website');
            $vnt_hotels->hotel_number_star =  $request->input('hotel_number_star');
            $vnt_hotels->hotel_status =  "Active";
            $vnt_hotels->service_id =  $id_service;
            if($vnt_hotels->save()){
                return json_encode("id_service:".$id_service);
            }
            else
            {
                return json_encode("status:500");
            }
        }
        else if($id_type == 3)
        {
            $vnt_transport = new transportModel;
            $vnt_transport->transport_name =  $request->input('transport_name');
            $vnt_transport->transport_status =  "Active";
            $vnt_transport->service_id =  $id_service;
            if($vnt_transport->save()){
                return json_encode("id_service:".$id_service);
            }
            else
            {
                return json_encode("status:500");
            }
        }
        else if($id_type == 4)
        {
            $vnt_sightseeing = new sightseeingModel;
            $vnt_sightseeing->sightseeing_name =  $request->input('sightseeing_name');
            $vnt_sightseeing->sightseeing_status     =  "Active";
            $vnt_sightseeing->service_id =  $id_service;
            if($vnt_sightseeing->save()){
                return json_encode("id_service:".$id_service);
            }
            else
            {
                return json_encode("status:500");
            }
        }
        else if($id_type == 5)
        {
            $vnt_entertainments = new sightseeingModel;
            $vnt_entertainments->entertainments_name =  $request->input('entertainments_name');
            $vnt_entertainments->entertainments_status       =  "Active";
            $vnt_entertainments->service_id =  $id_service;
            if($vnt_entertainments->save()){
                return json_encode("id_service:".$id_service);
            }
            else
            {
                return json_encode("status:500");
            }
        }
    }
}
