@extends('photos.layout')

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
@if(App::environment('staging')||App::environment('development'))
    <div class="helptip">
        <div class="panel-body text-center">
            Upload files in the box below. After they are uploaded, click on your photos to add them to the carousel. This will soon be a lot easier.
        </div>
    </div>
@endif
<div class="dropzone-wrapper">
    <form method="POST" class="dropzone" action="/photos/create" enctype="multipart/form-data">{{ csrf_field() }}</form>
</div>
<div class="photos">
    <div>
        <h2>Your photos:</h2>
    	<ul class="edit-photos">
            @foreach($user->photos as $photo)
                <li data-id="{{$photo->id}}" class="img-able"><a><img src="/img/user_photos/{{'small_'.$photo->filename}}"></a></li>
            @endforeach            
            @foreach($carousel->photos as $photo)
                <li data-id="{{$photo->id}}" class="img-disabled"><a><img src="/img/user_photos/{{'small_'.$photo->filename}}"></a></li>
            @endforeach            
    	</ul>
        <div class="clear"></div>
    </div>
    <div>
        <h2>Carousel:</h2>
        <ul class="edit-carousel">
            @foreach($carousel->photos as $photo)
                <li data-id="{{$photo->id}}" class="img-able"><a><img src="/img/user_photos/{{'small_'.$photo->filename}}"></a></li>
            @endforeach
    	</ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
@stop