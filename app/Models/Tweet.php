<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $table = "tweets";//tweetsテーブルと連携するため
    protected $fillable = ["tweet","user_id"];//テーブル保存を楽にするため

}
