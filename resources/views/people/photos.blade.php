@extends('layouts.photos')

@section('modalWindows')
@stop

@section('toolbar')
    <div class="toolbar">
        <div>
            
        </div>
    </div>
    <div class="clear"></div>
@stop

@section('photos')
<div class="photos">
    <h2>Your photos:</h2>
    	<ul>
    		<li><img class="img-responsive" src="/img/avatars/{{'medium_'.$user->avatar_filename}}"></li>
    		<li><img class="img-responsive" src="/img/avatars/{{'medium_'.$user->avatar_filename}}"></li>
    		<li><img class="img-responsive" src="/img/avatars/{{'medium_'.$user->avatar_filename}}"></li>
    	</ul>
    <h2>Carousel:</h2>
        <ul>
    		<li><img class="img-responsive" src="/img/avatars/{{'medium_'.$user->avatar_filename}}"></li>
    		<li><img class="img-responsive" src="/img/avatars/{{'medium_'.$user->avatar_filename}}"></li>
    		<li><img class="img-responsive" src="/img/avatars/{{'medium_'.$user->avatar_filename}}"></li>
    	</ul>
</div>
@stop