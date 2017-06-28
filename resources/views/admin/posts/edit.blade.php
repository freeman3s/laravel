@extends ('admin.master')

@section ('stylesheets')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Update Post</h1>
		<hr>
		{!! Form::model($post, ['action' => ['Admin\PostsController@store', $post->slug], 'files' => true]) !!}
			<div class="form-group">
				{!! Form::label('title', 'Title:') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('slug', 'Slug:') !!}
				{!! Form::text('slug', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('body', 'Body:') !!}
				{!! Form::text('body', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Html::image('images/' . $post->image ) !!}
				{!! Form::label('image', 'New Image:') !!}
				{!! Form::file('image', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('tags', 'Tags:') !!}
				{!! Form::select('tags', $tags, null, ['class' => 'form-control select2-multi', 'multiple'=>'multiple']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('category_id', 'Category:') !!}
				{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update Post', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}

		@include ('layouts.errors')
	</div>
@endsection
@section ('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".select2-multi").select2();
			$(".select2-multi").select2().val({{ json_encode($post->tags()->allRelatedIds()) }}).trigger('change');
		});
	</script>
@endsection