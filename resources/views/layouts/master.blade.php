@include('layouts.partials.header')
@yield('modalWindows')

<div class="container">
    @include('layouts.partials.navigation')
    <div class="content-container">
        @yield('content-container')
    </div>
@include('layouts.partials.footer')
</div>

