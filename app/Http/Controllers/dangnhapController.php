<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    		if( Auth::attempt(['nd_tendangnhap' => $email, 'taikhoan' =>$matkhau])) {
    			return "dang nhap thanh cong";
    		} else {
    			return json_encode("Tài khoản hoặc mật khẩu không đúng");
    		}
    		return 'chuan roi';
    	}
    }
}
