<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PointController extends Controller
{
    public function AllPoint($id)
    {
    	$point_user = DB::table('vnt_point_user')
    	->select('point_now', 'point_exchanged', 'point_total')
    	->where('user_id', '=', $id)
    	->get();
    	return json_encode($point_user);
    }

}
