<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\visitorRatingsModel;
use App\PointDetailsModel;
use App\PointUserModel;
use App\servicesModel;

use Illuminate\Http\Request;

class Rating_Service_Controller extends Controller
{
    public function rating($id)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_user.username','vr_rating','vr_ratings_details', 'vr_title', 
            DB::raw('DATE_FORMAT(vnt_visitor_ratings.created_at,"%d-%m-%Y") as date_rating'))
        ->join('vnt_user', 'vnt_visitor_ratings.user_id', '=', 'vnt_user.user_id')
        ->where('vnt_visitor_ratings.service_id', $id)
        ->paginate(10);
        $encode=json_encode($rating);
        return $encode;
    }

    public function view_rating($id_danhgia)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_user.username','vr_rating','vr_ratings_details', 'vr_title', 
            DB::raw('DATE_FORMAT(vnt_visitor_ratings.created_at,"%d-%m-%Y") as date_rating'))
        ->join('vnt_user', 'vnt_visitor_ratings.user_id', '=', 'vnt_user.user_id')
        ->where('vnt_visitor_ratings.id', $id_danhgia)
        ->get();
        $encode=json_encode($rating);
        return $encode;
    }


    public function view_rating_by_user($id_user)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_user.username','vr_rating','vr_ratings_details', 'vr_title', 
            DB::raw('DATE_FORMAT(vnt_visitor_ratings.created_at,"%d-%m-%Y") as date_rating'))
        ->join('vnt_user', 'vnt_visitor_ratings.user_id', '=', 'vnt_user.user_id')
        ->orderBy('date_rating', 'DESC')
        ->where('vnt_visitor_ratings.user_id', $id_user)
        ->paginate(10);
        $encode=json_encode($rating);
        return $encode;
    }

    public function postRating(Request $request)
    {
        $rating                         = new visitorRatingsModel();
        $rating->service_id             = $request->input('service_id');
        $rating->user_id                = $request->input('user_id');
        $rating->vr_rating              = $request->input('vr_rating');
        $rating->vr_title               = $request->input('vr_title');
        $rating->vr_ratings_details     = $request->input('details');
        if($rating->save()){
            
            $rating_point = $request->input('vr_rating');

            $id = DB::table('vnt_visitor_ratings')
            ->select('id')
            ->where('service_id',$request->input('service_id'))
            ->where('user_id',$request->input('user_id'))
            ->get();
            
            foreach ($id as $value) {
                $tmp_id_rating = $value->id;
            }

            $service_id = $request->input('service_id');
            
            $user_id = DB::table('vnt_services')
            ->select('user_id', 'sv_counter_point')
            ->where('id', '=', $service_id)
            ->get();
            // return $user_id;
            $sv_counter_point1 = 0;
            foreach ($user_id as $value) {
                $user_id = $value->user_id;
                $sv_counter_point1 = $value->sv_counter_point;
            }

            $point_now = 0;
            $point_total = 0;
            $point_total_1 = 0;
            // return $user_id;
            $point = DB::table('vnt_point_user')
            ->select('point_now','point_exchanged', 'point_total')
            ->where('user_id', '=' ,$user_id)
            ->get();
            // return $point;
            $point_detail = new PointDetailsModel();
            $point_detail->rating_id = $tmp_id_rating;
            $point_detail->point_id = 3;
            $point_detail->point_user_id = $user_id;
            $point_detail->service_id = $service_id;
            $point_detail->save();

            foreach ($point as $value) {
                $point_now = $value->point_now;
                $point_total = $value->point_total;
            }
            $get_point_rating = DB::table('vnt_point')
            ->select('point_rate')
            ->where('id','=',3)
            ->get();
            foreach ($get_point_rating as $value) {
                $point_rate = $value->point_rate;                
            }
            $point_now_1 = $point_now  + ($point_rate*$rating_point);

            $point_total_1 = $point_total + ($point_rate*$rating_point);
            PointUserModel::where('user_id', $user_id)
            ->update(['point_now'=>$point_now_1*1, 'point_total'=>$point_total_1*1]);

            
            
            $sv_counter_point_1 = $sv_counter_point1  + ($point_rate*$rating_point);
            // return $sv_counter_point_1;
            servicesModel::where('id', $service_id)
            ->update(['sv_counter_point'=>($sv_counter_point_1)]);
            $encode=json_encode("status:200");
            return $encode;
        }
        else{
            $encode=json_encode("status:500");
            return $encode;
        }
    }

    public function putRating(Request $request, $id)
    {
        $rating                 = visitorRatingsModel::findOrFail($id);
        // $rating->service_id    = $request->input('service_id');
        // $rating->user_id = $request->input('user_id');
        $rating->vr_rating        = $request->input('rate');
        $rating->vr_title      = $request->input('title');
        $rating->vr_ratings_details     = $request->input('details');
        if($rating->save()){
            $encode=json_encode("status:200");
            return $encode;
        }
        else{
            $encode=json_encode("status:500");
            return $encode;
        }
    }    
}
