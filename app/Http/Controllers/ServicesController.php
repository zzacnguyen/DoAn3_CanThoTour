<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\servicesModel;
use App\touristPlacesModel;

use App\imagesModel;
use App\eatingModel;
use App\sightseeingModel;
use App\transportModel;
use App\hotelsModel;
use Carbon\Carbon;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('vnt_services')
        ->select('vnt_services.id','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price',  'tourist_places_id', 'sv_types')
        ->paginate(10);
        $encode=json_encode($services);
        return $encode;
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vnt_services                 = new servicesModel;
        $vnt_services->sv_description   = $request->input('sv_description');
        $vnt_services->sv_open   = $request->input('sv_open');
        $vnt_services->sv_close  = $request->input('sv_close');
        $vnt_services->sv_highest_price  = $request->input('sv_highest_price');
        $vnt_services->sv_lowest_price = $request->input('sv_lowest_price');
        $vnt_services->sv_phone_number   = $request->input('sv_phone_number');
        $vnt_services->sv_status   = "Active";
        $vnt_services->sv_types   = $request->input('sv_types');
        $vnt_services->tourist_places_id   = $request->input('tourist_places_id');
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
                    return json_encode("id_service:".$id_service);            }
            else
            {
                return json_encode("status:500");
            }
        }
        else if($id_type == 4)
        {
            $vnt_user_sightseeing = new sightseeingModel;
            $vnt_user_sightseeing->sightseeing_name =  $request->input('sightseeing_name');
            $vnt_user_sightseeing->sightseeing_status	 =  "Active";
            $vnt_user_sightseeing->service_id =  $id_service;
            if($vnt_user_sightseeing->save()){
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
            $vnt_entertainments->entertainments_status		 =  "Active";
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = DB::table('vnt_services')
        ->select('vnt_services.id','hotel_name','sightseeing_name','entertainments_name', 'transport_name', 
                 'eat_name','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'pl_phone_number',
                 'pl_address', DB::raw('AVG(vnt_visitor_ratings.vr_rating) as rating'),
                 'pl_latitude', 'pl_longitude','pl_name'
                 )
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertaiments', 'vnt_entertaiments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_user_sightseeing', 'vnt_user_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_tourist_places', 'vnt_tourist_places.id', '=', 'vnt_services.tourist_places_id')
        ->leftjoin('vnt_visitor_ratings', 'vnt_visitor_ratings.service_id','=', 'vnt_services.id')
        
        ->where('vnt_services.id', $id)
        ->groupBy('vnt_services.id','hotel_name','entertainments_name','transport_name', 'sightseeing_name', 
                 'eat_name','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'vnt_tourist_places.pl_phone_number',
                 'vnt_tourist_places.pl_address', 'vnt_tourist_places.pl_latitude', 'vnt_tourist_places.pl_longitude','pl_name')
        
        ->get();
        $date = Carbon::now();
        $year_now = $date->year;
        $month_now = $date->month;
        $today = $date->day;
        
        
        $type_events = DB::table('vnt_types')
        ->select('type_name')
        ->join('vnt_events','vnt_events.type_id','=','vnt_types.id')
        ->join('vnt_services', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->whereYear('event_end', '>=', $year_now)
        ->whereDay('event_end', '>=',$today)
        ->whereMonth('event_end', '>=', $month_now)
        ->where('vnt_services.id',$id)
        
        ->orderBy('vnt_events.created_at', 'desc')->first();
         


        $like = DB::table('vnt_likes')
        ->select('vnt_likes.id as like_id','vnt_likes.user_id')
        ->where('service_id','=', $id)
        ->get();

        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_visitor_ratings.id as id_rating','vnt_visitor_ratings.user_id')
        ->where('service_id', '=', $id)
        
        ->get();
        


        $merge[] = ["like"=>$like];  
        $merge2[]= ["rating"=>$rating];
        $merge3[] = ["service"=>$service];
        $merge4[]=["type_event"=>$type_events];
        $merge5[] = array_merge($merge, $merge2, $merge3,$merge4 );
        $tmp = json_encode($merge5);
        $str_find_1 = '[[{';
        $str_find_2 = '}]]';
        $str_replace_1 = '[{';
        $str_replace_2 = '}]';
            
        $result_1 = str_replace($str_find_1, $str_replace_1,$tmp);
        $result_2 = str_replace($str_find_2, $str_replace_2,$result_1);
        return $result_2;
        $encode = json_decode($service);
        return $encode;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
