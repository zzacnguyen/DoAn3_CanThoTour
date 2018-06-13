<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\typesModel;

class typeEvents extends Controller
{
    public function getAllEventType()
    {
    	$type = DB::table('vnt_types')
    	->select('id', 'type_name','type_status')
    	->orderBy('id','DESC')
    	->get();
        $encode = json_encode($type);
        return $encode;
    }

    public function postTypeEvent(Request $request)
    {
    	// return $request->all();
    	$type = new typesModel();
    	$type->type_name = $request->type_name;
    	$type->type_status = $request->type_status;
    	if ($type->save()) {
    		return 1;
    	}
    	else{return -1;}
    }
}
