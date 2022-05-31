@extends('layouts.app')

@section('content')
    <div class="image-list">
        <div class="img-wrap">
            @foreach($images as $image)
            <a href="/list/{{ $image->id }}"><img src="{{ Storage::url($image->file_path) }}"></a>
            @endforeach     
            <div class="d-flex justify-content-center">
                {{ $images->links() }}
            </div>
        </div>
    </div>
@endsection