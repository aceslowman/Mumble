@extends('layouts.forum')

@section('modalWindows')
    @include('forum.modals.createPost')
@stop

@section('toolbar')
    <div class="toolbar">
        <div>
            <button data-toggle="modal" data-target="#createPost_modal">
                <h4>
                    <span class="glyphicon glyphicon-plus"></span><span>New Bulletin Post</span>
                </h4>
            </button>
        </div>
    </div>
    <div class="clear"></div>
@stop

@section('forum')
    <div class="forum-container">

        @foreach($posts as $post)
            <div class="forum-post">

                <div class="forum-heading">
                    <div class="forum-post-title">
                        <h4>{{$post->title}}</h4>
                    </div>
                    <div class="forum-post-date">
                        <p>{{$post->date}}</p>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="forum-post">
                    <div class="forum-user">
                        <img src="{{ asset('img/avatars/slominski_avatar.jpg') }}" alt="Profile Picture">
                        <h2 class="item-name"><a href="people/{{$post->user->nick}}">{{$post->user->name}}</a></h2>
                        <h3 class="item-nick">{{'@'.$post->user->nick}}</h3>
                    </div>
                    <div class="forum-content"> 
                        {!! $post->body !!}
                    </div>
                </div>

                <div class="forum-footer">
                    <div class="forum-expand-comments">
                        <button data-toggle="modal" data-target="#newComment"><small>+ Expand for Comments</small></button>
                    </div>
                    <div class="forum-edit-links">
                        <a href=""><small>Delete</small></a> | <a href=""><small>Edit</small></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        @endforeach

    </div>
@stop