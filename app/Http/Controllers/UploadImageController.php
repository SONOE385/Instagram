<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Tweet;

class UploadImageController extends Controller
{
    //  投稿一覧表示
    function show(){
        return view("upload_form");
    }

    
    //画像とツイートを投稿してDBに保存
    function upload(Request $request){
        $tweet = $request->body;
        //  複数選択設定ができたらつける
        // $request->validate([
        //     'image' => 'required|file|image|mimes:png,jpg'
        // ]);
        
        $upload_image = [];

        if($request->has('image')){
            foreach($request->image as $image){
                //アップロードされた画像を保存する（$oath= 画像のパス）
                $path[] = $image->store('uploads','public');
            }
        }

        // print_r($upload_image);
        // exit;

        //$tweet_idにuser_idとtweetを格納(viewに渡せるように)
        $tweet_id = Tweet::insertGetId([
            'user_id' => session('id'),/**LoginControllerでセッションからidを取得しているから**/
            'tweet' => $tweet
        ]);

        if($path){
            foreach ($path as $val) {
                Image::create([
                    // 'file_name' => $upload_image->getClientOriginalName(),
                    'file_path' => $val,
                    'tweet_id' => $tweet_id
                ]);
            }
        }

        return redirect('/list');
    }
}


    
