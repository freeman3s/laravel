@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Create a Tag</h1>
		<hr>
		{!! Form::open(['url' => route('admin.tags.store')]) !!}
			@include ('admin.tags._form')
			<div class="form-group">
				{!! Form::submit('Add Tag', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}
		@include ('layouts.errors')
	</div>
@endsection