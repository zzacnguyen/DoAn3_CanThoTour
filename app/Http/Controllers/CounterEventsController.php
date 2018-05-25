<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Colection;

class CounterEventsController extends Controller
{
    public function countEvent($id)
    {
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        $eventSeen = DB::table('vnt_events')
        ->select('id')
        ->whereYear('event_end', '>=', $year)
        ->whereDay('event_end', '>=',$day)
        ->whereMonth('event_end', '>=', $month)
        ->where('event_status','=', 1)
        ->count();

        $events = DB::table('vnt_vieweventuser')
        ->select('id_events')
        ->join('vnt_events', 'vnt_events.id', '=', 'vnt_vieweventuser.id_events')
        ->whereYear('event_end', '>=', $year)
        ->whereDay('event_end', '>=',$day)
        ->whereMonth('event_end', '>=', $month)
        ->where('user_id','=', $id)
        ->count();

        return  json_encode($eventSeen -  $events);
    }
    public function Counter($name)
    {

    }
}
