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
use App\touristPlacesModel as tp;
use App\provincecityModel as city;
use App\districtModel;
use App\wardModel;
use App\servicesModel;
use App\eatingModel;
use App\hotelsModel;
use App\transportModel;
use App\sightseeingModel;
use App\entertainmentsModel;
use App\imagesModel;
use App\usersModel;
use Carbon\Carbon;
use Hash;
use App\eventModel;
use App\userSearchModel;
use App\ImagesController;
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

    public function getInfoUserMobile($user_id)
    {
        $tour = tourguideModel::where('user_id',$user_id)
                ->select('user_objective_details','user_strengths_details')->first();
        $result['data'] = contact_infoModel::where('user_id',$user_id)
                    ->select('contact_name','contact_phone','contact_website','contact_email_address','contact_avatar','contact_language','contact_country')
                    ->first();
        if ($tour != null) {
            $result['tourguide'] = $tour;
        }   
        
        return json_encode($result);
    }


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


    public function editUserMobile(Request $request,$id)
    {
        try{
            if($request->tourguide)
            {
                contact_infoModel::where('user_id',$id)
         
                ->update([
                    'contact_name'=>$request->contact_name,
                    'contact_phone'=>$request->contact_phone,
                    'contact_website'=>$request->contact_website,
                    'contact_email_address'=>$request->contact_email_address,
                    'contact_language'=>$request->contact_language,
                    'contact_country'=>$request->contact_country]);

                tourguideModel::where('user_id',$id)->update([
                    'user_objective_details'=>$request->user_objective_details,
                    'user_strengths_details'=>$request->user_strengths_details
                ]);

                return 1;
            }
            else
            {

                $info = contact_infoModel::where('user_id',$id)->first();

                if ($info != null) {
                    contact_infoModel::where('user_id',$id)
             
                    ->update([
                        'contact_name'=>$request->contact_name,
                        'contact_phone'=>$request->contact_phone,
                        'contact_website'=>$request->contact_website,
                        'contact_email_address'=>$request->contact_email_address,
                        'contact_language'=>$request->contact_language,
                        'contact_country'=>$request->contact_country]);
                    return 1;
                }
                else
                {
                    $contact = new contact_infoModel;
                    $contact->user_id = $id;
                    $contact->contact_name = $request->contact_name;
                    $contact->contact_phone = $request->contact_phone;
                    $contact->contact_website = $request->contact_website;
                    $contact->contact_email_address = $request->contact_email_address;
                    $contact->contact_language = $request->contact_language;
                    $contact->contact_country = $request->contact_country;
                    if ($contact->save()) {
                        return 1;
                    }
                    else{
                        return -1;
                    }

                }   
            }
        }
        catch(\Illuminate\Database\QueryException $ex){ 
            return -1;
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
                // if($result->partner == null){
                //     array_push($quyen, 3);
                // }
                // có thể nâng quyền mod
                // if($result->moderator == null){
                //     array_push($quyen, 4);
                // }
            }
                
        }
        return $quyen;      
    }

    public function get_quyen_dangky_moi($userid) // lay ra nhung quyen nguoi dung co the dang ky
    {
        $result = DB::select('CALL login_info_phone(?)',array($userid));

        foreach ($result as $result) {
            // admin cao nhất ko còn nâng quyền
            if ($result->admin != null || $result->moderator != null) {
                $quyen[] = array('quyen'=>0);
            }
            else {
            // có thể nâng quyền enterprise
                if($result->enterprise == null){
                    $quyen[] = array('quyen'=>1);
                }
                // có thể nâng quyền tourguide
                if($result->tour_guide == null){
                    $quyen[] = array('quyen'=>2);
                }
                // có thể nâng quyền partner
                if($result->partner == null){
                    $quyen[] = array('quyen'=>3);
                }
                // có thể nâng quyền mod
                if($result->moderator == null){
                    $quyen[] = array('quyen'=>4);
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

    public function get_quyen_userList($userid) // lay ra nhung quyen nguoi dung dang co
    {
        $result = DB::select('CALL login_info_phone(?)',array($userid));
        // return $result;
        $quyen = array();
        foreach ($result as $result) {
            // 1 là doanh nghiệp
            if($result->enterprise != null && $result->active_enter == 1){
                $quyen[] = array('quyen'=>'Doanh nghiệp','active'=>1);
            }else{$quyen[] = array('quyen'=>'Doanh nghiệp','active'=>0);}

            // 2 là hdv
            if($result->tour_guide != null && $result->active_tour == 1){
                $quyen[] = array('quyen'=>'Hướng dẫn viên du lịch','active'=>1);
            }else{$quyen[] = array('quyen'=>'Hướng dẫn viên du lịch','active'=>0);}

            // 3 là ctv
            if($result->partner != null && $result->active_partner == 1){
                $quyen[] = array('quyen'=>'Cộng tác viên','active'=>1);
            }else{$quyen[] = array('quyen'=>'Cộng tác viên','active'=>0);}

            // 4 là mod
            if($result->moderator != null && $result->active_mod == 1){
                $quyen[] = array('quyen'=>'moderator','active'=>1);
            }else{$quyen[] = array('quyen'=>'moderator','active'=>0);}

            // 5 là admin
            if($result->admin != null){
                $quyen[] = array('quyen'=>'admin','active'=>1);
            }else{$quyen[] = array('quyen'=>'admin','active'=>0);}                
        }
        if ( empty($quyen)) {
            $quyen[] = 0;
        }
        return $quyen;      
    }

    public function get_quyen_dangxet_userList($userid) // lay ra nhung quyen nguoi dung dang co
    {
        $result = DB::select('CALL login_info_phone(?)',array($userid));
        $quyen = array();
        foreach ($result as $result) {

            if($result->moderator != null && $result->active_mod == 0){
                array_push($quyen, 2);
            }
            if($result->partner != null && $result->active_partner == 0){
                array_push($quyen, 3);
            }
            if($result->enterprise != null && $result->active_enter == 0){
                array_push($quyen, 4);
            }
            if($result->tour_guide != null && $result->active_tour == 0){
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

    public function SaveUpgradeLevelUser(Request $request,$id){ //
        // return  $request->all();
        $quyen = (int)$request->quyen;
        // 1-moderator 2-partner 3-enterprise 4-tourguide
        $mytime = Carbon::now();
        $datenow = $mytime->toDateTimeString();
        if ($quyen > 0 && $quyen <= 4) {
            switch ($quyen) {
                // enterprise
                case 1:
                    try
                    {
                        $mod = new enterpriseUserModel();
                        $mod->user_id = $id;
                        $mod->account_active = 0;
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
                        $mod->account_active = 0;
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
                        $mod->account_active = 0;
                        $mod->created_at = $datenow;
                        $mod->save();
                        return 1;
                    }
                    catch(\Illuminate\Database\QueryException $ex){ 
                        return -1;
                    }       
                break;
                // moderator
                // case 4:
                //     try
                //     {
                //         $mod = new moderatorModel();
                //         $mod->user_id = $id;
                //         $mod->account_active = 0;
                //         $mod->created_at = $datenow;
                //         $mod->save();
                //         return 1;
                //     }
                //     catch(\Illuminate\Database\QueryException $ex){ 
                //         return -1;
                //     }       
                // break;

                default:
                    return 0;
                    break;
            }
        }
        else{return 0;}
    }


    public function get_service_lichtrinh(){
        $result = DB::select('SELECT * FROM c_city_district_ward_place_service WHERE sv_status = 1');
        return json_encode($result);
    }


    public function get_service_user($user_id)
    {
        $data=servicesModel::where('user_id',$user_id)->orderBy('created_at','desc')->get();
        // dd($data);
        if ($data != null) {
            foreach ($data as $sv) {
                $get_name_image = $this::get_name_image_ser($sv->sv_types,$sv->id);
                // dd($get_name_image);
                foreach ($get_name_image as $v) {
                    $name = $v->sv_name;
                    $image = $v->image_details_1;
                    $image2 = $v->image_banner;
                    $image3 = $v->image_details_2;
                }

                $likes = DB::table('vnt_likes')->where('service_id', '=',$sv->id)->count();
                // echo "string";
                $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv->id)->first();

                if ($ratings != null) {
                    $ponit_rating = $ratings->vr_rating;
                }else{ $ponit_rating = 0; }

                $result[] = array
                    (
                        'sv_id' => $sv->id,
                        'sv_type' => $sv->sv_types,
                        'sv_name' => $name,
                        'sv_image' => $image,
                        'sv_created_at' => $sv->created_at,
                        'sv_status' => $sv->sv_status,
                        'view' =>$sv->sv_counter_view,
                        'like' => $likes,
                        'rating' => $ponit_rating,
                        'image_banner'=>$image2,
                        'image_details_2'=>$image3,
                    );   
            }

            if (isset($result)) {
                return $result;
            }else{return null;}
        }
        else
        {
            return null;
        }
            
            
        
    }

    public function get_service_user_active($user_id, $active)
    {
            
        if ($active == "active") {
            $data=servicesModel::where('user_id',$user_id)->where('sv_status',1)->orderBy('created_at','desc')->get();
        }
        else{
            $data=servicesModel::where('user_id',$user_id)->where('sv_status',0)->orderBy('created_at','desc')->get();
        }
        // dd($data);
        foreach ($data as $sv) {
            $get_name_image = $this::get_name_image_ser($sv->sv_types,$sv->id);
            // dd($get_name_image);
            foreach ($get_name_image as $v) {
                $name = $v->sv_name;
                $image = $v->image_details_1;
            }
            $likes = DB::table('vnt_likes')->where('service_id', '=',$sv->id)->count();
            // echo "string";
            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv->id)->first();

            if ($ratings != null) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = 0; }

            $result[] = array
                (
                    'sv_id' => $sv->id,
                    'sv_type' => $sv->sv_types,
                    'sv_name' => $name,
                    'sv_image' => $image,
                    'sv_created_at' => $sv->created_at,
                    'sv_status' => $sv->sv_status,
                    'view' =>$sv->sv_counter_view,
                    'like' => $likes,
                    'rating' => $ponit_rating
                );     
        }
        if (isset($result)) {
            return json_encode($result);
        }else{return null;}
        
    }


    public function get_edit_service_user($id,$user_id)
    {
        $city = city::all();
        $info = servicesModel::find($id);

        if($info != null)
        {
            $get_name_image = $this::get_name_image_ser($info->sv_types,$info->id);
            // dd($get_name_image);
            foreach ($get_name_image as $v) {
                $name = $v->sv_name;
                $image = $v->image_details_1;
                $image2 = $v->image_banner;
                $image3 = $v->image_details_2;
            }
            $type_hotel = 0;
            if ($info->sv_types == 2) {
                try {
                    $_hotel = hotelsModel::where('service_id',$info->id)->first();
                    $type_hotel = $_hotel->hotel_number_star;
                } catch (Exception $e) {
                    $type_hotel = 0;
                }
                
            }
            $likes = DB::table('vnt_likes')->where('service_id', '=',$info->id)->count();
            // echo "string";
            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$info->id)->first();

            if ($ratings != null) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = 0; }

            $result[] = array
                (
                    'sv_id' => $info->id,
                    'sv_type' => $info->sv_types,
                    'sv_name' => $name,
                    'sv_image' => $image,
                    'sv_created_at' => $info->created_at,
                    'sv_status' => $info->sv_status,
                    'view' =>$info->sv_counter_view,
                    'like' => $likes,
                    'rating' => $ponit_rating,
                    'sv_description' => (string)$info->sv_description,
                    'sv_open' => $info->sv_open,
                    'sv_close' => $info->sv_close,
                    'sv_highest_price' => $info->sv_highest_price,
                    'sv_lowest_price' => $info->sv_lowest_price,
                    'sv_website' => $info->sv_website,
                    'sv_phone_number' => $info->sv_phone_number,
                    'tourist_places_id' => $info->tourist_places_id,
                    'sv_status' => $info->sv_status,
                    'sv_content' =>$info->sv_content,
                    'image_banner'=>$image2,
                    'image_details_2'=>$image3,
                    'type_hotel' =>$type_hotel
                );     
        }
        else{
            return null;
        }
        
        if (!isset($result)) {
            return null;
        }

        return json_encode($result);
    }
    public function post_edit_service_user(Request $request,$id)
    {
       
        // return $request->all();
        $table=servicesModel::find($id);
        $table->sv_content=$request->mota;
            $table->sv_description=$request->sv_description;
            $table->sv_open=$request->time_begin;
            $table->sv_close=$request->time_end;
            $table->sv_highest_price=$request->sv_highest_price;
            $table->sv_lowest_price=$request->sv_lowest_price;
        
            // $table->sv_website=$request->sv_website;
            if ($request->sv_website == null) {
                $sv_website = "Đang cập nhật";
            }
            else{$sv_website = $request->sv_website;}
            $table->sv_website=$sv_website;

            if ($request->sv_phone_number == null) {
                $sv_phone_number = "Đang cập nhật";
            }
            else{$sv_phone_number = $request->sv_phone_number;}
            $table->sv_phone_number=$sv_phone_number;
            // $table->sv_phone_number=$request->sv_phone_number;
            // $table->sv_counter_view=1;
            // $table->sv_counter_point=1;
            $table->sv_status=$request->sv_status;
            $table->sv_types=$request->sv_types;
            $table->tourist_places_id=$request->diadiem;
            $table->save();
        
            // if($request->img1!=''){
            //     imagesModel::where('service_id',$id)->update(['image_banner'=>$request->img1]);
            // }
            // if($request->img2!=''){
            //     imagesModel::where('service_id',$id)->update(['image_details_1'=>$request->img2]);
            // }
            // if($request->img3!=''){
            //     imagesModel::where('service_id',$id)->update(['image_details_2'=>$request->img3]);
            // }
             switch ($request->sv_types) {
                case 1:
                    eatingModel::where('service_id',$id)->update(['eat_name'=>$request->sv_name,'eat_status'=>'1']);
                    return $id;
                    break;
                case 2:
                    hotelsModel::where('service_id',$id)->update(['hotel_name'=>$request->sv_name,'hotel_number_star'=>$request->typehotel,'hotel_status'=>'1']);
                    return $id;
                    break;
                case 3:
                    transportModel::where('service_id',$id)->update(['transport_name'=>$request->sv_name,'transport_status'=>'1']);
                    return $id;
                    break;
                case 4:
                     sightseeingModel::where('service_id',$id)->update(['sightseeing_name'=>$request->sv_name,'sightseeing_status'=>'1']);
                    return $id;
                    break;
                case 5:
                    entertainmentsModel::where('service_id',$id)->update(['entertainments_name'=>$request->sv_name,'entertainments_status'=>'1']);
                    return $id;
                    break;
                }
        // try{
            
        //     }
        // }
        // catch(\Illuminate\Database\QueryException $ex){ 
        //     return -1;
        // }
    }

    //place user
    public function get_place_user($id)
    {
        // $data=tp::where('user_enterprise_id',$id)->paginate(10)->withPath('http://chinhlytailieu/vntour_web/place-user');;
        // $boss['link']=$data->links();
        // $boss['data']=$data->toArray();
        // return json_encode()
        $data=tp::where('user_id',$id)->orderBy('created_at','desc')->get();
       
        return json_encode($data);
  
       
    }
    public function get_edit_place_user($user_id,$id)
    {
        $data['info']=tp::where('user_id',$user_id)->where('id',$id)->first();
        // dd($data);
        if ($data['info'] == null) {
            $data['address'] = null;
            $data['city']    = null;
            $data['district']= null;
            $data['ward']    = null;
        }
        else{
            $data['address']  = DB::select('select * from c_city_district_ward_place WHERE id_place ='.$data['info']->id.' ');
            $data['city']     = city::all();
            $data['district'] = districtModel::all();
            $data['ward']     = wardModel::all();
        }
            
        return json_encode($data);
        
    
    }
    public function post_edit_place_user(Request $request,$user_id,$id)
    {
      
        try
        {
            tp::where('id',$id)->update(['pl_name'=>$request->place_name,'pl_address'=>$request->place_address,'pl_phone_number'=>$request->place_phone,
            'pl_latitude'=>$request->kinhdo,'pl_longitude'=>$request->vido,'id_ward'=>$request->place_ward]);
            return "ok";
        }
        catch(\Illuminate\Database\QueryException $ex){ 
            return "error";
        }
     
    }
    public function get_add_place_user()
    {
        $data=city::all();
        return json_encode($data);
    }
    public function post_add_place_user(Request $request,$user_id)
    {
            // $table=new tp;
            // $table->pl_name=$request->place_name;
            // $table->pl_address=$request->place_address;
            // $table->pl_phone_number=$request->place_phone;
            // $table->pl_latitude=$request->vido;
            // $table->pl_longitude=$request->kinhdo;
            // $table->id_ward=$request->place_ward;
            // $table->user_enterprise_id=$user_id;
            // $table->user_partner_id=1;
            // $table->user_tour_guide_id=1;
            // $table->pl_status='0';
            // $table->pl_content='0';
            // $table->pl_details='0';
            // $table->save();
            // return "ok";
         // return json_encode($request->all());
       
        
        try
        {
            $table=new tp;
            $table->pl_name=$request->place_name;
            $table->pl_address=$request->place_address;
            $table->pl_phone_number=$request->place_phone;
            $table->pl_latitude=$request->vido;
            $table->pl_longitude=$request->kinhdo;
            $table->id_ward=$request->place_ward;
            $table->user_id=$user_id;
            $table->pl_status='0';
            $table->pl_content='0';
            $table->pl_details='0';
            if ($table->save()) {
                $this::add_event(4, 'Một địa điểm vừa được thêm mới - Đang chờ duyệt', $user_id);
            }

            return "ok";
        }
        catch(\Illuminate\Database\QueryException $ex){ 
            return "error";
        }
    }
    public function post_add_service_user(Request $request,$user_id)
    {
        return $request->all();
        $table=new servicesModel;

            $table->sv_description=$request->sv_description;
            $table->sv_content=$request->mota;
            $table->sv_open=$request->time_begin;
            $table->sv_close=$request->time_end;
            $table->sv_lowest_price=$request->sv_lowest_price;
            $table->sv_highest_price=$request->sv_highest_price;
            if ($request->sv_website == null) {
                $sv_website = "Đang cập nhật";
            }
            else{$sv_website = $request->sv_website;}

            $table->sv_website=$request->sv_website;
            $table->sv_phone_number=$request->sv_phone_number;
            $table->sv_counter_view=0;
            $table->sv_counter_point=0;
            $table->sv_status=0;
            $table->sv_types=$request->sv_types;
            $table->tourist_places_id=$request->diadiem;
            $table->user_id=$user_id;
            $table->save();

            $max=$table::max('id');

            // $img_ = new imagesModel();
            // $img_->image_banner = $request->img1;
            // $img_->image_details_1 = $request->img2;
            // $img_->image_details_2 = $request->img3;
            // $img_->image_status = 1;
            // $img_->service_id = $max;
            
            // if ($img_->save()) {
            // }
            // imagesModel::insert(['image_banner'=>$request->img1,'image_details_1'=>$request->img2,'image_details_2'=>$request->img3,'image_status'=>'1','service_id'=>$max]);
          
             switch ($request->sv_types) {
                case 1:
                    eatingModel::insert(['eat_name'=>$request->sv_name,'eat_status'=>'1','service_id'=>$max]);
                    return json_encode(1);
                    break;
                case 2:
                    hotelsModel::insert(['hotel_name'=>$request->sv_name,'hotel_number_star'=>5,'hotel_status'=>'1','service_id'=>$max]);
                    return json_encode(1);
                    break;
                case 3:
                    transportModel::insert(['transport_name'=>$request->sv_name,'transport_status'=>'1','service_id'=>$max]);
                    return json_encode(1);
                    break;
                case 4:
                     sightseeingModel::insert(['sightseeing_name'=>$request->sv_name,'sightseeing_status'=>'1','service_id'=>$max]);
                    return json_encode(1);
                    break;
                case 5:
                    entertainmentsModel::insert(['entertainments_name'=>$request->sv_name,'entertainments_status'=>'1','service_id'=>$max]);
                    return json_encode(1);
                    break;
                default:
                    # code...
                    break;
            }
        
        // try{
        //     $table->sv_description=$request->sv_description;
        //     $table->sv_content=$request->mota;
        //     $table->sv_open=$request->time_begin;
        //     $table->sv_close=$request->time_end;
        //     $table->sv_highest_price=$request->sv_lowest_price;
        //     $table->sv_lowest_price=$request->sv_highest_price;
        
        //     $table->sv_website=$request->sv_website;
        //     $table->sv_phone_number=$request->sv_phone_number;
        //     $table->sv_counter_view=1;
        //     $table->sv_counter_point=1;
        //     $table->sv_status='1';
        //     $table->sv_types=$request->sv_types;
        //     $table->tourist_places_id=$request->diadiem;
        //     $table->user_enterprise_id=$user_id;
        //     $table->save();
        //     $max=$table::max('id');
        //     imagesModel::insert(['image_banner'=>$request->img1,'image_details_1'=>$request->img2,'image_details_2'=>$request->img3,'image_status'=>'1','service_id'=>$max]);

          
        //      switch ($request->sv_types) {
        //         case 1:
        //             eatingModel::insert(['eat_name'=>$request->sv_description,'eat_status'=>'1','service_id'=>$max]);
        //             return 'ok';
        //             break;
        //         case 2:
        //             hotelsModel::insert(['hotel_name'=>$request->sv_description,'hotel_number_star'=>5,'hotel_status'=>'1','service_id'=>$max]);
        //             return 'ok';
        //             break;
        //         case 3:
        //             transportModel::insert(['transport_name'=>$request->sv_description,'transport_status'=>'1','service_id'=>$max]);
        //             return 'ok';
        //             break;
        //         case 4:
        //              sightseeingModel::insert(['sightseeing_name'=>$request->sv_description,'sightseeing_status'=>'1','service_id'=>$max]);
        //             return 'ok';
        //             break;
        //         case 5:
        //             entertainmentsModel::insert(['entertainments_name'=>$request->sv_description,'entertainments_status'=>'1','service_id'=>$max]);
        //             return 'ok';
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }
           
            

        // }
        // catch(\Illuminate\Database\QueryException $ex){ 
        //     return "error";
        // }
  
    }


    public function changePassword(Request $request, $iduser){
        $pass = $request->password_old;
        // echo $pass;
        $pass_new = $request->password_new;
        $u = usersModel::where('user_id',$iduser)->first();

        if ($u != null) {
            if (Hash::check($pass,$u->password)) {
                try 
                {
                    usersModel::where('user_id', $iduser)->update(['password' => bcrypt($pass_new)]);
                    return 1;
                } catch (Exception $e) {
                    return -1;
                }  
            }
            else{
                return 0; // mat khau khong khop
            }
        }
        else{
            return -1;
        }
    }

    public function get_user_search($userid)
    {
        // id-type-image-name
        $search = userSearchModel::where('user_id',$userid)->orderBy('created_at', 'desc')->limit(10)->get();
        // return $search;
        foreach ($search as $value) {
            $sv = servicesModel::where('id',$value->id_service)->first();

            $get_name_image = $this::get_name_image_ser($sv->sv_types,$value->id_service);
            // dd($get_name_image);
            foreach ($get_name_image as $v) {
                $name = $v->sv_name;
                $image = $v->image_details_1;
            }
            $result[] = array
                (
                    'sv_id' => $value->id_service,
                    'sv_type' => $sv->sv_types,
                    'sv_name' => $name,
                    'sv_description' => $sv->sv_description,
                    'sv_image' => $image
                );

        }
        if (isset($result)) {
            return $result;
        }
        else{return null;}

    }

    public function get_name_image_ser($type,$id_service){
        // return $type;
        switch ($type) {
            case 1:
                $lam = DB::select("select * from sv_eat WHERE sv_id = '$id_service'");
                break;
            case 2:
                $lam = DB::select("select * from sv_hotel WHERE sv_id = '$id_service'");
                break;
            case 3:
                $lam = DB::select("select * from sv_stranport WHERE sv_id = '$id_service'");
                break;
            case 4:
                $lam = DB::select("select * from sv_sightseeting WHERE sv_id = '$id_service'");
                break;
            case 5:
                $lam = DB::select("select * from sv_entertaiment WHERE sv_id = '$id_service'");
                break;
        }
        if (isset($lam)) {
            return $lam;
        }else{return null;}
        
    }

    public function get_search_nhieunhat(){
        $result_lis = DB::select("SELECT id_service, COUNT(id_service) AS 'num' FROM vnt_user_search GROUP BY id_service ORDER BY num desc limit 10");
        // dd($result_lis);
        foreach ($result_lis as $value) {
            $sv = servicesModel::where('id',$value->id_service)->first();
            if ($sv !=null) {
                $get_name_image = $this::get_name_image_ser($sv->sv_types,$value->id_service);
                // dd($get_name_image);
                foreach ($get_name_image as $v) {
                    $name = $v->sv_name;
                    $image = $v->image_details_1;
                }
                $result[] = array
                    (
                        'sv_id' => $value->id_service,
                        'sv_type' => $sv->sv_types,
                        'sv_name' => $name,
                        'sv_description' => $sv->sv_description,
                        'sv_image' => $image
                    );
            }
                

        }
        // return $get_name_image;
        if (isset($result)) {
            return json_encode($result);
        }
        else{return null;}
    }

    public function load_place_ward($idward){
        $result = tp::where('id_ward',$idward)->get();
        return json_encode($result);
    }


    public function Top_service_view(){
        $data = servicesModel::where('sv_status',1)->orderBy('sv_counter_view','desc')->take(10)->get();
        // dd($data);
        // return $data;
        foreach ($data as $sv) {
            $get_name_image = $this::get_name_image_ser($sv->sv_types,$sv->id);
            if ($get_name_image != null) {
                foreach ($get_name_image as $v) {
                    $name = $v->sv_name;
                    $image = $v->image_details_1;
                }
            
                $likes = DB::table('vnt_likes')->where('service_id', '=',$sv->id)->count();
                // echo "string";
                $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv->id)->first();

                if ($ratings != null) {
                    $ponit_rating = $ratings->vr_rating;
                }else{ $ponit_rating = 0; }

                $result[] = array
                    (
                        'sv_id' => $sv->id,
                        'sv_type' => $sv->sv_types,
                        'sv_name' => $name,
                        'sv_image' => $image,
                        'sv_created_at' => $sv->created_at,
                        'sv_status' => $sv->sv_status,
                        'view' =>$sv->sv_counter_view,
                        'like' => $likes,
                        'rating' => $ponit_rating
                    );     
            }
        }
        if (isset($result)) {
            return json_encode($result);
        }else{return null;}
    }

    public function Top_service_rating_like($type){
        if ($type == "like") {
            $data_like = DB::select("SELECT COUNT(service_id) AS 'num_like', service_id FROM `vnt_likes` GROUP BY service_id ORDER BY num_like DESC LIMIT 10");
            foreach ($data_like as $value) {
                $data[] = servicesModel::where('id',$value->service_id)->first();
            }
        }
        else{
            $data_rating = DB::select("SELECT COUNT(service_id) as 'num_rating',service_id FROM vnt_visitor_ratings WHERE vr_rating = 5 GROUP BY service_id ORDER BY num_rating LIMIT 10");
            foreach ($data_rating as $value) {
                $data[] = servicesModel::where('id',$value->service_id)->first();
            }
                
        }
        // dd($data);
        foreach ($data as $sv) {
            $get_name_image = $this::get_name_image_ser($sv['sv_types'],$sv['id']);
            // dd($get_name_image);
            foreach ($get_name_image as $v) {
                $name = $v->sv_name;
                $image = $v->image_details_1;
            }
            $likes = DB::table('vnt_likes')->where('service_id', '=',$sv['id'])->count();
            // echo "string";
            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv['id'])->first();

            if ($ratings != null) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = "0"; }

            $result[] = array
                (
                    'sv_id' => $sv['id'],
                    'sv_type' => $sv['sv_types'],
                    'sv_name' => $name,
                    'sv_image' => $image,
                    'sv_created_at' => $sv['created_at'],
                    'sv_status' => $sv['sv_status'],
                    'view' =>$sv['sv_counter_view'],
                    'like' => $likes,
                    'rating' => $ponit_rating
                );     
        }
        if (isset($result)) {
            return json_encode($result);
        }else{return null;}
    }

    public function get_service_user_max_view($user_id){
        $data = servicesModel::where('user_id',$user_id)->where('sv_status',1)->orderBy('sv_counter_view','desc')->first();
        // dd($data);
        if ($data == null) {
            return "0";
        }
        else{
            $get_name_image = $this::get_name_image_ser($data->sv_types,$data->id);
            // dd($get_name_image);
            foreach ($get_name_image as $v) {
                $name = $v->sv_name;
                $image = $v->image_details_1;
            }
            $likes = DB::table('vnt_likes')->where('service_id', '=',$data->id)->count();
            // echo "string";
            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$data->id)->first();

            if ($ratings != null) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = 0; }

            $result[] = array
                (
                    'sv_id' => $data->id,
                    'sv_type' => $data->sv_types,
                    'sv_name' => $name,
                    'sv_image' => $image,
                    'sv_created_at' => $data->created_at,
                    'sv_status' => $data->sv_status,
                    'view' =>$data->sv_counter_view,
                    'like' => $likes,
                    'rating' => $ponit_rating
                );     
            if (isset($result)) {
                return json_encode($result);
            }else{return "0";}
        }
            
    }

    public function get_service_user_max_rating_like($type,$userid){
        if ($type == "like") {
            $data_user = servicesModel::where('user_id',$userid)->where('sv_status',1)->get();
            if ($data_user != null) {
                foreach ($data_user as $value) {
                    $likes = DB::table('vnt_likes')->where('service_id', '=',$value->id)->count();
                    $array_like[$value->id] = $likes;
                }
                if (isset($array_like) && $array_like != null) {
                    $id_service_max_like = array_search(max($array_like),$array_like);
                    $data = servicesModel::where('id',$id_service_max_like)->get();
                }
                else{ return "-2"; }
            }
            else{ return "-1"; }
        }
        else{
            $data_user = servicesModel::where('user_id',$userid)->get();
            if ($data_user != null) {
                foreach ($data_user as $value) {
                    $likes = DB::select("select avg(vr_rating) as 'rating' FROM vnt_visitor_ratings WHERE service_id = '$value->id' GROUP BY service_id");
                    $array_rating[$value->id] = $likes;
                }
                if (isset($array_rating) && $likes != null) {
                    $id_service_max_rating = array_search(max($array_rating),$array_rating);
                    $data = servicesModel::where('id',$id_service_max_rating)->get();
                }
                else{ return "-2"; }
            }
            else{ return "-1"; }
            // return $data;
        }
        // dd($data);
        
        foreach ($data as $sv) {
            $get_name_image = $this::get_name_image_ser($sv['sv_types'],$sv['id']);
            // dd($get_name_image);
            foreach ($get_name_image as $v) {
                $name = $v->sv_name;
                $image = $v->image_details_1;
            }
            $likes = DB::table('vnt_likes')->where('service_id', '=',$sv['id'])->count();
            // echo "string";
            $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv['id'])->first();

            if ($ratings != null) {
                $ponit_rating = $ratings->vr_rating;
            }else{ $ponit_rating = 0; }

            $result[] = array
                (
                    'sv_id' => $sv['id'],
                    'sv_type' => $sv['sv_types'],
                    'sv_name' => $name,
                    'sv_image' => $image,
                    'sv_created_at' => $sv['created_at'],
                    'sv_status' => $sv['sv_status'],
                    'view' =>$sv['sv_counter_view'],
                    'like' => $likes,
                    'rating' => $ponit_rating
                );     
        }
        if (isset($result)) {
            return json_encode($result);
        }else{return "0";}
    }
    


    // ADD SERVICE
    public function post_add_service_user2(Request $request,$user_id)
    {
        // return $request->all();
        $table=new servicesModel;

            $table->sv_description=$request->sv_description;
            $table->sv_content=$request->mota;
            $table->sv_open=$request->time_begin;
            $table->sv_close=$request->time_end;
            $table->sv_lowest_price=$request->sv_lowest_price;
            $table->sv_highest_price=$request->sv_highest_price;
            
            if ($request->sv_website == null) {
                $sv_website = "Đang cập nhật";
            }
            else{$sv_website = $request->sv_website;}
            $table->sv_website=$sv_website;

            if ($request->sv_phone_number == null) {
                $sv_phone_number = "Đang cập nhật";
            }
            else{$sv_phone_number = $request->sv_phone_number;}
            $table->sv_phone_number=$sv_phone_number;

            $table->sv_counter_view=0;
            $table->sv_counter_point=0;
            $table->sv_status=0;
            $table->sv_types=$request->sv_types;
            $table->tourist_places_id=$request->diadiem;
            $table->user_id=$user_id;
            if ($table->save()) {
                $max=$table::max('id');

                switch ($request->sv_types) {
                    case 1:
                        eatingModel::insert(['eat_name'=>$request->sv_name,'eat_status'=>'1','service_id'=>$max]);
                        // return json_encode(1);
                        break;
                    case 2:
                        hotelsModel::insert(['hotel_name'=>$request->sv_name,'hotel_number_star'=>5,'hotel_status'=>$request->type_hotel,'service_id'=>$max]);
                        // return json_encode(1);
                        break;
                    case 3:
                        transportModel::insert(['transport_name'=>$request->sv_name,'transport_status'=>'1','service_id'=>$max]);
                        // return json_encode(1);
                        break;
                    case 4:
                         sightseeingModel::insert(['sightseeing_name'=>$request->sv_name,'sightseeing_status'=>'1','service_id'=>$max]);
                        // return json_encode(1);
                        break;
                    case 5:
                        entertainmentsModel::insert(['entertainments_name'=>$request->sv_name,'entertainments_status'=>'1','service_id'=>$max]);
                        // return json_encode(1);
                        break;
                    default:
                        # code...
                        break;
                }
                $this::add_event(4, 'Một dịch dụ vừa được thêm mới - Đang chờ duyệt', $user_id,$max);
                return $max;
            }
            else
            {
                return json_encode("status:500");     
            }  
  
    }


    public function get_sv_idplace($id_place)
    {
        $result = servicesModel::where('tourist_places_id',$id_place)->get();
        // return $result;
        foreach ($result as $value) {
            
            $mane_image = $this::get_name_ser2($value->id, $value->sv_types);
            // return $mane_image;
            if ($mane_image != null) {
                foreach ($mane_image as $v) {
                     $name = $v->sv_name;
                     $image = $v->image_details_1;
                } 
            }
            else{
                $name = null;
                $image = null;
            }

            $likes = DB::table('vnt_likes')->where('service_id', '=',$value->sv_id)->count();

            // $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$value->sv_id)->first();
            $ratings = DB::select("SELECT avg(vr_rating) as 'rating' FROM `vnt_visitor_ratings` WHERE service_id = '$value->sv_id'");
            foreach ($ratings as $val) {
                $rating_sv = round($val->rating,1);
            }
            if (!empty($rating_sv)) {
                $ponit_rating = $rating_sv;
            }else{ $ponit_rating = 0; }

            if (isset($value->hotel_number_star )) {
                $hotel_number_star = $value->hotel_number_star;
                $mang[] = array(
                    'id_service'        => $value->id,
                    'name'              => $name,
                    'hotel_number_star' => $value->hotel_number_star,
                    'description'       => $value->sv_description,
                    'image'             => $image,
                    // 'name_city'         => $name_city,
                    'sv_highest_price'  => $value->sv_highest_price,
                    'sv_lowest_price'   => $value->sv_lowest_price,
                    'like'              => $likes,
                    'view'              => $value->sv_counter_view,
                    'point'             => $value->sv_counter_point,
                    'rating'            => $ponit_rating,
                    'sv_type'           => $value->sv_types,
                    'sv_status'         => $value->sv_status
                );
            }
            else{
                $mang[] = array(
                    'id_service'        => $value->id,
                    'name'              => $name,
                    'image'             => $image,
                    // 'name_city'         => $name_city,
                    'sv_highest_price'  => $value->sv_highest_price,
                    'sv_lowest_price'   => $value->sv_lowest_price,
                    'like'              => $likes,
                    'view'              => $value->sv_counter_view,
                    'point'             => $value->sv_counter_point,
                    'rating'            => $ponit_rating,
                    'sv_type'           => $value->sv_types,
                    'sv_status'         => $value->sv_status
                );
            }
            
        }
        if (isset($mang)) {
            return $mang;
        }
        else{return null;}
    }

    public function get_name_ser2($id_service, $type)
    {
        switch ($type) {
            case 1:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_eat WHERE sv_id='$id_service' ");
            break;
            case 2:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_hotel WHERE sv_id='$id_service' ");
            break;
            case 3:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_stranport WHERE sv_id='$id_service' ");
            break;
            case 4:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_sightseeting WHERE sv_id='$id_service' ");
            break;
            case 5:
             $result = DB::select("SELECT sv_name,image_details_1 FROM sv_entertaiment WHERE sv_id='$id_service' ");
            break;
        }
        if (isset($result)) {
            return $result;
        }
        else{
            return null;
        }
    }

    public function add_event($type_event,$event_name, $user_id, $id_sv_pla = 0){
        try 
        {
            $dt = Carbon::now();
            $event = new eventModel();
            $event->event_name   = $event_name;
            $event->user_id      = $user_id;
            $event->event_start  = $dt;
            $event->event_end    = $dt;
            $event->event_status = 0;
            $event->type_id      = 1;
            $event->event_user   = $type_event;
            $event->service_id   = $id_sv_pla;
            $event->save();
        } catch (Exception $e) {
            
        }
            
    }

    //=============== delete place =============
    public function delete_place($id_place)
    {
        $sv = servicesModel::where('tourist_places_id',$id_place)->get();
        if ($sv != null) {
            foreach ($sv as $value) {
                if ($value->sv_types == 1) {
                    eatingModel::where('service_id',$value->id);
                }
                elseif ($value->sv_types == 2) {
                    hotelModel::where('service_id',$value->id);
                }
                elseif ($value->sv_types == 3) {
                    transportModel::where('service_id',$value->id);
                }
                elseif ($value->sv_types == 4) {
                    sightseeingModel::where('service_id',$value->id);
                }
                elseif ($value->sv_types == 5) {
                    entertainmentsModel::where('service_id',$value->id);
                }
                ImagesController::where('service_id',$value->id)->delete();
            }
        }
            
    }
}
