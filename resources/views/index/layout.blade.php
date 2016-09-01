@extends('master.layout')

@section('content-container')
	@yield('toolbar')
	@yield('index')
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@stop










		