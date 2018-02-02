<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use app\visitorRatingsModel;
use Illuminate\Http\Request;

class Rating_Service_Controller extends Controller
{
    public function rating($id)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_users.username','vr_rating','vr_ratings_details', 'vr_title', 
            DB::raw('DATE_FORMAT(vnt_visitor_ratings.created_at,"%d-%m-%Y") as date_rating'))
        ->join('vnt_users', 'vnt_visitor_ratings.user_id', '=', 'vnt_users.id')
        ->where('vnt_visitor_ratings.service_id', $id)
        ->paginate(10);
        $encode=json_encode($rating);
        return $encode;
    }
}
