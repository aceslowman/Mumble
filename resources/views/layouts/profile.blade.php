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

			var base_url = 'http://localhost:8000';

			$('.remove-tag').click(function(){
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
			});

			$('.add-tag').click(function(){
				$.ajax({
					url: base_url+"/attach/tag",
					data:{
						//how can I get the id in a way that's agnostic of type?
						profile_type: 'user',
						profile_id: <?php echo $user->id; ?>,
						tag_info: 'tag' //string representing new tag...
					},
					type: "POST",
					dataType: "text", 
				    success: function() {
						//$(this).closest('button').remove();
					}
				});
			});			
		});

	</script>
@stop
