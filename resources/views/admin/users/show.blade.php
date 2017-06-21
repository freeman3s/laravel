@extends ('admin.master')

@section ('content')
	<div class="col-sm-12 blog-main">
		<div class="form-group">
			<h1>User name: {{ $user->name }}</h1>	
		</div>
		
		<hr>
		
		<div class="form-group">
			User Id: {{ $user->id }}	
		</div>

		<div class="form-group">
			User Role Id: {{ $user->role_id }}	
		</div>

		<div class="form-group">
			User Email: {{ $user->email }}
		</div>

		<div class="form-group">
			Created At: {{ $user->created_at }}
		</div>

		<div class="form-group">
			Updated At: {{ $user->updated_at }}
		</div>				
	</div>
@endsection