@extends('layouts.app')

<head>
@include('layouts.header')
<hr />
</header>

<div class="image-list">
    <div class="img-wrap">
        @foreach($images as $image)
            <img src="{{ Storage::url($image->file_path) }}">
            {{--<p>{{ $image->file_name }}</p>--}}
        @endforeach     
    </div>

   
</div>