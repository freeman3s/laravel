@extends ('admin.master')

@section ('content')
	<div class="col-sm-12 blog-main">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Body</th>
					<th>Published</th>
					<th>Operations</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($comments as $comment)
					<tr>
						<th>{{ $comment->id }}</th>
						<td scope="row">
							<a href="/posts/{{ \App\Post::find($comment->post_id)->slug }}"> 
								{{ $comment->body }}
							</a>
						</td>
						<td>{{ $comment->created_at->toFormattedDateString() }}</td>
						<td>
							<a href="/posts/{{ \App\Post::find($comment->post_id)->slug }}" class="brown-text">View</a>
							<a href="/admin/comments/{{ $comment->id }}/edit" class="brown-text">Edit</a>
							<a href="/admin/comments/{{ $comment->id }}/delete" class="brown-text">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection