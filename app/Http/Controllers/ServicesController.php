<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $encode=json_encode($dich_vu);
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
        //
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
        ->select('vnt_services.id','hotel_name','sightseeing_name','entertainments_name', 'transport_name', 'hotel_website',
                 'eat_name','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'pl_phone_number',
                 'pl_address', DB::raw('AVG(vnt_visitor_ratings.vr_rating) as rating'),
                 'pl_latitude', 'pl_longitude'
                 )
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'dlct_anuong.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_tourist_places', 'vnt_tourist_places.id', '=', 'vnt_services.dd_iddiadiem')
        ->leftjoin('vnt_visitor_ratings', 'vnt_visitor_ratings.service_id','=', 'vnt_services.id')
        
        ->where('vnt_services.id', $id)
        ->groupBy('vnt_services.id','hotel_name','entertainments_name','pt_tenphuongtien', 'sightseeing_name', 'hotel_website',
                 'eat_name','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'vnt_tourist_places.pl_phone_number',
                 'vnt_tourist_places.pl_address', 'vnt_tourist_places.pl_latitude', 'vnt_tourist_places.pl_longitude')
        
        ->get();
        $date = Carbon::now();
        $year_now = $date->year;
        $month_now = $date->month;
        $today = $date->day;
        
        
        $type_events = DB::table('vnt_types')
        ->select('type_name')
        ->join('vnt_events','vnt_events.lhsk_idloaihinhsukien','=','dlct_loaihinhsukien.id')
        ->join('dlct_dichvu', 'vnt_events.service_id', '=', 'type_id.id')
        ->whereYear('event_end', '>=', $year_now)
        ->whereDay('event_end', '>=',$today)
        ->whereMonth('event_end', '>=', $month_now)
        ->where('dlct_dichvu.id',$id)
        
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
