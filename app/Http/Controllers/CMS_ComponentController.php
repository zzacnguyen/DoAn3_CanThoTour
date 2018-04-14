<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Colection;
class CMS_ComponentController extends Controller
{
    public function _DISPLAY_LIST_ALL_USER()
    {
        $data = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
		->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
		return view('CMS.components.com_user.list_user', ['data'=>$data]);
    }


}
