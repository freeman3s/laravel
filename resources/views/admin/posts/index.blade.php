@extends ('admin.master')

@section ('content')
	<div class="col-sm-12 blog-main">
		<a href="/posts/create" class="btn btn-success" role="button">Add Post</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Body</th>
					<th>Published</th>
					<th>Operations</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td scope="row">
							<a href="/posts/{{ $post->id }}">
								{{ $post->title }}
							</a>
						</td>
						<td>{{ $post->body }}</td>
						<td>{{ $post->created_at->toFormattedDateString() }}</td>
						<td>
							<a href="/posts/{{ $post->id }}" class="brown-text">View</a>
							<a href="/admin/posts/{{ $post->id }}/edit" class="brown-text">Edit</a>
							<a href="/admin/posts/{{ $post->id }}/delete" class="brown-text">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection