<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\eventModel;
use App\ServicesModel;
use App\SeenEventModel;
class EventsController extends Controller
{

    /**
     * type_id = 1: event all user - cột user_id là người đăng sự kiện đó
     * type_id = 2: event a user - cột user_id là sự kiện riêng đối với user_id đó
     *  
     * @return \Illuminate\Http\Response
     */



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $events = new eventModel();
        $events->event_name=$request->input("event_name");
        $events->event_start=$request->input("event_start");
        $events->event_end=$request->input("event_end");
        $events->event_status=1;
        $events->type_id=$request->input("type_id");
        $events->service_id=$request->input("service_id");
        
        if($events->save()){
            return json_encode("status:200");            
        }
        else{
            return json_encode("status:500");   
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
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;

        $event = DB::table('vnt_events')
        ->select('vnt_events.service_id as id', 'vnt_events.id as id_event', 'vnt_events.event_name', 'vnt_images.id as image_id','vnt_images.image_details_1', 
                DB::raw('DATE_FORMAT(event_start, "%d-%m-%Y") as event_start'),
                DB::raw('DATE_FORMAT(event_end, "%d-%m-%Y") as event_end'),
                DB::raw('CASE WHEN EXISTS (SELECT vnt_vieweventuser.id FROM vnt_vieweventuser WHERE vnt_vieweventuser.user_id ='. $id .' AND vnt_events.id = vnt_vieweventuser.id_events) THEN 1 ELSE 0 END AS is_seen')
            )
        ->join('vnt_images', 'vnt_images.service_id', '=', 'vnt_events.service_id')
        ->whereYear('event_end', '>=', $year)
        ->whereDay('event_end', '>=',$day)
        ->whereMonth('event_end', '>=', $month)
        ->where('event_status','<>', -1)
        ->distinct()
        ->paginate(10);
        $encode=json_encode($event);
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

    public function add_event_web(Request $request)
    {
        $events = new eventModel();
        $events->event_name=$request->input("event_name");
        $events->event_start=$request->input("event_start");
        $events->event_end=$request->input("event_end");
        $events->event_status = $request->event_status;
        $events->type_id=$request->input("type_id");
        $events->service_id=$request->input("service_id");
        $events->user_id=$request->input("user_id");
        
        if($events->save()){
            $result['success'] = true;
            $result['error'] = null;
            return json_encode($result);            
        }
        else{
            $result['success'] = false;
            $result['error'] = -1;
            return json_encode($result);   
        }
    }

    /**
     * Load su kien theo loai.
     *
     * @param  int  $id nguoi dung
     */
    public function load_event($user_id){
        // thong tin event, da xem hay chua, loai hinh
        //
        $event_public = DB::table('vnt_events')
        ->select('vnt_events.service_id as id_sv', 'vnt_events.id as id_event', 'vnt_events.event_name', 'vnt_images.id as image_id','vnt_images.image_details_1', 'vnt_events.event_status', 'vnt_events.type_id', 
                DB::raw('DATE_FORMAT(event_start, "%d-%m-%Y") as event_start'),
                DB::raw('DATE_FORMAT(event_end, "%d-%m-%Y") as event_end'),
                'vnt_vieweventuser.user_id as seen','vnt_services.sv_types','event_user'
            )
        ->leftJoin('vnt_vieweventuser', 'vnt_events.id', '=', 'vnt_vieweventuser.id_events')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_events.service_id')
        ->join('vnt_services','vnt_events.service_id','=','vnt_services.id')
        ->where('event_status','<>', -1)
        ->where('vnt_events.type_id','=', 1)->orderBy('vnt_events.id','desc')->limit(10)->get();

        $event_user = DB::table('vnt_events')
                        ->leftJoin('vnt_vieweventuser', 'vnt_events.id', '=', 'vnt_vieweventuser.id_events')
                        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_events.service_id')
                        ->where('vnt_events.user_id',$user_id)
                        ->where('event_user', 1)
                        ->select('vnt_events.service_id as id_sv', 'vnt_events.id as id_event',  'vnt_events.event_name','vnt_events.user_id','vnt_events.event_start', 'vnt_events.event_end', 'vnt_images.id as image_id','vnt_images.image_details_1', 'vnt_events.event_status', 'vnt_events.type_id','vnt_vieweventuser.user_id as seen','event_user')
                        ->get();

        $data_event = array('event_public' => $event_public, 'event_user' => $event_user);
        return json_encode($data_event);
    }

    public function load_event_sv($id_sv){
        // $result = eventModel::where('service_id',$id_sv)
        //             ->where('type_id',1)->get();
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        $result = DB::table('vnt_events')
        ->select('vnt_events.service_id', 'vnt_events.id as id_event', 'vnt_events.event_name', 
                DB::raw('DATE_FORMAT(event_start, "%d-%m-%Y") as event_start'),
                DB::raw('DATE_FORMAT(event_end, "%d-%m-%Y") as event_end')
            )
        ->whereYear('event_end', '>=', $year)
        ->whereDay('event_end', '>=',$day)
        ->whereMonth('event_end', '>=', $month)
        ->where('service_id',$id_sv)
        ->get();

        return json_encode($result);
    }

    public function seen_event_user(Request $request){
        $event = new SeenEventModel;
        $event->user_id = $request->input('user_id');
        $event->id_events = $request->input('id_events');
        if($event->save())
        {
            return 1;
        }
        else{
            return -1;
        }
    }


    /**
     * khi người dùng click vào thông báo, chuyển trạng thái event_status = 1 - đã cũ
     * chỉ áp dụng cho event có type_id khác 1
     * @param id_event - array evens.id 
     */
    public function old_event_user($id_event){
        eventModel::where('id',$id_event)->where('event_user',1)
                        ->update(['event_status' => 1]);
        return 1;
    }
}
