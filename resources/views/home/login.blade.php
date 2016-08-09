@extends('layouts.home')

@section('content')
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
	<form class="" method="POST" action="">
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
		<button type="submit" class="btn btn-default">Submit</button>
	</form>	
@stop
