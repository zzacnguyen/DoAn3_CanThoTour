<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PointDetailsModel;
use App\PointUserModel;
use App\servicesModel;
use App\ShareModel;
class ShareController extends Controller
{
    public function Share($service_id, $user_id)
    {
    	$share                    = new ShareModel;
        $share->service_id       = $service_id;
        $share->user_id    = $user_id;

        if($share->save())
        {
            $id = DB::table('vnt_share')
            ->select('id')
            ->where('service_id',$service_id)
            ->where('user_id',$user_id)
            ->get();

            $tmp_id_share = 0;
            $service_id =  $service_id;
            foreach ($id as $value) {
                $tmp_id_share = $value->id;
            }

            $user_id = DB::table('vnt_services')
            ->select('user_id', 'sv_counter_point')
            ->where('id', '=', $service_id)
            ->get();

            foreach ($user_id as $value) {
                $user_id = $value->user_id;
                $sv_counter_point = $value->sv_counter_point;
            }

            $point_detail = new PointDetailsModel();
            $point_detail->share_id = $tmp_id_share;
            $point_detail->point_id = 2;
            $point_detail->point_user_id = $user_id;
            $point_detail->save();

            $get_point_share = DB::table('vnt_point')
            ->select('point_rate')
            ->where('id','=',1)
            ->get();
            $point_rate = 0;
            foreach ($get_point_share as $value) {
                $point_rate = $value->point_rate;
            }


            $point = DB::table('vnt_point_user')->select('point_now',
            'point_exchanged', 'point_total')
            ->where('user_id', '=' ,$user_id)
            ->get();
            $point_now = 0;
            $point_total = 0;

            foreach ($point as $value) {
                $point_now = $value->point_now;
                $point_total = $value->point_total;

            }
            $point_now = $point_now  + $point_rate;
            $point_total = $point_total + $point_now;
            PointUserModel::where('user_id', $user_id)
            ->update(['point_now'=>$point_now, 'point_total'=>$point_total]);

            $sv_counter_point = $sv_counter_point + $point_rate;
            servicesModel::where('id', $service_id)
            ->update(['sv_counter_point'=>$sv_counter_point]);


            $encode=json_encode($id);
            return $encode;
        }
        else{

            $encode=json_encode("status:500");
            return $encode;
        }
    }
}
