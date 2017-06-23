@extends ('layouts.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>{{ $post->title }}</h1>

		<hr>

		@if (count($post->tags))
			<ul>
				@foreach ($post->tags as $tag)
					<li>
						<a href="/posts/tags/{{ $tag->name }}">
							{{ $tag->name }}
						</a>
					</li>
				@endforeach
			</ul>
		@endif

		<img src="{{ asset('images/' . $post->image) }}" height="400" width="700" alt="image" />

		{{ $post->body }}
	
		<hr>

		<h5>Category: {{ $post->category->name }}</h5>
		
		<hr>

		<div class="comments">
			<ul class="list-group">
				@foreach ($post->comments as $comment)
					<li class="list-group-item">
						<strong>
							{{ $comment->created_at->diffForHumans() }}: &nbsp;
						</strong>
						{{ $comment->body }}
					</li>
				@endforeach
			</ul>
		</div>

		{{-- Add a comment --}}
		<hr>

		<div class="card">
			<div class="card-block">
				<form method="POST" action="/posts/{{ $post->slug }}/comments">
					{{ csrf_field() }}

					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>

				@include ('layouts.errors')
			</div>
		</div>
	</div>
@endsection