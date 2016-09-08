@include('master._partials.header')
@yield('modalWindows')

@section('title')
@parent
	::{{$title}}
@stop

@section('navTitle')
@parent
	{{$navTitle}}
@stop

<div class="container">
    @include('master._partials.navigation')
    <div class="content-container">
        @yield('content-container')
    </div>
    
@include('master._partials.footer')
</div>

