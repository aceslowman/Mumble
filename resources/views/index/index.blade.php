@extends('index.layout')

@section('toolbar')
    <div class="toolbar">

    </div>
    <div class="clear"></div>
@stop

@section('index')
<div class="index">

    <div class="searchresult-wrapper"></div>

    <div class="toolbar-secondary">
        <div class="search-dropdown">
            <h3>Sort By: <span class="search-term">Alphabetical (A-Z)</span> <button class="dropdown-select"><span class="glyphicon glyphicon-chevron-down"></span></button></h3>
            <ul>
                <li><a class="alpha-az">Alphabetical (A-Z)</a></li>
                <li><a class="tags-az">Tags (A-Z)</a></li>
                <li><a class="available-az">Availability</a></li>
            </ul>
        </div>
        <div class="toolbar-search">
            <form name="index-search" method="POST" class="toolbar-form">
                <div class="form-group">
                    <input name="search-data" class="toolbar-search-input form-control" type="text" placeholder="Search" />
                </div>
                <button type="submit" class="toolbar-search-submit btn btn-default">Submit</button>
            </form>
        </div>
        <div class="clear"></div>
    </div>

    <div class="index-item-wrapper">
        @foreach ($users as $user)

    	<div class="index-item" style="background-image:url('{{ '../img/user_photos/index_'.$user->profile['carousel']['photos'][0]['filename'] }}')">
    		<div class="index-avatar"> 
                <img src="/img/avatars/{{'small_'.$user->avatar_filename}}">
    		</div>	
        	<div class="index-name"> 
    			<h2 class="item-name"><a href="people/{{ $user->nick }}">{{$user->name}}</a></h2>
    			<h3 class="item-nick">{{'@'.$user->nick}} </h3>
    			<a href="people/empty">
    				<h5>
                        {{$user->status}}
                        @if($user->available)
                            <span class="glyphicon glyphicon-ok-circle" style="color:green;margin-left:10px;margin-top:2px;"></span>
                        @else
                            <span class="glyphicon glyphicon-remove-circle" style="color:red;margin-left:10px;margin-top:2px;"></span>
                        @endif
                    </h5>
    			</a>
    		</div>
        	<div class="index-list">
    			<h3>Tags:</h3>
                <div class="tag-container">
                    <ul>
                    @foreach($user->tags as $key=>$tag)
                        @if($key < 10)
                            <li>    
                                <button>{{$tag->name}}</button>
                            </li>
                        @endif
                    @endforeach
                    @if(count($user->tags) > 10)
                        <li><a href=""><em>... {{ count($user->tags)-10 }} more</em></a></li>
                    @endif
                    </ul>
                </div>
                <div class="clear"></div>
    		</div>
        	<div class="clear"></div>
    	</div>	
        @endforeach 
    </div>
<!--         
    <div class="toolbar-secondary">
        <div>
            <h3>{{ $tag->name }}</h3>
        </div>
        <div class="clear"></div>
    </div>
    -->
</div>
@stop