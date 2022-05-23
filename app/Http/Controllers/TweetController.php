<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;


class TweetController extends Controller
{
    /**
     * tweetの新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request)
    {   
        $rules = [
            'tweets' => ['required', 'string'],
        ];

        $this->validate($request, $rules);

        $user=Auth::user();

        $tweet = new Tweet;
        $tweet->user_id = $user->id;
        $tweet->user_id = $request->user_id;
        $tweet->save();

        return redirect()->route('tweet.create')->with('message', '作成しました。');
    }

}
