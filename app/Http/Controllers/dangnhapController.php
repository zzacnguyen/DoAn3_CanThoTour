<?php

namespace App\Http\Controllers;
use App\nguoidungModel;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use DB;
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
                $user_dn[] = array('id' => Auth::user()->id,'nd_tendangnhap' => Auth::user()->nd_tendangnhap,'nd_avatar' => Auth::user()->nd_avatar,'nd_loainguoidung' => Auth::user()->nd_loainguoidung); 
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

    public function dangky(Request $request)
    {
        // kiểm tra tên đăng nhập có bị trùng hay không
        //mật khẩu có độ dài 4-20 ký tự
        $erro = array(
            '1' => 'Tên tài khoản và mật khẩu không được để trống',
            '2' => 'Mật khẩu phải có độ dài từ 6-20 ký tự',
            '3' => 'Tên tài khoản đã tồn tại',
            '4' => 'Tài khoản có độ dài từ 5-25 ký tự',
            '5' => 'Đăng ký thành công'
        );

        $taikhoan = $request->input('taikhoan');
        $password = $request->input('password');
        $quocgia  = $request->input('quocgia');
        $ngonngu  = $request->input('ngonngu');

        if (empty($taikhoan) && empty($password)) // kiểm tra rỗng
            return $erro['1'];
        else if (strlen($password) < 6 || strlen($password) > 20) //kiểm tra độ dài pass
            return $erro['2'];
        else if (strlen($taikhoan) < 5 || strlen($taikhoan) > 25) // kiểm tra độ dài tên tài khoản
            return $erro['4'];
        else if ($this->kiemtra_taikhoan($taikhoan) == "false") // kiểm tra tài khoản tồn tại
            return $erro['3'];
        else
        {
            $nguoidung                      = new nguoidungModel();
            $nguoidung->nd_tendangnhap      = $taikhoan;
            $nguoidung->password            = bcrypt($password);
            $nguoidung->nd_ngonngu          = $ngonngu;
            $nguoidung->nd_quocgia          = $quocgia;
            $nguoidung->save();
            return $erro['5'];
        }
    }

    function kiemtra_taikhoan($taikhoan){
        $result = DB::table('dlct_nguoidung')
                        ->select('nd_tendangnhap','nd_ngonngu','nd_quocgia')
                        ->where('nd_tendangnhap',$taikhoan)
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
