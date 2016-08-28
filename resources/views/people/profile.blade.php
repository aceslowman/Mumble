@extends('layouts.profile')

@section('modalWindows')
    @include('people.modals.editCarousel')
    @include('people.modals.editTags')
    @include('people.modals.editAvailable')
@stop

@section('toolbar')
    <div class="toolbar">
        <div>
            <button data-toggle="modal" data-target="#editCarousel_modal">
                <h4>
                    <span class="toolbar-glyph glyphicon-picture"></span><span>Edit Carousel</span>
                </h4>
            </button>
            <button data-toggle="modal" data-target="#editTags_modal">
                <h4>
                    <span class="toolbar-glyph glyphicon-star"></span><span>Edit Tags</span>
                </h4>
            </button>
            <button data-toggle="modal" data-target="#editAvailable_modal">
                <h4>
                    <span class="toolbar-glyph glyphicon-ok-circle"></span><span>Edit Availability</span>
                </h4>
            </button>
        </div>
    </div>
    <div class="clear"></div>
@stop

@section('carousel')
    <div class="carousel-container">
        <div id="carousel" class="carousel slide">
            <div class="carousel-inner">
            @foreach($carousel->photos as $key=>$photo)
                @if($key==0)
                <div class="item active">
                    <a href="{{ asset($photo->filename) }}">
                        <img src="{{ asset($photo->filename) }}" alt="" />
                    </a>
                </div>
                @else
                <div class="item">
                    <a href="{{ asset($photo->filename) }}">
                        <img src="{{ asset($photo->filename) }}" alt="" />
                    </a>
                </div>
                @endif
            @endforeach
            </div>
            <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
        </div>
    </div>
    <div class="carousel-toolbar">

        <div>
            <p><em>Massive</em>, 2015</p>    
        </div>

    </div>
    <div class="clear"></div>
@stop

@section('status')
    <div class="status">
        <div>        

            <div class="status-left">
                <div class="pull-left"><h2>What I do</h2></div> 
                <div class="pull-right" style="margin-top:7px; margin-left:30px;">
                    <button class="glyph-link" data-toggle="modal" data-target="#editTags_modal">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </div>
                <div class="clear"></div>
                
                <!-- if this is the profile of the active user... -->

                <div class="tag-container">
                    <ul>
                    @foreach($user->tags as $tag)
                        <li>    
                            <button class="edit-tag" data-id="{{ $tag->id }}"><span class="remove-tag">x</span>{{$tag->name}}</button>
                        </li>
                    @endforeach
                        <li>    
                            <button class="add-tag"><span>+</span>Add tag</button>
                        </li>
                    </ul>
                </div>
                
                <!-- else -->

<!--                 <div class="tag-container">
                    <ul>
                    @foreach($user->tags as $tag)
                        <li>    
                            <button>{{$tag->name}}</button>
                        </li>
                    @endforeach
                    </ul>
                </div> -->

                <div class="clear"></div>
            </div>

            <div class="status-right">
            
                <div class="pull-left"><h2>Availability</h2></div>
                <div class="pull-right" style="margin-top:7px; margin-left:30px;">
                    <button class="glyph-link" data-toggle="modal" data-target="#editAvailable_modal">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </div>
            
                <div class="clear"></div>
                <h4>
                @if($user->available)
                    <span class="glyphicon glyphicon-ok"></span>
                @else
                    <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                @endif
                    {{$user->status}}            
                </h4>
            </div>


        </div>
    </div>
@stop

@section('pageNav')
    <div class="pages-navigation row center-block">
        <ul>
            <li><a href="">Sounds</a></li>
            <li><a href="">Programming</a></li>
            <li><a href="">Photos</a></li>
        </ul>
    </div> 
@stop

@section('content')
<div class="profile-content">
    <div class="profile-avatar">
        <img class="img-responsive" src="/img/avatars/{{'medium_'.$user->avatar_filename}}">
    </div>
    <div class="profile-info">    

        {!! $user->profile->info !!}

    </div>
    <hr>
</div>
@stop