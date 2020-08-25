<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function postLogin(Request $request){
        $validatorLogin = Validator::make($request->all(), 
            [
                'email'=>'required|email',
                'password'=>'required|min:8|max:20',
            ],[
                'email.required'=>'Không để trống email',
                'email.email'=>'Email không hợp lệ',
                'password.min'=>'Mật khẩu phải dài hơn 8 kí tự',
                'password.max'=>'Mật khẩu dài không quá 20 kí tự'
            ]
        );
        if ($validatorLogin->fails()) {
            return redirect()->back()->withErrors($validatorLogin, 'login');
        }

        $remember_me = $request->has('remember_me') ? true : false;
        $data = array('email'=>$request->email,'password'=>$request->password);

        if(Auth::attempt($data) ){
            if( Auth::user()->permision != 2 ){
                Auth::logout();
                return redirect()->back()->with(['feedback'=>'fail','massage'=>'Email hoặc mật khẩu không đúng, vui lòng thử lại']);
            }else{
                return redirect()->back()->with(['feedback'=>'success','massage'=>'Đăng nhập thành công']);
            }
        }else{
            return redirect()->back()->with(['feedback'=>'fail','massage'=>'Email hoặc mật khẩu không đúng, vui lòng thử lại']);
        }
        
    }
    public function getLogout(){
        if(Auth::user()->permision == 2){
            Auth::logout();
            return redirect()->route('userHomePage');
        }
        
    }
}