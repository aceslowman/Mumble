@extends('layouts.index')

@section('toolbar')
    <div class="row col-md-12 center-block toolbar">
        <div class="toolbar-search" style="color:white;">
            <form action="" class="toolbar-form toolbar-left form-inline">
            	<div class="form-group">
                	<input class="form-control" type="text" placeholder="Search" />
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
        	</form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
@stop

@section('index')
<div class="index">
	<div class="index-panel panel panel-default col-md-12">
		<canvas class="indexrow-blur" id="indexrow-blur" width="800" height="120"></canvas>
		<div class="index-name-panel panel-body pull-left col-md-4"> 
			<h2><a href="projects/projectname">Project Name</a></h2>
		</div>
		<div class="index-description-panel panel-body pull-left col-md-4"> 
			<p><small>Project Description</small></p>
		</div>
		<div class="index-member-panel panel-body pull-left col-md-4">
			<h4>Members:</h4>
			<ul class="">
				<li><a href="/people/AustinSlominski">Austin Slominski</a></li>
				<li><a href="/people/userName">Member name</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>	
	<div class="index-panel panel panel-default col-md-12">
		<canvas class="indexrow-blur" id="indexrow-blur" width="800" height="120"></canvas>
		<div class="index-name-panel panel-body pull-left col-md-4"> 
			<h2><a href="projects/projectname">Project Name</a></h2>
		</div>
		<div class="index-description-panel panel-body pull-left col-md-4"> 
			<p><small>Project Description</small></p>
		</div>
		<div class="index-member-panel panel-body pull-left col-md-4">
			<h4>Members:</h4>
			<ul class="index-member-list">
				<li><a href="/people/AustinSlominski">Austin Slominski</a></li>
				<li><a href="/people/userName">Member name</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>	
	<div class="index-panel panel panel-default col-md-12">
		<canvas class="indexrow-blur" id="indexrow-blur" width="800" height="120"></canvas>
		<div class="index-name-panel panel-body pull-left col-md-4"> 
			<h2><a href="projects/projectname">Project Name</a></h2>
		</div>
		<div class="index-description-panel panel-body pull-left col-md-4"> 
			<p><small>Project Description</small></p>
		</div>
		<div class="index-member-panel panel-body pull-left col-md-4">
			<h4>Members:</h4>
			<ul class="index-member-list">
				<li><a href="/people/AustinSlominski">Austin Slominski</a></li>
				<li><a href="/people/userName">Member name</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>	
</div>
@stop