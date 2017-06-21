@extends ('admin.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Update a User</h1>
		<hr>
		<form method="POST" action="/admin/users/{{ $user->name }}/update">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="role_id">Rore Id</label>
				<input type="text" class="form-control" id="role_id" name="role_id" value="{{ $user->role_id }}" required>
			</div>

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
			</div>

			<div class="form-group">
				<label for="email">Email Address:</label>
				<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" required>
			</div>

			<div class="form-group">
				<label for="password_confirmation">Password Confirmation:</label>
				<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ $user->password }}" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>

			@include ('layouts.errors')
		</form>
	</div>
@endsection