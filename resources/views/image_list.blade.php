@extends('layouts.app')

@section('content')
    <div class="image-list">
         {{-- フラッシュメッセージ --}}
            <script type="text/javascript">
                // {{--成功時--}}
                @if (session('msg_success'))
                    $(function () {
                            toastr.success('{{ session('msg_success') }}');
                    });
                @endif

                @if (session('err_msg'))
                    $(function () {
                            toastr.success('{{ session('err_msg') }}');
                    });
                @endif

                // {{--失敗時--}}
                @if (session('msg_danger'))
                    $(function () {
                        toastr.danger('{{ session('msg_danger') }}');
                    });
                @endif
            </script>

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