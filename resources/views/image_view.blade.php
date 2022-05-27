@extends('layouts.app')

@section('content')
    <div class="image-list-view">
        <div class="img-wrap-view">
            <img src="{{ Storage::url($image->file_path) }}">
        </div>
        <div class="tweet-body">
            <div class="cereated-at">
                投稿日：{{ $date }}
            </div>
            <hr class="cp_hr04" />
            <p>{{ $tweet->tweet }}</p>
        </div>
    </div>
@endsection