<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\User;

class UserNameComposer
{
    //Providers\UsernameProviderに基づいて、
    //ビューで{{$user_name}}とした箇所にセッションのidからnameをfindして表示させる
    public function compose(View $view)
    {
        if(session()->has('id')){
            $view->with('user_name',User::find(session("id"))->name);
        }
        // }else{
        //     $view->with('user_name'->null);
        // }
    }
}