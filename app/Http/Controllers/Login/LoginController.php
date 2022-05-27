<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Middleware\SimpleAuth;



class LoginController extends Controller
{
     /**
     * 
     * ログイン画面
     */
    public function showlogin()
    {
        //ログインしていたら、url手打ちでもログイン画面出せないようにする
        if(session('simple_auth')){
            return redirect('/list');
        }else{
            //未ログインなら、ログイン画面を出す
            return view('login.login');
        }
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
            session(['name'  => $user[0]->name]);
            
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
