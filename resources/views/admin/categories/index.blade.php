@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Categories</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Published</th>
					<th>Operations</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td scope="row">
							{{ $category->name }}
						</td>
						<td>{{ $category->created_at->toFormattedDateString() }}</td>
						<td>
							<a href="/admin/categories/{{ $category->id }}/edit" class="brown-text">Edit</a>
							<a href="/admin/categories/{{ $category->id }}/destroy" class="brown-text">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<nav class="blog-pagination">
			{{ $categories->links() }}
		</nav>
	</div>

	<div class="col-md-4">
		<div class="well">
			<form method="POST" action="/admin/categories">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="title">New Category</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Create New Category</button>
				</div>

				@include ('layouts.errors')
			</form>
		</div>
	</div>
@endsection