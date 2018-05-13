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
use Carbon;
use Hash;
use App\userSearchModel;
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


    public function edit_user_mobile(Request $request,$id)
    {

        // contact_infoModel::where('user_id',$id)
         
        //         ->update([
        //             'contact_name'=>$request->name,
        //             'contact_phone'=>$request->phone,
        //             'contact_website'=>$request->website,
        //             'contact_email_address'=>$request->email,
        //             'contact_language'=>$request->lang,
        //             'contact_country'=>$request->address]);
        //         return "1";
        try{
            if($request->avatar)
            {
                contact_infoModel::where('user_id',$id)
         
                ->update([
                    'contact_name'=>$request->name,
                    'contact_phone'=>$request->phone,
                    'contact_website'=>$request->website,
                    'contact_email_address'=>$request->email,
                    'contact_language'=>$request->lang,
                    'contact_country'=>$request->address,
                    'contact_avatar'=>$request->avatar]);
                return "1";
            }
            else
            {
                contact_infoModel::where('user_id',$id)
         
                ->update([
                    'contact_name'=>$request->name,
                    'contact_phone'=>$request->phone,
                    'contact_website'=>$request->website,
                    'contact_email_address'=>$request->email,
                    'contact_language'=>$request->lang,
                    'contact_country'=>$request->address]);
                return "1";
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
        $data=servicesModel::where('user_enterprise_id',$user_id)->limit(10)->get();
        return json_encode($data);
    }
    public function get_edit_service_user($id,$user_id)
    {
        $city=city::all();
        $info=servicesModel::find($id);
        $place=servicesModel::join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
        ->where('vnt_services.id',$id)
        ->select('vnt_services.tourist_places_id','pl_name')->get();
        return json_encode(array('city'=>$city,'place'=>$place,'info'=>$info));
    }
    public function post_edit_service_user(Request $request,$id)
    {
       
       
        $table=servicesModel::find($id);
        try{
            $table->sv_description=$request->sv_description;
            $table->sv_content=$request->mota;
            $table->sv_open=$request->time_begin;
            $table->sv_close=$request->time_end;
            $table->sv_highest_price=$request->sv_highest_price;
            $table->sv_lowest_price=$request->sv_lowest_price;
        
            $table->sv_website=$request->sv_website;
            $table->sv_phone_number=$request->sv_phone_number;
            $table->sv_counter_view=1;
            $table->sv_counter_point=1;
            $table->sv_status='1';
            $table->sv_types=$request->sv_types;
            $table->tourist_places_id=$request->diadiem;
            $table->save();
        
            if($request->img1!=''){
                imagesModel::where('service_id',$id)->update(['image_banner'=>$request->img1]);
            }
            if($request->img2!=''){
                imagesModel::where('service_id',$id)->update(['image_details_1'=>$request->img2]);
            }
            if($request->img3!=''){
                imagesModel::where('service_id',$id)->update(['image_details_2'=>$request->img3]);
            }
             switch ($request->sv_types) {
                case 1:
                    eatingModel::where('service_id',$id)->update(['eat_name'=>$request->sv_description,'eat_status'=>'1']);
                    return 'ok';
                    break;
                case 2:
                    hotelsModel::where('service_id',$id)->update(['hotel_name'=>$request->sv_description,'hotel_number_star'=>5,'hotel_status'=>'1']);
                    return 'ok';
                    break;
                case 3:
                    transportModel::where('service_id',$id)->update(['transport_name'=>$request->sv_description,'transport_status'=>'1']);
                    return 'ok';
                    break;
                case 4:
                     sightseeingModel::where('service_id',$id)->update(['sightseeing_name'=>$request->sv_description,'sightseeing_status'=>'1']);
                    return 'ok';
                    break;
                case 5:
                    entertainmentsModel::where('service_id',$id)->update(['entertainments_name'=>$request->sv_description,'entertainments_status'=>'1']);
                    return 'ok';
                    break;
                default:
                    # code...
                    break;
            }
           
            

        }
        catch(\Illuminate\Database\QueryException $ex){ 
            return "error";
        }
    }

    //place user
    public function get_place_user($id)
    {
        // $data=tp::where('user_enterprise_id',$id)->paginate(10)->withPath('http://chinhlytailieu/vntour_web/place-user');;
        // $boss['link']=$data->links();
        // $boss['data']=$data->toArray();
        // return json_encode()
        $data=tp::where('user_enterprise_id',$id)->get();
       
        return json_encode($data);
  
       
    }
    public function get_edit_place_user($user_id,$id)
    {
        $data['info']=tp::where('user_enterprise_id',$user_id)->where('id',$id)->get();
        $data['address']=DB::select('select * from c_city_district_ward_place WHERE id_place ='.$data['info'][0]->id.' ');
        $data['city']=city::all();
        $data['district']=districtModel::all();
        $data['ward']=wardModel::all();
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
            $table->user_enterprise_id=$user_id;
            $table->pl_status='0';
            $table->pl_content='0';
            $table->pl_details='0';
            $table->save();
            return "ok";
        }
        catch(\Illuminate\Database\QueryException $ex){ 
            return "error";
        }
    }
    public function post_add_service_user(Request $request,$user_id)
    {

        $table=new servicesModel;

        $table->sv_description=$request->sv_description;
            $table->sv_content=$request->mota;
            $table->sv_open=$request->time_begin;
            $table->sv_close=$request->time_end;
            $table->sv_highest_price=$request->sv_lowest_price;
            $table->sv_lowest_price=$request->sv_highest_price;
        
            $table->sv_website=$request->sv_website;
            $table->sv_phone_number=$request->sv_phone_number;
            $table->sv_counter_view=1;
            $table->sv_counter_point=1;
            $table->sv_status='1';
            $table->sv_types=$request->sv_types;
            $table->tourist_places_id=$request->diadiem;
            $table->user_enterprise_id=$user_id;
            $table->save();
            $max=$table::max('id');
            imagesModel::insert(['image_banner'=>$request->img1,'image_details_1'=>$request->img2,'image_details_2'=>$request->img3,'image_status'=>'1','service_id'=>$max]);

          
             switch ($request->sv_types) {
                case 1:
                    eatingModel::insert(['eat_name'=>$request->sv_description,'eat_status'=>'1','service_id'=>$max]);
                    return 'ok';
                    break;
                case 2:
                    hotelsModel::insert(['hotel_name'=>$request->sv_description,'hotel_number_star'=>5,'hotel_status'=>'1','service_id'=>$max]);
                    return 'ok';
                    break;
                case 3:
                    transportModel::insert(['transport_name'=>$request->sv_description,'transport_status'=>'1','service_id'=>$max]);
                    return 'ok';
                    break;
                case 4:
                     sightseeingModel::insert(['sightseeing_name'=>$request->sv_description,'sightseeing_status'=>'1','service_id'=>$max]);
                    return 'ok';
                    break;
                case 5:
                    entertainmentsModel::insert(['entertainments_name'=>$request->sv_description,'entertainments_status'=>'1','service_id'=>$max]);
                    return 'ok';
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
        return $lam;
    }

    public function get_search_nhieunhat(){
        $result_lis = DB::select("SELECT id_service, COUNT(id_service) AS 'num' FROM vnt_user_search GROUP BY id_service ORDER BY num desc limit 10");
        foreach ($result_lis as $value) {
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
            return json_encode($result);
        }
        else{return null;}
    }
}
