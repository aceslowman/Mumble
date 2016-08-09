@section('top-navigation')
	<div class="row text-center navigation-wrapper">
		<div class="navigation-list">	
			<ul>
			@if(Auth::check())
				@if(Request::is('/'))
					<li><a href="/people">People</a></li>
					<li><a href="/projects">Projects</a></li>
					<li><a href="/bulletin">Bulletin</a></li>
					<li><a href="/library">Library</a></li>
				
				@elseif(Request::is('people'))
					<li><a href="/">Home</a></li>
					<li><a href="/projects">Projects</a></li>
					<li><a href="/bulletin">Bulletin</a></li>
					<li><a href="/library">Library</a></li>

				@elseif(Request::is('people/*'))
					<li><a href="/">Home</a></li>
					<li><a href="/projects">Projects</a></li>
					<li><a href="/bulletin">Bulletin</a></li>
					<li><a href="/library">Library</a></li>					
				
				@elseif(Request::is('projects'))
					<li><a href="/people">People</a></li>
					<li><a href="/">Home</a></li>
					<li><a href="/bulletin">Bulletin</a></li>				
					<li><a href="/library">Library</a></li>	

				@elseif(Request::is('projects/*'))
					<li><a href="/people">People</a></li>
					<li><a href="/">Home</a></li>
					<li><a href="/bulletin">Bulletin</a></li>				
					<li><a href="/library">Library</a></li>	

				@elseif(Request::is('bulletin'))					
					<li><a href="/people">People</a></li>
					<li><a href="/projects">Projects</a></li>
					<li><a href="/">Home</a></li>
					<li><a href="/library">Library</a></li>		

				@elseif(Request::is('library'))				
					<li><a href="/people">People</a></li>
					<li><a href="/projects">Projects</a></li>
					<li><a href="/bulletin">Bulletin</a></li>
					<li><a href="/">Home</a></li>
				@endif
			@endif		
			</ul>
		</div>
		<div class="navigation-title">
			<h1>
				@section('navTitle')
				@show
			</h1>
		</div>
	</div>
@show
