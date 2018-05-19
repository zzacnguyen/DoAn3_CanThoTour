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

class vnt_enterprise_userController extends Controller
{
    public function getServices($user_id)
    {

    	
        $service = DB::table('vnt_services')
        ->select(
            'vnt_services.id',
            'hotel_name',
            'sightseeing_name',
            'entertainments_name',
            'transport_name',
            'eat_name', 
            'vnt_transport.id as id_transport' ,
            'vnt_eating.id as id_eating' ,
            'vnt_hotels.id as id_hotel',
            'vnt_sightseeing.id as id_sightseeing',
            'vnt_entertainments.id as id_entertainment',
            DB::raw('AVG(vnt_visitor_ratings.vr_rating) as rating'),
            DB::raw('count(vnt_likes.id) as num_like'),
            DB::raw('count(vnt_share.id) as num_share'),
            'vnt_images.id as image_id',
            'vnt_images.image_details_1'
        )
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_likes', 'vnt_likes.service_id', '=','vnt_services.id')
        ->leftJoin('vnt_share', 'vnt_share.service_id', '=','vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_tourist_places', 'vnt_tourist_places.id', '=', 'vnt_services.tourist_places_id')
        ->leftjoin('vnt_visitor_ratings', 'vnt_visitor_ratings.service_id','=', 'vnt_services.id')
        ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
        ->join('vnt_user', 'vnt_user.user_id', '=' , 'vnt_tourist_places.user_id')
        ->join( 'vnt_enterprise_user','vnt_enterprise_user.user_id','=','vnt_user.user_id')
        ->where('vnt_enterprise_user.user_id', '=', $user_id)

        ->groupBy('vnt_services.id','hotel_name','entertainments_name','transport_name', 'sightseeing_name', 
                 'eat_name','vnt_images.id', 'vnt_images.image_details_1','id_transport' ,'id_eating' ,'id_hotel' ,'id_sightseeing',  'id_entertainment')
        
        ->get();
        return json_encode($service);
        // $date = Carbon::now();
        // $year_now = $date->year;
        // $month_now = $date->month;
        // $today = $date->day;
        
        
        // $type_events = DB::table('vnt_types')
        // ->select('type_name')
        // ->join('vnt_events','vnt_events.type_id','=','vnt_types.id')
        // ->join('vnt_services', 'vnt_events.service_id', '=', 'vnt_services.id')
        // ->whereYear('event_end', '>=', $year_now)
        // ->whereDay('event_end', '>=',$today)
        // ->whereMonth('event_end', '>=', $month_now)
        // ->where('vnt_services.id',$services_id)
        // ->orderBy('vnt_events.created_at', 'desc')->first();
         


        // $like_id = DB::table('vnt_likes')
        // ->select('vnt_likes.id as like_id')
        // ->where('service_id','=', $services_id)
        // ->where('vnt_likes.user_id','=', $user_id)
        // ->first();

        
        // $like_by_user = DB::table('vnt_likes')
        // ->select('vnt_likes.id as like_id','vnt_likes.user_id')
        // ->where('service_id','=', $services_id)
        // ->where('user_id','=', $user_id)
        // ->count();
        // if($like_by_user != 0)
        // {
        //     $like_tmp = 1;
        // }
        // else{
        //     $like_tmp = 0;
        // }

        

        // $countLike = DB::table('vnt_likes')
        // ->select('vnt_likes.id as like_id','vnt_likes.user_id')
        // ->where('service_id','=', $services_id)
        // ->count();

        // $rating_id = DB::table('vnt_visitor_ratings')
        // ->select('vnt_visitor_ratings.id as rating_id')
        // ->where('service_id', '=', $services_id)
        // ->where('vnt_visitor_ratings.user_id','=', $user_id)
        // ->first();

        // $rating_count = DB::table('vnt_visitor_ratings')
        // ->select('vnt_visitor_ratings.id as rating_id','vnt_visitor_ratings.user_id')
        // ->orderBy('vnt_visitor_ratings.id', 'DESC')
        // ->where('service_id', '=', $services_id)
        // ->where('vnt_visitor_ratings.user_id','=', $user_id)
        
        // ->count();
        // if($rating_count != 0)
        // {
        //     $rating_tmp = 1;
        // }
        // else{
        //     $rating_tmp = 0;
        // }


        // $merge[] = ["isLike"=>$like_tmp, "isRating"=>$rating_tmp,"idLike"=>$like_id, 
        // "idRating"=>$rating_id, "type_event"=>$type_events,"service"=>$service, "count_like"=>$countLike];  
        // $json_merge = json_encode($merge);
     


        
        // return $json_merge;

        // $encode=json_encode($services);
        // return $encode;
    }
    public function getTouristPlaces($month, $user_id)
    {
    	if($month == 0)
    	{
    		$dt = Carbon::now();
	        $month_select = $dt->month;
    	}
    	else
    	{
    		$month_select = $month;
    	}
        $places = DB::table('vnt_tourist_places')
        ->select('vnt_tourist_places.id','pl_name', 'pl_details','pl_address','pl_phone_number','pl_latitude',  'pl_longitude', 'id_ward','district_name','province_city_name', 'province_city_name',
        DB::raw('DATE_FORMAT(vnt_tourist_places.created_at, "%d-%m-%Y") as created_at'))
        ->join('vnt_ward', 'vnt_ward.id_ward', '=', 'vnt_ward.id')
        ->join('vnt_district', 'vnt_district.province_city_id', '=', 'vnt_province_city.id')
        ->whereMonth('vnt_tourist_places.created_at', '=', $month_select)
        ->where('pl_status','=', 1)
        ->where('vnt_tourist_places.user_id', '=', $user_id)
        ->orderBy('vnt_tourist_places.id', 'DESC')
        ->paginate(10);
        $encode=json_encode($places);
        return $encode;
    }
    public function getTaskList($id)
    {
        //Link : /public/get-task-list/id_user
        $task_list = DB::table('vnt_task')
        ->select( DB::raw('DATE_FORMAT(date_start, "%d-%m-%Y") as date_start'),
            'task_title', 'vnt_task.id', 'user.username as assigner')
        ->join('vnt_user as user', 'user.user_id', '=', 'vnt_task.user_id')
        ->join('vnt_tour_guide as tourguide','user.user_id', '=', 'tourguide.user_id')
        ->where('status', '=', 1)
        ->orderBy('vnt_task.id', 'desc')
        ->limit(10)
        ->get();
        return json_encode($task_list);
        
    }
}
