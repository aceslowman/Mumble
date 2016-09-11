@extends('master.layout')

@section('content-container')
	@yield('toolbar')
	@yield('carousel')
    @yield('status')
    @yield('pageNav')
	@yield('content')
@stop

@section('scripts')
	<!--<script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>-->
	<script type="text/javascript">
		$(document).ready(function(){

		@if(App::environment('development'))
			var base_url = 'http://localhost:8000';
		@elseif(App::environment('staging'))
			var base_url = 'http://mumble.austinslominski.com'
		@endif

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

			$('.current-tags').on("click",'.remove-tag',removeTag);
			$('.new-tag').on("click",'.add-tag',addTagForm);
			$('.tag-container .new-tag li').on("submit",'div form',addTag);
		});

	</script>
@stop
