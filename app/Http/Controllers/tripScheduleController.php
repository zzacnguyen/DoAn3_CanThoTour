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
        $list_services = DB::table('vnt_tripschedule_details')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_tripschedule_details.service_id')
        ->leftJoin('vnt_services', 'vnt_services.id', '=', 'vnt_tripschedule_details.service_id' )
        ->leftJoin('vnt_tripschedule', 'vnt_tripschedule.id', '=', 'vnt_tripschedule_details.trip_id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->select('vnt_services.id', 'hotel_name', 'sightseeing_name', 'entertainments_name', 'transport_name', 'eat_name', 'vnt_images.id AS image_id','vnt_images.image_details_1')
        ->where('vnt_tripschedule_details.trip_id', '=', $id)
        ->paginate(10);
  
        $encode=json_encode($list_services);
        return $encode;
    }
    public function postTripSchedule(Request $request, $user_id)
    {
    	$schedule = new tripScheduleModel();
    	$schedule->trip_name = $request->input('trip_name')  ;
    	$schedule->trip_startdate = $request->input('trip_startdate');
    	$schedule->trip_enddate = $request->input('trip_enddate');
    	$schedule->user_id = $user_id;
    	if($schedule->save())
        {
            return json_encode("status:200");
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


    public function getOneTripSchedule($schedule_id)
    {
        // return "lam";
        // $result = tripScheduleModel::where('id','=',$schedule_id);
        // $result = tripScheduleModel::all();
        $result = DB::select("SELECT * FROM `vnt_tripschedule` WHERE id = '$schedule_id'");
        return json_encode($result);
    }

    public function delete_DetailSchedule($schedule_id)
    {
        $flight = tripScheduleDetailsModel::find($schedule_id);
        
        if ($flight->delete()) {
            return json_encode("status:200");
        }
        else{
            return json_encode("status:500");
        }
    }   

    public function getDetailTripSchedule_web($id)
    {
        $list_services = DB::table('vnt_tripschedule_details')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_tripschedule_details.service_id')
        ->leftJoin('vnt_services', 'vnt_services.id', '=', 'vnt_tripschedule_details.service_id' )
        ->leftJoin('vnt_tripschedule', 'vnt_tripschedule.id', '=', 'vnt_tripschedule_details.trip_id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->select('vnt_services.id','vnt_tripschedule_details.id as id_detail', 'hotel_name', 'sightseeing_name', 'entertainments_name', 'transport_name', 'eat_name', 'vnt_images.id AS image_id','vnt_images.image_details_1')
        ->where('vnt_tripschedule_details.trip_id', '=', $id)
        ->paginate(10);
  
        $encode=json_encode($list_services);
        return $encode;
    } 


    public function getListTripSchedule_web_type($user_id,$type) // lay ra danh sach lich trinh da ket thuc hay chua
    {
        // 1 ket thuc; 0- chua ket thuc
        if ($type == 1) {
            $scheduleList = DB::select("select * from vnt_tripschedule WHERE trip_status=0 AND user_id = '$user_id' ORDER BY trip_startdate ASC");
        }
        else{
            $scheduleList = DB::select("select * from vnt_tripschedule WHERE trip_status=1 AND user_id = '$user_id' ORDER BY trip_startdate ASC");
        }
        return json_encode($scheduleList);
    }

    public function get_idtripschedule_web(){
        $id = tripScheduleModel::max('id');
        return $id;
    }


    public function delete_All_detailSchedule_web($id){
        $result = tripScheduleDetailsModel::where('trip_id',$id)->delete();
        if ($result) {
            return json_encode("status:200");
        }
        else{
            return json_encode("status:500");
        }
    }

    public function delete_Schedule($id){
        $result = tripScheduleModel::where('id',$id)->delete();
        if ($result) {
            return json_encode("status:200");
        }
        else{
            return json_encode("status:500");
        }
    }

    public function edit_Schedule(Request $request)
    {
        try {
            tripScheduleModel::where('id',$request->id)
                                ->update(
                                [
                                    'trip_name' => $request->trip_name,
                                    'trip_startdate' => $request->trip_startdate, 
                                    'trip_enddate' => $request->trip_enddate
                                ]);
            return 1;
        } catch (Exception $e) {
            return -1;
        }
            
    }

}
