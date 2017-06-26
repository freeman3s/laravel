@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Edit Category</h1>
		<hr>
		{!! Form::model($category, ['action' => ['Admin\CategoriesController@update', $category->id]]) !!}
			@include ('admin.categories._form')
			<div class="form-group">
				{!! Form::submit('Update Category', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}
		@include ('layouts.errors')
	</div>
@endsection