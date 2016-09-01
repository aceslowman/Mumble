@extends('layouts.master')

@section('title')
@parent
	::{{$title}}
@stop

@section('navTitle')
@parent
	{{$navTitle}}
@stop

@section('content-container')
	@yield('toolbar')
	@yield('carousel')
    @yield('status')
    @yield('pageNav')
	@yield('content')
@stop

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){

			var base_url = 'http://localhost:8000';

// Below is the csrf fix for laravel, avoiding the tokenMismatch error
// Might want to move this to a better location and include it on all pages?

			var getXsrfToken = function() {
			    var cookies = document.cookie.split(';');
			    var token = '';

			    for (var i = 0; i < cookies.length; i++) {
			        var cookie = cookies[i].split('=');
			        if(cookie[0] == 'XSRF-TOKEN') {
			            token = decodeURIComponent(cookie[1]);
			        }
			    }

			    return token;
			}

			jQuery.ajaxSetup({
    			headers: {
        			'X-XSRF-TOKEN': getXsrfToken()
    			}
			});

// End of csrf fix


			function addTagForm() {
			    $('.add-tag').replaceWith('<div class="tag-form"><form class="add-tag-form" name="add-tag"><input name="tag-data" placeholder="Enter new tag" type="text"><input type="submit" value="Add"></form></div>');
			}

			function removeTag() {
				$.ajax({
					context: this,
					url: base_url+"/detach/tag",
					data:{
						//how can I get the id in a way that's agnostic of type?
						profile_type: 'user',
						profile_id: <?php echo $user->id; ?>,
						tag_id: $(this).closest('button').data("id")
					},
					type: "POST",
					dataType: "text", 
				    success: function() {
						$(this).closest('li').remove();
					}
				});				
			}

			function addTag(){
				$.ajax({
					context: this,
					url: base_url+"/attach/tag",
					data:{
						//how can I get the id in a way that's agnostic of type?
						profile_type: 'user',
						profile_id: <?php echo $user->id; ?>,
						tag_data: $('input[name=tag-data]').val()
					},
					type: "POST",
					dataType: "JSON", 
				    success: function(response) {			
				    	$('.current-tags').append('<li><button class="edit-tag" data-id="'+response['id']+'"><span class="remove-tag">x</span>'+response['name']+'</button></li>');
					}
				});
				return false;
			}

			$('.remove-tag').click(removeTag);
			$('.add-tag').click(addTagForm);			
			$('.tag-container .new-tag li').on("submit",'div form',addTag);
		});

	</script>
@stop
