@extends('layouts.index')

@section('toolbar')
    <div class="row col-md-12 center-block toolbar">
      <div class="center-block">
            <button class="btn btn-link" data-toggle="modal" data-target="#newBulletin">
                <h4><span class="glyphicon glyphicon-plus"></span><span class="hidden-xs">&nbsp;&nbsp;&nbsp;New Library Post</span></h4>
            </button>
        </div>
    </div>
    <div class="clear"></div>
@stop

@section('index')
<div class="index">
	<div class="index-panel panel panel-default col-md-12">
		<div class="index-name-panel panel-body pull-left col-md-4">
			<h2><a href="">Fender Rumble 30 Watt</a></h2>
			<h4>Posted by <a href=""><em>Austin Slominski</em></a></h4>
		</div>
		<div class="index-description-panel panel-body pull-left col-md-8"> 
			<h4>Available from: July 12 through August 15th</h4>
		</div>
		<div class="clear"></div>
	</div>	
</div>
@stop