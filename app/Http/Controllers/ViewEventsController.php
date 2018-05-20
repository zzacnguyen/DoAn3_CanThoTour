<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\eventModel;
use App\SeenEventModel;

class ViewEventsController extends Controller
{
    public function isNotSeenEvent($id)
    {
                $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;

        $event = DB::table('vnt_events')
        ->select('vnt_events.service_id as id', 'vnt_events.event_name', 'vnt_images.id as image_id','vnt_images.image_details_1', 
                DB::raw('DATE_FORMAT(event_start, "%d-%m-%Y") as event_start'),
                DB::raw('DATE_FORMAT(event_end, "%d-%m-%Y") as event_end'),
                DB::raw('CASE WHEN user_id='. $id .' THEN 1 ELSE 0 END AS isseen')
            )
        ->join('vnt_vieweventuser', 'vnt_events.id', '=', 'vnt_vieweventuser.id_events')
        ->join('vnt_images', 'vnt_images.service_id', '=', 'vnt_events.service_id')
        ->whereYear('event_end', '>=', $year)
        ->whereDay('event_end', '>=',$day)
        ->whereMonth('event_end', '>=', $month)
        ->where('event_status','=', 1)
        ->groupBy('vnt_events.service_id','vnt_events.event_name', 'vnt_images.id', 'vnt_images.image_details_1', 'event_start', 'event_end', 'user_id' )
        // ->groupby('vnt_events.service_id')
        ->distinct()
        ->paginate(10);
        $encode=json_encode($event);
        return $encode;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function isSeenEvent($id)
    {
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        $events = DB::table('vnt_events')
        ->select('vnt_events.service_id as id', 'vnt_events.event_name', 'vnt_images.id as image_id','vnt_images.image_details_1', 
        DB::raw('DATE_FORMAT(event_start, "%d-%m-%Y") as event_start'),
        DB::raw('DATE_FORMAT(event_end, "%d-%m-%Y") as event_end'))
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_events.service_id')
        ->leftJoin('vnt_vieweventuser', 'vnt_vieweventuser.id_events', '=', 'vnt_events.id')
        ->whereYear('event_end', '>=', $year)
        ->whereDay('event_end', '>=',$day)
        ->whereMonth('event_end', '>=', $month)
        ->where('event_status','=', '1')
        ->where('vnt_vieweventuser.user_id', '=', $id)
        ->paginate(10);
        $encode=json_encode($events);
        return $encode;
    }
}
