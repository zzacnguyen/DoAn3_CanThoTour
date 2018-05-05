<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\typesModel;
use DB;
class typeEvents extends Controller
{
    public function getAllEventType()
    {
    	$type = DB::table('vnt_types')
    	->select('id', 'type_name')
    	->orderBy('id','DESC')
    	->where('type_status', '=', 1)
	    ->paginate(10);
        $encode=json_encode($type);
        return $encode;
    }
}
