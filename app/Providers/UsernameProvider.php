<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UsernameProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //ヘッダーにログインしたユーザーネームを表示させるため、
        //Http\Composers\UserNameComposerを読み込み、header.blade.phpを読み込む
        
        View::composer(
            'layouts.header','App\Http\Composers\UserNameComposer',
            // 'image_view','App\Http\Composers\UserNameComposer',
        );
    }
}
