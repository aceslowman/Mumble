@section('footer')
<div class="footer">
    <hr>
    <ul>
        <small>
        @if(App::environment('development'))
            <li><span style="color:red">DEVELOPMENT MODE</span></li>
        @elseif(App::environment('staging'))
        	<li><span style="color:red">STAGING MODE</span></li>
        @endif
            <li>Mumble &copy; 2016</li>
            <li><a href="https://github.com/AustinSlominski/Mumble">Follow project on GitHub</a></li>
        </small>
    </ul>
</div>
@section('scripts')
@show
</body>
</html>
@show
