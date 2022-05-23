@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="post-form">
	<form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
		@csrf
		<div class="flex-body" width="100%"; text-align="center";>
			<div id="parent-file-area" style="display:flex; width:200px;">
				<div id="clone">
					<div class="file-area">
						<img src="" class="js-preview" width="200px";><br>
						<label class="filelabel">
							ファイルを添付
							<input type="file" name="image[]" class="js-img" accept="image/png, image/jpeg">
						</label>
					</div>
				</div>
			</div>
		</div>
		<button type="button" id="add-file">追加</button>

		<div class="form-group">   
			<textarea class="form-control" placeholder="投稿コメント" rows="5" name="body"></textarea>
		</div>
		
		<button type="submit" name="file" >投稿</button>
	</form>
</div>
@endsection