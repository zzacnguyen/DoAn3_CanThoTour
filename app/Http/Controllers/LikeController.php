<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LikeController extends Controller
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
        $like = DB::table('vnt_likes')
        ->select('vnt_likes.service_id as id', 'hotel_name','entertainments_name', 'transport_name', 'sightseeing_name', 'eat_name', 'vnt_images.id AS image_id', 'vnt_images.image_details_1')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_likes.service_id')
        ->join('vnt_services', 'vnt_services.id', '=', 'vnt_likes.service_id')
        ->where('vnt_likes.user_id',$id)
        ->paginate (10);
        $encode=json_encode($like);
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
