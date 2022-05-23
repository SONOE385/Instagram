<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Middleware\Auth;
use App\Http\Requests\LoginRequest;



class LoginController extends Controller
{
     /**
     * 
     * ログイン画面
     */
    public function showlogin()
    {
        return view('login.login');
    }
    
    
    /**
     * ログイン処理
     * 
    */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->get();

        if (count($user) === 0){

            session()->flash('flash_msg', '会員登録してください。');
            return view('login.login');
        }
        
        // 一致
        if (\Hash::check($request->password, $user[0]->password)) {
            
            // セッション
            session(['id'  => $user[0]->id]);
            
            // フラッシュ
            session()->put("simple_auth", true);

            return redirect(url('/list'));
        // 不一致    
        }else{
            session()->flash('flash_msg', '名前またはパスワードが間違っています。');
            return view('login.login');
        }
    }

    /**
     * ログアウト処理
     * 
     */
    public function logout()
    {
        session()->forget("simple_auth");
        return redirect("/");
        
    }
}
