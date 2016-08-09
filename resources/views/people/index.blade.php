@extends('layouts.index')

@section('toolbar')
    <div class="row col-md-12 center-block toolbar">
        <div class="toolbar-search" style="color:white;">
            <form action="" class="toolbar-form toolbar-left form-inline">
                <div class="form-group">
                    <input class="toolbar-search-input form-control" type="text" placeholder="Search" />
                </div>
                <button type="submit" class="toolbar-search-submit btn btn-default">Submit</button>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
@stop

@section('index')
<div class="index">

    @foreach ($users as $user)
	<div class="index-panel panel_1 col-md-12">
		<div class="index-avatar-panel panel-body pull-left col-md-2"> 
           <img class="index-img img-responsive" src="{{ asset($user->avatar_filename) }}">
		</div>	
		<div class="index-name-panel panel-body pull-left col-md-6"> 
			<h2 class="item-name"><a href="people/{{ $user->nick }}">{{$user->name}}</a></h2>
			<h3 class="item-nick">{{'@'.$user->nick}} </h3>
			<a class="peopleLink" href="people/empty">
				<h5>{{$user->status}}
                @if($user->available)
                    <span class="glyphicon glyphicon-ok-circle" style="color:green;margin-left:10px;margin-top:2px;"></span>
                @else
                    <span class="glyphicon glyphicon-remove-circle" style="color:red;margin-left:10px;margin-top:2px;"></span>
                @endif
                </h5>
			</a>
		</div>
		<div class="index-list-panel panel-body pull-left col-md-4">
			<h3>Tags:</h3>
                <div class="tagContainer">
                    <ul class="tag-label">
                    @foreach($user->tags as $tag)
                        <li>    
                            <button class="btn btn-primary btn-label tagMain">{{$tag->name}}</button>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>	
    @endforeach 
</div>
@stop