@extends('layouts.app')

@section('content')
    <div class="image-list-view">
        <div class="img-wrap-view">
            <img src="{{ Storage::url($image->file_path) }}">
        </div>
        <div class="tweet-body">
            <div class="cereated-at">
                {{ $date }}
            </div>
            <p>{{ $tweet->tweet }}</p>
        </div>
    </div>
@endsection