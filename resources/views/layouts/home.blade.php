@extends('layouts.master')

@section('title')
@parent
	::{{$title}}
@stop

@section('navTitle')
@parent
	{{$navTitle}}
@stop

@section('content-container')
	<div class="home-panel">
		@yield('content')
	</div>
@stop

@section('scripts')

@stop
