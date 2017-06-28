<!DOCTYPE html>
<html>
<head>
	<title>Create Project</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.css">
	<style type="text/css">
		body {
			padding-top: 40px;
		}
	</style>
</head>
<body>
	<div id="app" class="container">
		@if ($projects)
			<h2>My Projects</h2>
			<ul>
				@foreach ( $projects as $project)
					<li>{{ $project->name }}</li>
				@endforeach
			</ul>
			{{ $projects->links() }}
			<hr>
		@endif
		<form action="/projects" method="POST" @submit.prevent="onSubmit"  @keyDown="errors.clear($event.target.name)">
			<div class="control">
				<label for="name" class="label">Project Name:</label>

				<input type="text" id="name" name="name" class="input" v-model="name">

				<span class="help is-danger" v-if="errors.has('name')" v-text="errors.get('name')"></span>
			</div>

			<div class="control">
				<label for="description" class="label">Project Description:</label>

				<input type="text" id="description" name="description" class="input" v-model="description">

				<span class="help is-danger" v-if="errors.has('description')" v-text="errors.get('description')"></span>
			</div>

			<div class="control">
				<button class="button is-primary" :disabled="errors.any()">Create</button>
			</div>
		</form>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>
	<script src="https://unpkg.com/vue@2.3.4"></script>
	<script src="/js/app.js"></script>

</body>
</html>