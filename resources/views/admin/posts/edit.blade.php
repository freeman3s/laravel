@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Update Post</h1>
		<hr>
		<form method="POST" action="/admin/posts/{{ $post->slug }}/store" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
			</div>

			<img src="{{ asset('images/' . $post->image) }}" height="400" width="700" alt="image" />

			<div class="form-group">
				<label for="image">New Image</label>
				<input type="file" name="image">
			</div>

			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" class="form-control" id="title" name="slug" value="{{ $post->slug }}" required>
			</div>

			<div class="form-group">
				<label for="body">Body</label>
				<textarea id="body" name="body" class="form-control" required>{{ $post->body }}</textarea>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>

			@include ('layouts.errors')
		</form>
	</div>
@endsection