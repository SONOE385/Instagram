@extends('layouts.app')

@section('content')
    <div class="image-list">
        <div class="img-wrap-view">
            <img src="{{ Storage::url($image->file_path) }}">
        </div>
        <div class="tweet-body">
            <p>{{ $tweet->tweet }}</p>
        </div>
    </div>
    <div class="image-comment">
        
    </div>
@endsection