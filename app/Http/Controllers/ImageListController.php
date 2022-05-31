<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class ImageListController extends Controller
{
/**
     * 一覧表示用のメソッド
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sort = $request->sort;
        $image = Image::orderBy('id','desc')->paginate(9);

        return view("image_list", ['images' => $image, 'sort' => $sort]);
    }


     /**
     * 個人表示用のメソッド
     *
     * @return \Illuminate\Http\Response
     */
    public function user_show(Request $request)
    {
        // ユーザーごとの投稿を表示
        $sort = $request->sort;
        $image = Image::where("user_id",session("id"))//まずuser_idとセッションの紐づけ


                ->leftJoin("tweets","tweets.id","images.tweet_id")//tweetsテーブルを指定,tweetsのidを指定,imagesテーブルのtweet_idをジョイン
                ->orderBy('images.id','desc')
                ->paginate(9);
        // $image = User::where('id', '=', $tweet_id '=' $a)->orderBy('id', 'desc')->paginate(9);

        return view("user_image_list", ['images' => $image, 'sort' => $sort]);
    }


    //投稿画像詳細画面
    public function view($id)//引数に$idを入れるとControllerからidを受け取れる
    {
        $image = Image::find($id);//該当idの投稿を引っ張てくる(imageテーブルの中にtweet_idもあるので同時にとれる)

        if(is_null($image)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('image_list'));
        }

        $tweet = Tweet::find($image->tweet_id);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $image->created_at)->format('Y/m/d H:i');


        return view('image_view',
        [
            'image' => $image,
            'tweet' => $tweet,
            'date' => $date,
        ]);
    }

}
