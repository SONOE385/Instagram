<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    //httpsのCSSを読み込ませるために記述
    if (config('app.env') === 'production') {
        URL::forceScheme('https');
    }


    //ログイン画面
    Route::get('/',[App\Http\Controllers\Login\LoginController::class, "showlogin"])->name("showlogin");

    //ログインメソッド
    Route::post('/login',[App\Http\Controllers\Login\LoginController::class, "login"])->name("login");

    //会員登録画面
    Route::get('/register',[App\Http\Controllers\Login\RegisterController::class, "register"])->name("register");

    //会員登録メソッド
    Route::post('/register-user',[App\Http\Controllers\Login\RegisterController::class, "registerUser"])->name("register-user");



Route::middleware('simple_auth')->group(function(){
    
    //個人の投稿一覧
    Route::get('/user_image_list',[App\Http\Controllers\ImageListController::class, "user_show"])->name("user_image_list");

    //投稿一覧画面(ミドルウェアつき)
    Route::get('/list', [App\Http\Controllers\ImageListController::class, "show"])->name("image_list");
    
    //ログアウトメソッド
    Route::post('/logout',[App\Http\Controllers\Login\LoginController::class, "logout"])->name("logout");

    //画像投稿ページ
    Route::get('/form',[App\Http\Controllers\UploadImageController::class, "show"])->name("upload_form");

    //画像投稿ルート
    Route::post('/upload',[App\Http\Controllers\UploadImageController::class, "upload"])->name("upload_image");

    //投稿詳細
    Route::get('/list/{id}',[App\Http\Controllers\ImageListController::class, "view"])->name("image_view");
    
    //投稿削除
    Route::get('/img_del/{id}', [App\Http\Controllers\ImageListController::class, 'exeDelete'])->name('img_destroy');

    
});

