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
	@yield('toolbar')
	@yield('index')
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@stop










		