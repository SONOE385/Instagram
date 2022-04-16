<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class UploadImageController extends Controller
{
    //
    function show(){
        return view("upload_form");
    }

    //uploadフォームの遷移先
    
    function upload(Request $request){
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg'
        ]);
        $upload_image = $request->file('image');

        if($upload_image){
            //アップロードされた画像を保存する.
            //$pathには画像のパスが入る
            $path = $upload_image->store('uploads','public');

            if($path){
                Image::create([
                    'file_name' => $upload_image->getClientOriginalName(),
                    'file_path' => $path
                ]);
            }
        }
        return redirect('/');
    }
}
