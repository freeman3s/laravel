@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Edit Tag</h1>
		<hr>
		{!! Form::model($tag, ['action' => ['Admin\TagsController@update', $tag->name]]) !!}
			@include ('admin.tags._form')
			<div class="form-group">
				{!! Form::submit('Update Tag', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}
		@include ('layouts.errors')
	</div>
@endsection