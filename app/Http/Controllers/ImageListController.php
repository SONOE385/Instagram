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

        /**
     * 投稿編集
     * @param int $id
     * @return view
     */
    public function showEdit($id)//引数に$idを入れるとControllerからidを受け取れる
    {
        $edit = Image::find($id);//該当idの投稿の中身を引っ張てこれる

        if(is_null($edit)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('/list'));
        }

        return view('image_edit',
        ['image' => $image]);
    }

    /**
     * ブログを更新する
     * @return view
     */
    public function exeUpdate(Request $request)
    {
        //投稿のデータを受け取る
        $inputs = $request->all();

        //dd($inputs);

        \DB::beginTransaction();//重要

        try{
            //投稿更新を登録
            $image = Image::find($inputs['id']);//ブログを取得

            $image->fill([
                'title' => $inputs['title'],//アップデート。titleを$inputsの中身に更新
                'content' => $inputs['content'],//〃
            ]);
            $image->save();

            \DB::commit();

        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg','ブログを更新しました。');
        return redirect(route('blogs'));
    }


    /**
     * 投稿を削除する
     * @param int $id
     * @return view
     */
    public function exeDelete($id)//引数に$idを入れるとControllerからidを受け取れる
    {
        if(empty($id)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('blogs'));
        
        }
        try{
            //ブログ削除
            Blog::destroy($id);//該当idのブログの中身を引っ張てこれる
        }catch(\Throwable $e){
            abort(500);
        }
            \Session::flash('err_msg','削除しました。');
            return redirect(route('blogs'));
        
    }

    
}



