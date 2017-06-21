@extends ('admin.master')

@section ('content')
	<div class="col-sm-12 blog-main">
		<a href="/admin/tags/create" class="btn btn-success" role="button">Add Tag</a>
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
				@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td scope="row">
							<a href="/posts/tags/{{ $tag->name }}">
								{{ $tag->name }}
							</a>
						</td>
						<td>{{ $tag->created_at->toFormattedDateString() }}</td>
						<td>
							<a href="/admin/tags/{{ $tag->name }}/edit" class="brown-text">Edit</a>
							<a href="/admin/tags/{{ $tag->name }}/delete" class="brown-text">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<nav class="blog-pagination">
			{{ $tags->links() }}
		</nav>
	</div>
@endsection