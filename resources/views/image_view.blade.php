@extends('layouts.app')

@section('content')
    <div class="image-list-view">
        <div class="img-wrap-view">
            <img src="{{ Storage::url($image->file_path) }}">
        </div>
        <div class="tweet-body">
            <div class="created-at">
                <div class="date">投稿日：{{ $date }}</div>
                <div class="delete">
                    <a href="/img_del/{{$image->id}}" class="del" onclick="return confirm('削除しますか?')"><img src="/images/del-icon.png" alt=""></a>
                </div>
            </div>
            <hr class="cp_hr04" />
            <p>{{ $tweet->tweet }}</p>
        </div>
    </div>
@endsection