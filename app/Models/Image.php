<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";//imagesテーブルと連携するため
    protected $fillable = ["file_name","file_path","file_size"];//テーブル保存を楽にするため
}
