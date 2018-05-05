<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tripScheduleModel;
use DB;
class tripScheduleController extends Controller
{
    public function getListTripSchedule($user_id)
    {
    	$scheduleList = DB::table('vnt_tripschedule')
    	->select('id', 'trip_name', 'trip_startdate', 'trip_enddate')
    	->orderBy('id', 'DESC')
    	->paginate(10);
        $encode=json_encode($scheduleList);
        return $encode;
    }
    public function postTripSchedule(Request $request)
    {
    	$schedule = new tripScheduleModel();
    	$schedule->trip_name = $request->input('trip_name')  ;
    	$schedule->trip_startdate = $request->input('trip_startdate');
    	$schedule->trip_enddate = $request->input('trip_enddate');
    	$schedule->service_id = $request->input('service_id');
    	$schedule->user_id = $request->input('user_id');
    	if($schedule->save())
        {
            return json_encode("status:200");
        }
        else{
            return json_encode("status:500");
        }
    }

}
