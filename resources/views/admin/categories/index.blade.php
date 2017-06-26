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
			{!! Form::open(['url' => route('admin.categories.store')]) !!}
				@include ('admin.categories._form')
				<div class="form-group">
					{!! Form::submit('Create New Category', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			{!! Form::close() !!}
			@include ('layouts.errors')
		</div>
	</div>
@endsection