@extends ('layouts.master')

@section ('stylesheets')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Publish a Post</h1>
		<hr>
		<form method="POST" action="/posts" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>

			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" class="form-control" id="slug" name="slug" required>
			</div>

			<div class="form-group">
				<label for="body">Body</label>
				<textarea id="body" name="body" class="form-control" required></textarea>
			</div>

			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="image">
			</div>

			<div class="form-group">
				<label for="tags">Tags</label>
				<select class="form-control select2-multi" multiple="multiple" name="tags[]">
					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Publish</button>
			</div>

			@include ('layouts.errors')
		</form>
	</div>
@endsection
@section ('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".select2-multi").select2();
		});
	</script>
@endsection