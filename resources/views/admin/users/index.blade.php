@extends ('admin.master')

@section ('content')
	<div class="col-sm-12 blog-main">
		<a href="/admin/users/create" class="btn btn-success" role="button">Add User</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Role Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>
					<th>Operations</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<th>{{ $user->id }}</th>
						<th>{{ $user->role_id }}</th>
						<td scope="row">
							<a href="/admin/users/{{ $user->name }}">
								{{ $user->name }}
							</a>
						</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at->toFormattedDateString() }}</td>
						<td>
							<a href="/admin/users/{{ $user->name }}" class="brown-text">View</a>
							<a href="/admin/users/{{ $user->name }}/edit" class="brown-text">Edit</a>
							<a href="/admin/users/{{ $user->name }}/delete" class="brown-text">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<nav class="blog-pagination">
			{{ $users->links() }}
		</nav>
	</div>
@endsection