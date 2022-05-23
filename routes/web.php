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

//ログイン画面
Route::get('/',[App\Http\Controllers\Login\LoginController::class, "showlogin"])->name("showlogin");

//ログインメソッド
Route::post('/login',[App\Http\Controllers\Login\LoginController::class, "login"])->name("login");

//ログアウトメソッド
Route::post('/logout',[App\Http\Controllers\Login\LoginController::class, "logout"])->name("logout");

//会員登録画面
Route::get('/register',[App\Http\Controllers\Login\RegisterController::class, "register"])->name("register");

//会員登録メソッド
Route::post('/register-user',[App\Http\Controllers\Login\RegisterController::class, "registerUser"])->name("register-user");




//画像投稿ページ
Route::get('/form',[App\Http\Controllers\UploadImageController::class, "show"])->name("upload_form");

//画像投稿ルート
Route::post('/upload',[App\Http\Controllers\UploadImageController::class, "upload"])->name("upload_image");

//投稿一覧
Route::get('/list',[App\Http\Controllers\ImageListController::class, "show"])->name("image_list");

//投稿詳細
Route::get('/list/{id}',[App\Http\Controllers\ImageListController::class, "view"])->name("image_view");
