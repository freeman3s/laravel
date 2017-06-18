<div class="blog-masthead">
	<div class="container">
		<nav class="nav blog-nav">
			<a class="nav-link active" href="/">Home</a>
			<a class="nav-link" href="#">New features</a>
			<a class="nav-link" href="#">Press</a>
			<a class="nav-link" href="#">New hires</a>
			@if (Auth::check())
				<li class="nav-item dropdown ml-auto">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
					<div class="dropdown-menu" aria-labelledby="dropdown04">
						<a class="dropdown-item" href="/posts/create">Add Post</a>
						<a class="dropdown-item" href="/logout">Logout</a>
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
			@else
				<a class="nav-link ml-auto" href="/register">Sign Up</a>
				<a class="nav-link" href="/login">Sign In</a>
			@endif
		</nav>
	</div>
</div>