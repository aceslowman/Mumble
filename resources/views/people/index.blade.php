@extends('layouts.index')

@section('toolbar')
    <div class="toolbar">

    </div>
    <div class="clear"></div>
@stop

@section('index')
<div class="index">

    <div class="toolbar-secondary">
        <div>
            <h3>Sort By: Alphabetical (A-Z) <span class="glyphicon glyphicon-chevron-down"></span></h3>
        </div>
        <div class="toolbar-search">
            <form action="" class="toolbar-form">
                <div class="form-group">
                    <input class="toolbar-search-input form-control" type="text" placeholder="Search" />
                </div>
                <button type="submit" class="toolbar-search-submit btn btn-default">Submit</button>
            </form>
        </div>
        <div class="clear"></div>
    </div>

    @foreach ($users as $user)
	<div class="index-item">

		<div class="index-avatar"> 
           <img src="{{ asset($user->avatar_filename) }}">
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
                @foreach($user->tags as $tag)
                    <li>    
                        <button>{{$tag->name}}</button>
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="clear"></div>
		</div>
    	<div class="clear"></div>
	</div>	
    @endforeach 

    <div class="toolbar-secondary">
        <div>
            <h3>Writing</h3>
        </div>
        <div class="clear"></div>
    </div>
</div>
@stop