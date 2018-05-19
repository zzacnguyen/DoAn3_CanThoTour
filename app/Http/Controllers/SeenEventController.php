<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\eventModel;
use App\SeenEventModel;

class SeenEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $event = new SeenEventModel;
        $event->user_id = $request->input('user_id');
        $event->id_events = $request->input('id_events');
        if($event->save())
        {
            return json_encode("status:200");
        }
        else{
            return json_encode("status:500");
        }
    }

    /**
     * Display the specified resource.
     * Lấy sự kiện người dùng đã xem
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = DB::table('vnt_vieweventuser')
        ->select('vnt_vieweventuser.id as id_view', 'vnt_events.event_name', 'event_start', 'event_end' )
        ->join('vnt_user', 'vnt_user.user_id', '=', 'vnt_vieweventuser.user_id')
        ->join('vnt_events', 'vnt_events.id', '=', 'vnt_vieweventuser.id_events')
        ->where('vnt_user.user_id', '=', $id)
        ->paginate(10);
        return json_encode($event);
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
