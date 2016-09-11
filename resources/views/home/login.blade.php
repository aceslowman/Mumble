@extends('home.layout')

@section('content')
	@if(App::environment('staging')||App::environment('development'))
	    <div class="helptip">
	        <div class="panel-body text-center">
	            The site is up for some early review! There are still some features necessary before account creation can begin, but you can log in to the test system below. <em>Many</em> things still don't work, including responsive design, project management, and forum use. Coming ASAP.
	        </div>
	    </div>
	@endif

	@if(count($errors)>0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		</div>
	@endif

	@if(session('status'))
		<div class="alert alert-info">
			{{session('status')}}
		</div>
	@endif

	@if(session('error'))
		<div class="alert alert-danger">
			{{session('error')}}
		</div>
	@endif

	<h2>Login</h2>
	<form action="login" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="email">Email Address</label>
			<input name="email" type="email" class="form-control" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input name="password" type="password" class="form-control" placeholder="Password">
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember">Remember Me
			</label>
		</div>
		<button type="submit" class="btn btn-default">Log In</button>
		@if(App::environment('development'))
		<div class="pull-right">
			<button type="button" class="btn btn-warning">Forgot Password</button>
			<button type="button" class="btn btn-success">Sign Up</button>
		</div>
		@endif
	</form>	
@stop
