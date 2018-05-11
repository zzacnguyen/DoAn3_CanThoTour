<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\enterpriseUserModel;
use App\partnerModel;
use App\moderatorModel;
use App\tourguideModel;
use App\contact_infoModel;
use Carbon;
class accountController extends Controller
{
    public function get_info_account()
    {
    	$info = $this::get_info_user();
        // dd($info);
    	if (!$this::check_login()) {
    		return view('VietNamTour.login');
    	}
    	else{
    		return view('VietNamTour.content.user.info', compact('info'));
    	}
    	
    }

    public function check_login()
    {
    	if (Session::has('login') && Session::get('login')) 
        {
            return 1;
        }
        else{ return -1; }
    }

    // public function get_info_user()
    // {
    // 	if (Session::has('login') && Session::get('login')) 
    //     {
    //         $result[] = Session::get('user_info');
    //         dd($result);
    //         foreach ($result as $value) {
    //         	$user_id = $value->user_id;
    //         }
            
    //         $result = contact_infoModel::where('user_id',$user_id)->first();
    //         // dd($result);
    //         // dd($info);
    //     }
    //     else{ $result = []; }
    //     return json_encode($result);
    // }

    public function get_info_user($user_id)
    {
        $result = contact_infoModel::where('user_id',$user_id)->first();
        return json_encode($result);
    }

    public function edit_user(Request $request,$id)
    {
        try{
            if($request->avatar)
            {
                contact_infoModel::where('user_id',$id)
         
                ->update(['contact_name'=>$request->name,'contact_phone'=>$request->phone,
                'contact_website'=>$request->website,'contact_email_address'=>$request->email,'contact_language'=>$request->lang,
                'contact_country'=>$request->address,'contact_avatar'=>$request->avatar]);
                return "ok";
            }
            else
            {
                contact_infoModel::where('user_id',$id)
         
                ->update(['contact_name'=>$request->name,'contact_phone'=>$request->phone,
                'contact_website'=>$request->website,'contact_email_address'=>$request->email,'contact_language'=>$request->lang,
                'contact_country'=>$request->address]);
                return "ok";
            }
         

        }
        catch(\Illuminate\Database\QueryException $ex){ 
            return "error";
        } 
    }

    public function get_quyen_dangky($userid) // lay ra nhung quyen nguoi dung co the dang ky
    {
        $result = DB::select('CALL login_info_phone(?)',array($userid));

        $quyen = array();
        foreach ($result as $result) {
            // admin cao nhất ko còn nâng quyền
            if ($result->admin != null) {
                array_push($quyen, 0);
            }
            else {
            // có thể nâng quyền enterprise
                if($result->enterprise == null){
                    array_push($quyen, 1);
                }
                // có thể nâng quyền tourguide
                if($result->tour_guide == null){
                    array_push($quyen, 2);
                }
                // có thể nâng quyền partner
                if($result->partner == null){
                    array_push($quyen, 3);
                }
                // có thể nâng quyền mod
                if($result->moderator == null){
                    array_push($quyen, 4);
                }
            }
                
        }
        return $quyen;      
    }

    public function get_quyen_user($userid) // lay ra nhung quyen nguoi dung dang co
    {
        $result = DB::select('CALL login_info_phone(?)',array($userid));
        // return $result;
        $quyen = array();
        foreach ($result as $result) {
            // 1 là doanh nghiệp
            if($result->enterprise != null && $result->active_enter == 1){
                array_push($quyen, 1);
            }
            // 2 là hdv
            if($result->tour_guide != null && $result->active_tour == 1){
                array_push($quyen, 2);
            }
            // 3 là ctv
            if($result->partner != null && $result->active_partner == 1){
                array_push($quyen, 3);
            }
            // 4 là mod
            if($result->moderator != null && $result->active_mod == 1){
                array_push($quyen, 4);
            }
            // 5 là admin
            if($result->admin != null){
                array_push($quyen, 5);
            }                
        }
        if ( empty($quyen)) {
            $quyen[] = 0;
        }
        return $quyen;      
    }

    public function get_quyen_dangxet_user($userid) // lay ra nhung quyen nguoi dung dang co
    {
        $result = DB::select('CALL login_info_phone(?)',array($userid));
        $quyen = array();
        foreach ($result as $result) {

            if($result->moderator != null && $result->active_mod == 1){
                array_push($quyen, 2);
            }
            if($result->partner != null && $result->active_partner == 1){
                array_push($quyen, 3);
            }
            if($result->enterprise != null && $result->active_enter == 1){
                array_push($quyen, 4);
            }
            if($result->tour_guide != null && $result->active_tour == 1){
                array_push($quyen, 5);
            }
                
        }
        if ( empty($quyen)) {
            $quyen[] = 0;
        }
        return $quyen;      
    }

    public function savequyendangky(Request $request,$id){ // 
        $quyen = (int)$request->quyen;
        // 1-moderator 2-partner 3-enterprise 4-tourguide
        $mytime = Carbon\Carbon::now();
        $datenow = $mytime->toDateTimeString();
        if ($quyen > 0 && $quyen <= 4) {
            switch ($quyen) {
                // enterprise
                case 1:
                    try
                    {
                        $mod = new enterpriseUserModel();
                        $mod->user_id = $id;
                        $mod->account_active = 1;
                        $mod->created_at = $datenow;
                        $mod->save();
                        return 1;
                    }
                    catch(\Illuminate\Database\QueryException $ex){ 
                        return -1;
                    }       
                break;
                // tourguide
                case 2:
                    try
                    {
                        $mod = new tourguideModel();
                        $mod->user_id = $id;
                        $mod->account_active = 1;
                        $mod->user_objective_details = "Đang cập nhật";
                        $mod->user_strengths_details = "Đang cập nhật";
                        $mod->created_at = $datenow;
                        $mod->save();
                        return 1;
                    }
                    catch(\Illuminate\Database\QueryException $ex){ 
                        return -1;
                    }       
                break;
                // partner
                case 3:
                    try
                    {
                        $mod = new partnerModel();
                        $mod->user_id = $id;
                        $mod->account_active = 1;
                        $mod->created_at = $datenow;
                        $mod->save();
                        return 1;
                    }
                    catch(\Illuminate\Database\QueryException $ex){ 
                        return -1;
                    }       
                break;
                // moderator
                case 4:
                    try
                    {
                        $mod = new moderatorModel();
                        $mod->user_id = $id;
                        $mod->account_active = 1;
                        $mod->created_at = $datenow;
                        $mod->save();
                        return 1;
                    }
                    catch(\Illuminate\Database\QueryException $ex){ 
                        return -1;
                    }       
                break;

                default:
                    return 0;
                    break;
            }
        }
        else{return 0;}
    }
}
