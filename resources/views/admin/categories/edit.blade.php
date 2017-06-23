@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Edit Category</h1>
		<hr>
		<form method="POST" action="/admin/categories/{{ $category->id }}/update">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Name</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>

			@include ('layouts.errors')
		</form>
	</div>
@endsection