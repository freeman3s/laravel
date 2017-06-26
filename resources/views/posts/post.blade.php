<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="/posts/{{ $post->slug }}">
			{{ $post->title }}
		</a>
	</h2>

	<img src="{{ asset('images/' . $post->image) }}" height="400" width="700" alt="image" />

	<p class="blog-post-meta">
		{{ $post->user->name }} on
		{{ $post->created_at->toFormattedDateString() }}
	</p>

	{{ $post->body }}
</div>