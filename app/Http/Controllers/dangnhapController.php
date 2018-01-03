<?php

namespace App\Http\Controllers;
use App\nguoidungModel;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
class dangnhapController extends Controller
{
    public function postLogin(Request $request)
    {
    	$rules = [
    		'taikhoan' =>'required',
    		'password' => 'required|min:4'
    	];
   
    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		return "loi";
    	} 
        else 
        {
    		$taikhoan = $request->input('taikhoan');
    		$matkhau = $request->input('password');
    		if( Auth::attempt(['nd_tendangnhap' => $taikhoan, 'password' =>$matkhau])) {
                $user_dn[] = array('id' => Auth::user()->id,'nd_avatar' => Auth::user()->nd_avatar,'level' => Auth::user()->nd_loainguoidung); 
                return json_encode($user_dn); 
    		} else {
                $erro = "Tài khoản hoặc mật khẩu không đúng";
    			return json_encode('Tài khoản hoặc mật khẩu không đúng');
    		}
    	}
    }

    public function login_api(Request $request)
    {
        $data = $request->json()->all();
        $taikhoan = $request->input('taikhoan');
        $password = $request->input('password');
        $user = nguoidungModel::where('nd_tendangnhap',$taikhoan)->first();
     
        if($user != null && Hash::check($password, $user->getAuthPassword())) {
           $user->remember_token = str_random(60);
           $user->save();
           return $user;
        }
        else
            echo "sai";
    }
    public function logout_api()
    {
        // if (Auth::check()) {
        //     $user = Auth::logout();
        //     return "Bạn đã đăng xuất"; 
        // }
        // else
        //     echo "loi";
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();
        return ("Bạn đã đăng xuất"); 
    }
}
