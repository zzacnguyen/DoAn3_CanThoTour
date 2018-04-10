<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Colection;
use App\usersModel;
class CMS_ModuleController extends Controller
{
	public function Display_New_User()
	{
		$dt = Carbon::now();
		$month_now = $dt->month;
		//tháng thứ hiện tại
		$data_1 = DB::table('vnt_user') 
		->select('vnt_events.service_id as id', 
        DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month_now)
        ->count();

		$data_2 = DB::table('vnt_user') 
		->select('vnt_events.service_id as id', 
        DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month_now-1)
        ->count();

		$data_3 = DB::table('vnt_user') 
		->select('vnt_events.service_id as id', 
        DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month_now-2)
        ->count();

		$data_4 = DB::table('vnt_user') 
		->select('vnt_events.service_id as id', 
        DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month_now-3)
        ->count();

		$data_5 = DB::table('vnt_user') 
		->select('vnt_events.service_id as id', 
        DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month_now-4)
        ->count();

		$data_6 = DB::table('vnt_user') 
		->select('vnt_events.service_id as id', 
        DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month_now-5)
        ->count();
		$string = $data_6.','.$data_5.','.$data_4.','.$data_3.','.$data_2.','.$data_1;
		return $string;
	}

	public function Couter_User_Six_Month()
	{	$string = "";
		$string = $this::Display_New_User();
		$arr = explode(',', $string);
		$sum = $arr[0] + $arr[1] + $arr[2] + $arr[3] + $arr[4] + $arr[5];
		return $sum;
	}

    public function getDashboard(){
		$data_couter_user_six_month =  $this::Couter_User_Six_Month();
		$data_couter_user_one_month = $this::Display_New_User();
    	if (view()->exists('view.CMS.master')){return view('CMS.components.error');}
    	else	{
    		
			return view('CMS.master', [
					'data1'=>$data_couter_user_one_month,
					'data2'=>$data_couter_user_six_month
			]);
		}

	}
}
