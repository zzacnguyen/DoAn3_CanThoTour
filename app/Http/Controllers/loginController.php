<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usersModel;
use Auth;
use Validator;
use DB;
use Hash;

class loginController extends Controller
{
    //
    // public function postLogin(Request $request)
    // {
    // 	$rules = [
    // 		'user' =>'required',
    // 		'password' => 'required|min:4'
    // 	];
   
    // 	$validator = Validator::make($request->all(), $rules);

    // 	if ($validator->fails()) {
    // 		$erro = array('result' => null,'error' => 1, 'status' => 'ERROR');
    //         return json_encode($erro);
    // 	} 
    //     else 
    //     {
    // 		$user = $request->input('user');
    // 		$password = $request->input('password');
    // 		if( Auth::attempt(['username' => $user, 'password' => $password])) {
    //             $result['result'] = array('id' => Auth::vnt_users()->id,'username' => Auth::vnt_users()->username,'user_avatar' => Auth::vnt_users()->user_avatar,'user_groups_id' => Auth::vnt_users()->user_groups_id); 
    //             $result['error'] = null;
    //             $result['status'] = "OK";
    //             return json_encode($result);
    // 		} else {
    //             $erro = array('result' => null,'error' => 1, 'status' => 'ERROR');
    //             return json_encode($erro);
    // 		}
    // 	}
    // }

    public function postLogin(Request $request)
    {
        $rules = [
            'username' =>'required',
            'password' => 'required|min:4'
        ];
   
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $erro = array('result' => null,'error' => 2, 'status' => 'ERROR');
            return json_encode($erro);
        } 
        else 
        {
            $username = $request->input('username');
            $pass = $request->input('password');
            if( Auth::attempt(['username' => $username, 'password' =>$pass])) {
                $result['result'] = array('id' => Auth::user()->id,'username' => Auth::user()->username,'user_avatar' => Auth::user()->user_avatar,'user_groups_id' => Auth::user()->user_groups_id); 
                $result['error'] = null;
                $result['status'] = "OK";
                return json_encode($result);
            } else {
                $erro = array('result' => null,'error' => 1, 'status' => 'ERROR');
                return json_encode($erro);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        if (!Auth::check()) {
            $logout = array('error' => null, 'status' => 'OK');
            return json_encode($logout);
        }
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

    public function register(Request $request)
    {
        // $erro = (
        //     '1' => 'Tên tài khoản và mật khẩu không được để trống',
        //     '2' => 'Mật khẩu phải có độ dài từ 6-20 ký tự',
        //     '3' => 'Tên tài khoản đã tồn tại',
        //     '4' => 'Tài khoản có độ dài từ 5-25 ký tự',
        //     '5' => 'Đăng ký thành công'
        // )

        $user = $request->input('username');
        $password = $request->input('password');
        $country  = $request->input('country');
        $language  = $request->input('language');
 
        if (empty($user) || empty($password)) // kiểm tra rỗng
            $erro['error'] = 1;
        else if (strlen($password) < 6 || strlen($password) > 20) //kiểm tra độ dài pass
            $erro['error'] = 2;
        else if (strlen($user) < 5 || strlen($user) > 25) // kiểm tra độ dài tên tài khoản
            $erro['error'] = 4;
        else if ($this->check_username_exist($user) == "false") // kiểm tra tài khoản tồn tại
            $erro['error'] = 3;
        if (isset($erro)) {
            $erro['status'] = "ERROR";
            return json_encode($erro);
        }
        else
        {
            $userRegister                      = new usersModel();
            $userRegister->username      	   = $user;
            $userRegister->password            = bcrypt($password);
            $userRegister->user_groups_id      = 1;
            $userRegister->user_language       = $language;
            $userRegister->user_country        = $country;
            $userRegister->save();
            $erro = array('error' => null, 'status' => 'OK');
            return json_encode($erro);
        }
    }

    function check_username_exist($user){
        $result = DB::table('vnt_users')
                        ->select('username','user_language','user_country')
                        ->where('username',$user)
                        ->get();
        foreach ($result as $value) {
            $erro = $value;
        }
        if (isset($erro))
            return "false";
        else
            return "true";  
    }
}
