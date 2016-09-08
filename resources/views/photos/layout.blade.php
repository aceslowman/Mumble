@extends('master.layout')

@section('content-container')
	@yield('toolbar')
	@yield('photos')
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>

<!-- 
	//Need to tweak the dropzone
	<script type="text/javascript">
		Dropzone.options.carouselDrop = {
		  paramName: "file", // The name that will be used to transfer the file
		  maxFilesize: 2, // MB
		};
	</script> 
-->

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

			function addtoCarousel(){
				$.ajax({
					context: this,
					url: base_url+"/carousel/add",
					data:{
						img_id: $(this).closest('li').data("id")
					},
					type: "POST",
					dataType: "JSON", 
				    success: function(response) {	
				    	$('.edit-photos').empty();
				    	$('.edit-carousel').empty();

				    	var html_photos = '';
				    	var html_carousel = '';

			    		$.each(response.user,function(key,value){
				    	 	html_photos += '<li data-id="'+value['id']+'" class="img-able"><a><img src="/img/user_photos/small_'+value['filename']+'"></a></li>';	
				    	});
				    	
			    		$.each(response.carousel,function(key,value){
			    			html_photos += '<li data-id="'+value['id']+'" class="img-disabled"><a><img src="/img/user_photos/small_'+value['filename']+'"></a></li>';
				    	 	html_carousel += '<li data-id="'+value['id']+'" class="img-able"><a><img src="/img/user_photos/small_'+value['filename']+'"></a></li>';
				    	});				

				    	$('.edit-photos').append(html_photos);	
						$('.edit-carousel').append(html_carousel);				    	
					}
				});
			}

			function removefromCarousel(){
				$.ajax({
					context: this,
					url: base_url+"/carousel/remove",
					data:{
						img_id: $(this).closest('li').data("id")
					},
					type: "POST",
					dataType: "JSON", 
				    success: function(response) {		
				    	$('.edit-photos').empty();
				    	$('.edit-carousel').empty();

				    	var html_photos = '';
				    	var html_carousel = '';

			    		$.each(response.user,function(key,value){
				    	 	html_photos += '<li data-id="'+value['id']+'" class="img-able"><a><img src="/img/user_photos/small_'+value['filename']+'"></a></li>';	
				    	});
				    	
			    		$.each(response.carousel,function(key,value){
			    			html_photos += '<li data-id="'+value['id']+'" class="img-disabled"><a><img src="/img/user_photos/small_'+value['filename']+'"></a></li>';
				    	 	html_carousel += '<li data-id="'+value['id']+'" class="img-able"><a><img src="/img/user_photos/small_'+value['filename']+'"></a></li>';
				    	});				

				    	$('.edit-photos').append(html_photos);	
						$('.edit-carousel').append(html_carousel);			 
					}
				});
			}			

			$('.edit-photos').on("click",'li a',addtoCarousel);
			$('.edit-carousel').on("click",'li a',removefromCarousel);						
		});		
	</script>
@stop
