@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Create a Tag</h1>
		<hr>
		<form method="POST" action="/admin/tags">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Name</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
			
		@include ('layouts.errors')
		</form>
	</div>
@endsection