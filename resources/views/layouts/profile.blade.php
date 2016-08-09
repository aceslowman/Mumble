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
	@yield('carousel')
    @yield('status')
    @yield('pageNav')
	@yield('content')
@stop

@section('scripts')

@stop
