<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Middleware\Auth;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    /**
     * 
     * 会員登録画面
     */
    public function register()
    {
        return view('login.register');
    }

    /**
     * 
     * 会員情報をDBに登録
     */
    public function registerUser(RegisterRequest $request)
    {
        $inputs = $request->all();

        $inputs['password'] = \Hash::make($inputs['password']);//パスワードを暗号化して全体を取得

        User::create($inputs);

        return view('login.login');
    }
}


