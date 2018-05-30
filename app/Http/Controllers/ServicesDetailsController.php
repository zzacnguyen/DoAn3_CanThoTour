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
use App\entertainmentsModel;
use Carbon\Carbon;

class ServicesDetailsController extends Controller
{
    public function showDetails($services_id, $user_id)
    {
        $counter_view =DB::table('vnt_services')
        ->select('vnt_services.sv_counter_view')
        ->where('vnt_services.id', $services_id)
        ->get();
        $tmp_count = 0;
        foreach ($counter_view as $value) {
            $tmp_count = $value->sv_counter_view;
        }

        servicesModel::where('vnt_services.id',$services_id)
        ->update(['sv_counter_view'=>($tmp_count+1)]);
        

        $service = DB::table('vnt_services')
        ->select(
            'vnt_services.id',
            'hotel_name', 
            'sightseeing_name', 
            'entertainments_name', 
            'transport_name', 
            'eat_name', 
            'sv_website', 
            'sv_description', 
            'sv_open', 
            'sv_close', 
            'sv_lowest_price', 
            'sv_highest_price', 
            'pl_phone_number', 
            'pl_address', 
            DB::raw('AVG(vnt_visitor_ratings.vr_rating) as rating'), 
            'pl_latitude', 
            'pl_longitude',
            'pl_name'
            // 'vnt_transport.id as id_transport' ,
            // 'vnt_eating.id as id_eating' ,
            // 'vnt_hotels.id as id_hotel',
            // 'vnt_sightseeing.id as id_sightseeing',
            // 'vnt_entertainments.id as id_entertainment'

        )
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_tourist_places', 'vnt_tourist_places.id', '=', 'vnt_services.tourist_places_id')
        ->leftjoin('vnt_visitor_ratings', 'vnt_visitor_ratings.service_id','=', 'vnt_services.id')
        ->where('vnt_services.id', $services_id)
        ->where('sv_status', '=' , 1)
        ->where('vnt_tourist_places.pl_status', '=' , 1)
        ->groupBy('vnt_services.id','hotel_name','entertainments_name','transport_name', 'sightseeing_name', 
                 'eat_name', 'sv_website', 'sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'vnt_tourist_places.pl_phone_number',
                 'vnt_tourist_places.pl_address', 'vnt_tourist_places.pl_latitude', 'vnt_tourist_places.pl_longitude','pl_name'
                 // 'id_transport' ,'id_eating' ,'id_hotel' ,'id_sightseeing',  'id_entertainment'
             )
        
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
        ->where('vnt_services.id',$services_id)
        ->orderBy('vnt_events.created_at', 'desc')->first();
         


        $like_id = DB::table('vnt_likes')
        ->select('vnt_likes.id as like_id')
        ->where('service_id','=', $services_id)
        ->where('vnt_likes.user_id','=', $user_id)
        ->first();

        
        $like_by_user = DB::table('vnt_likes')
        ->select('vnt_likes.id as like_id','vnt_likes.user_id')
        ->where('service_id','=', $services_id)
        ->where('user_id','=', $user_id)
        ->count();
        if($like_by_user != 0)
        {
            $like_tmp = 1;
        }
        else{
            $like_tmp = 0;
        }

        

        $countLike = DB::table('vnt_likes')
        ->select('vnt_likes.id as like_id','vnt_likes.user_id')
        ->where('service_id','=', $services_id)
        ->count();

        $rating_id = DB::table('vnt_visitor_ratings')
        ->select('vnt_visitor_ratings.id as rating_id')
        ->where('service_id', '=', $services_id)
        ->where('vnt_visitor_ratings.user_id','=', $user_id)
        ->first();

        $rating_count = DB::table('vnt_visitor_ratings')
        ->select('vnt_visitor_ratings.id as rating_id','vnt_visitor_ratings.user_id')
        ->orderBy('vnt_visitor_ratings.id', 'DESC')
        ->where('service_id', '=', $services_id)
        ->where('vnt_visitor_ratings.user_id','=', $user_id)
        
        ->count();
        if($rating_count != 0)
        {
            $rating_tmp = 1;
        }
        else{
            $rating_tmp = 0;
        }


        $merge[] = ["isLike"=>$like_tmp, "isRating"=>$rating_tmp,"idLike"=>$like_id, 
        "idRating"=>$rating_id, "type_event"=>$type_events,"service"=>$service, "count_like"=>$countLike];  
        $json_merge = json_encode($merge);
     


        
        return $json_merge;
    }

    public function EditServices(Request $request, $id, $user_id)
    {
        $iD_user_check = DB::table('vnt_services')
            ->select('user_id', 'sv_status')->where('id', '=', $id)->get();

        $status = $iD_user_check[0]->sv_status;
        $checkedid =  $iD_user_check[0]->user_id;
//
//
//
        $id_place = $request->input('id_place');
//        return $request->input('user_id');
        if ($user_id == $checkedid) {
            $user_id = $user_id;
            $vnt_services = servicesModel::findOrFail($id);
            $vnt_services->sv_description = $request->input('sv_description');
            $vnt_services->sv_open = $request->input('sv_open');
            $vnt_services->sv_close = $request->input('sv_close');
            $vnt_services->sv_highest_price = $request->input('sv_highest_price');
            $vnt_services->sv_lowest_price = $request->input('sv_lowest_price');
            $vnt_services->sv_phone_number = $request->input('sv_phone_number');
            $vnt_services->sv_content = "Đang cập nhật";
            $vnt_services->sv_status = $status;
            $vnt_services->sv_types = $request->input('sv_types');
            $vnt_services->tourist_places_id = $id_place;
            $vnt_services->sv_counter_view = 0;
            $vnt_services->sv_counter_point = 0;
            $vnt_services->user_id = $user_id;
            $vnt_services->sv_website = $request->input('sv_website');
            $vnt_services->save();
            $type_services = $request->input('sv_types');
            if ($type_services == 1) {
                $eat_name = $request->input('eat_name');
                try {
                    eatingModel::where('service_id', $id)
                        ->update(['eat_name' => $eat_name]);
                    return json_encode("status:200");
                } catch (Exception $e) {
                    return json_encode("status:500");
                }
            }
            else if ($type_services == 2) {
                $hotel_name = $request->input('hotel_name');
                $hotel_number_star = $request->input('hotel_number_star');
                try {
                    hotelModel::where('service_id', $id)
                        ->update(['hotel_name' => $hotel_name, 'hotel_number_star' => $hotel_number_star]);
                    return json_encode("status:200");
                } catch (Exception $e) {
                    return json_encode("status:500");
                }
            }
            else if($type_services == 3){
                $transport_name = $request->input('transport_name');
                $transport_status = 1;
                try {
                    transportModel::where('service_id', $id)
                        ->update(['transport_name' => $transport_name]);
                    return json_encode("status:200");
                } catch (Exception $e) {
                    return json_encode("status:500");
                }
            }
            else if($type_services == 4){
                $sightseeing_name = $request->input('sightseeing_name');
                try {
                    sightseeingModel::where('service_id', $id)
                        ->update(['sightseeing_name' => $sightseeing_name]);
                    return json_encode("status:200");
                } catch (Exception $e) {
                    return json_encode("status:500");
                }
            }
            else if($type_services == 5){
                $entertainments_name = $request->input('entertainments_name');
                try {
                    entertainmentsModel::where('service_id', $id)
                        ->update(['entertainments_name' => $entertainments_name]);
                    return json_encode("status:200");
                } catch (Exception $e) {
                    return json_encode("status:500");
                }
            }
        }
        else{
            return "status:500";
        }
    }

}
