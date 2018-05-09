<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tripScheduleModel;
use App\tripScheduleDetailsModel;

use DB;
class tripScheduleController extends Controller
{
 	public function getListTripSchedule($user_id)
    {
    	$scheduleList = DB::table('vnt_tripschedule')
    	->select('id', 'trip_name', 'trip_startdate', 'trip_enddate')
    	->orderBy('id', 'DESC')
    	->where('vnt_tripschedule.user_id', '=', $user_id)
    	->paginate(10);
        $encode=json_encode($scheduleList);
        return $encode;
    }
    public function getDetailTripSchedule($id)
    {
        $schedule = DB::table('vnt_tripschedule')
        ->select('id', 'trip_name', 'trip_startdate', 'trip_enddate')
        ->orderBy('id', 'DESC')
        ->where('vnt_tripschedule.id', '=', $id)
        ->get();

        $list_services = DB::table('vnt_tripschedule_details')
        ->leftJoin('vnt_services', 'vnt_services.id', '=', 'vnt_tripschedule_details.service_id' )
        ->leftJoin('vnt_tripschedule', 'vnt_tripschedule.id', '=', 'vnt_tripschedule_details.trip_id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->select('vnt_services.id', 'hotel_name', 'sightseeing_name', 'entertainments_name', 'transport_name', 'eat_name' )
        ->where('vnt_tripschedule_details.trip_id', '=', $id)
        ->get();

        $merge[] = ["schedule"=>$schedule, "list_services"=>$list_services];  
        $encode=json_encode($merge);
        return $encode;
    }
    public function postTripSchedule(Request $request, $user_id)
    {
    	$schedule = new tripScheduleModel();
    	$schedule->trip_name = $request->input('trip_name')  ;
    	$schedule->trip_startdate = $request->input('trip_startdate');
    	$schedule->trip_enddate = $request->input('trip_enddate');
    	$schedule->service_id = $request->input('service_id');
    	$schedule->user_id = $user_id;
    	if($schedule->save())
        {
	        $tripSchedule = DB::table('vnt_tripschedule')
	    	->select('id')
	    	->orderBy('id', 'DESC')
	    	->limit(1)
            ->get();
            return json_encode($tripSchedule);
        }
        else{
            return json_encode("status:500");
        }
    }
    public function postTripScheduleDetail(Request $request, $schedule_id)
    {
        $schedule = new tripScheduleDetailsModel();
        $schedule->service_id = $request->input('service_id') ;
        $schedule->trip_id = $schedule_id;
        if($schedule->save())
        {
            return json_encode("status:200");
        }
        else{
            return json_encode("status:500");
        }
    }
}
