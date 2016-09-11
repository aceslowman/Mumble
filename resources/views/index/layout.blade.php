@extends('master.layout')

@section('content-container')
	@yield('toolbar')
	@yield('index')
@stop

@section('scripts')
	<!-- <script type="text/javascript" src="{{ asset('js/index.js') }}"></script> -->
	<script type="text/javascript">
		$(document).ready(function(){

		@if(App::environment('development'))
			var base_url = 'http://localhost:8000';
		@elseif(App::environment('staging'))
			var base_url = 'http://mumble.austinslominski.com'
		@endif

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

		// function createRows(response,type)
		// 		this method generates index rows using ajax responses.
		// 		the type allows for slightly different layout depending on 'search' or 'sort' responses
		// 
			function createRows(response,type){
				if(type == 'search'){
					var targetWrapper = '.searchresult-wrapper';
					var html = '<div class="toolbar-secondary search-result"><div><h3>Search Results: '+$('input[name=search-data]').val()+' </div><div class="pull-right"><button class="close-search vertical-center"><span class="glyphicon glyphicon-remove"></span></button></div><div class="clear"></div></div>';
				}else{
					var targetWrapper = '.index-item-wrapper';
					var html = '';
				}

				$(targetWrapper).slideUp(400,function(){
					$(targetWrapper).empty();
			   		$(targetWrapper).append(html);

			    	$.each(response,function(key,value){
			    		html = '<div class="index-item"><div class="index-avatar"><img src="/img/avatars/'+value['avatar_filename']+'"></div>';
			    		
			    		html += '<div class="index-name"><h2 class="item-name"><a href="people/'+value['nick']+'">'+value['name']+'</a></h2><h3 class="item-nick">@'+value['nick']+'</h3><a href="people/empty"><h5>'+value['status'];				    		
			    		if(value['available'] == 1){
			    			html += '<span class="glyphicon glyphicon-ok-circle" style="color:green;margin-left:10px;margin-top:2px;"></span>';
			    		}else{
			    			html += '<span class="glyphicon glyphicon-remove-circle" style="color:red;margin-left:10px;margin-top:2px;"></span>';
			    		}

			    		html += '</h5></a></div><div class="index-list"><h3>Tags:</h3><div class="tag-container"><ul>';

			    		$.each(value['tags'],function(key,value){
			    			if(key < 10){
			    				html += '<li><button>'+value['name']+'</button></li>';
			    			}
			    		});
			    		
			    		if(value['tags'].length > 10){
			    			html += '<li><a href=""><em>... '+(value['tags'].length-10)+' more</em></a></li>';
			    		}
			    		
			    		html += '</ul></div><div class="clear"></div></div><div class="clear"></div></div>';

				    	$(targetWrapper).append(html);
			    	});

					$(targetWrapper).slideDown();						
				});

			}

			function searchDropdownMenu(){
				if($('.search-dropdown ul').css('display') == 'none'){
					$('.search-dropdown ul').slideDown();
				}else{
					$('.search-dropdown ul').slideUp();
				}
			}

			function searchSort(event){
				$.ajax({
					context: this,
					url: base_url+"/search/sort/user",
					data:{
						sort_type: $(event.target).attr('class'),
						profile_type: 'user'
					},
					type: "POST",
					dataType: "JSON",
					success: function(response) {
						createRows(response,'sort');
					}
				});
				$('.search-term').html($(event.target).html());
				searchDropdown(); 
			}

			function closeSearch(){
				$('.searchresult-wrapper').slideUp();
			}

			function searchIndex(){
				$.ajax({
					context: this,
					url: base_url+"/search/user",
					data:{
						search_data: $('input[name=search-data]').val()
					},
					type: "POST",
					dataType: "JSON", 
				    success: function(response) {		
				    	createRows(response,'search');
					}
				});
				return false;				
			}	

			$('.toolbar-search').on("submit",searchIndex);
			$('.dropdown-select').click(searchDropdownMenu);
			$('.search-dropdown ul li a').click(searchSort);
			$('.searchresult-wrapper').on('click','.close-search',closeSearch);
		});
	</script>
@stop










		