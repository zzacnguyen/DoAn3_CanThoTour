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
    		return "sai roif";
    	} else {

    		$email = $request->input('taikhoan');
    		$matkhau = $request->input('password');

    		if( Auth::attempt(['nd_tendangnhap' => $email, 'password' =>$matkhau])) {
    			return "dang nhap thanh cong";
    		} else {
    			return json_encode("Tài khoản hoặc mật khẩu không đúng");
    		}
    		return 'chuan roi';
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
    }
    public function logout_api()
    {
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return $this->outputJSON(null,"Successfully Logged Out"); 
    }
}
