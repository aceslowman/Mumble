@extends('layouts.home')

@section('modalWindows')
	@include('home.modals.editAccount')
	@include('home.modals.manageProjects')
@stop

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
<div class="col-md-12 panel panel-default">
	<div class="panel-body text-center">
		<h2>Welcome Back, <em>{{ $user->name }}</em></h2>
		<a class="btn btn-default btn-block" href="/people/{{ $user->nick }}">
		    Edit Profile
		</a>
		<button class="btn btn-default btn-block" data-toggle="modal" data-target="#editAccount_modal">
		    Edit Account Information
		</button>
		<button class="btn btn-default btn-block" data-toggle="modal" data-target="#manageProjects_modal">
		    Manage Projects
		</button>	
		<a href="logout" class="btn btn-default">Logout</a>
	</div>
</div>
<div class="clear"></div>
@stop

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#account-info_submit").click(function(event){
				//first, check to see if anything is even set
				event.preventDefault();

				if($("#update-email-valid").val()&&$("#update-email-valid").val()==$("#update-email").val()){
					if($("#update-email").val() !== ""){
						alert('Email is valid');
					}else{
						alert('No empty strings allowed');
						return;
					}					
				}

				$("#update-user").submit();
			});
		});
	</script>
@stop
