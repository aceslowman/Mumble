@extends('layouts.forum')

@section('modalWindows')
    @include('forum.modals.createPost')
@stop

@section('toolbar')
    <div class="row col-md-12 center-block toolbar">
      <div class="center-block">
            <button class="btn btn-link toolbar-button" data-toggle="modal" data-target="#createPost_modal">
                <h4><span class="glyphicon glyphicon-plus"></span><span class="hidden-xs">&nbsp;&nbsp;&nbsp;New Bulletin Post</span></h4>
            </button>
        </div>
    </div>
    <div class="clear"></div>
@stop

@section('forum')
            <div class="center-block">
            @foreach($posts as $post)
                <div class="panel panel-info forum-panel">
                    <div class="forum-heading">
                        <div class="pull-left forum-post-title">
                            <h4>{{$post->title}}</h4>
                        </div>
                        <div class="pull-right forum-post-date">
                            <p>January 1st, 1978</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="panel-body forum-body">
                        <div class="col-md-3 forum-user-author">            
                            <img class="item-avatar img-responsive" src="{{ asset('img/avatars/slominski_avatar.jpg') }}" alt="Profile Picture">
                            <h2 class="item-name"><a href="people/AustinSlominski">{{$post->user->name}}</a></h2>
                            <h3 class="item-nick">{{'@'.$post->user->nick}}</h3>
                        </div>
                        <div class="col-md-9 forum-content"> 
                            {!! $post->body !!}
                        </div>
                    </div>
                    <div class="panel-footer forum-footer">
                        <div class="pull-left">
                            <button class="btn btn-link" data-toggle="modal" data-target="#newComment"><small>+ Expand for Comments</small></button>
                        </div>
                        <div class="pull-right forum-edit-links">
                            <a href=""><small>Delete</small></a> | <a href=""><small>Edit</small></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            @endforeach
            </div>
@stop