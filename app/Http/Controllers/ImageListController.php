<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageListController extends Controller
{
    
    function show(){
        //アップロードした画像を取得して一覧で表示
        $uploads = Image::orderBy('id','desc')->get();

        return view('image_list',[
            'images'=>$uploads
        ]);
    }
}
