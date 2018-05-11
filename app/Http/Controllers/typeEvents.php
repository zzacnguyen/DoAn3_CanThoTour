<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class typeEvents extends Controller
{
    public function getAllEventType()
    {
    	$type = DB::table('vnt_types')
    	->select('id', 'type_name')
    	->orderBy('id','DESC')
	    ->paginate(10);
        $encode=json_encode($type);
        return $encode;
    }
}
