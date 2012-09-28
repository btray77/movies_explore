<script>
$(function(){

	
	$('#main_inside_div').scrollPagination({
		'contentPage': '<?php echo site_url("ajax/ajax_load_movies_list");?>', // the url you are fetching the results
		'contentData': {}, // these are the variables you can pass to the request, for example: children().size() to know which page you are
		'scrollTarget': $(window), // who gonna scroll? in this example, the full window
		'heightOffset': 10, // it gonna request when scroll is 10 pixels before the page ends
		'beforeLoad': function(){ // before load function, you can display a preloader div
			$('#loadingm').fadeIn();
			
		},
		'afterLoad': function(elementsLoaded){ // after loading content, you can use this function to animate your new elements
			 $('#loadingm').fadeOut();
			
			
			 var i = 0;
			 $(elementsLoaded).fadeInWithDelay();
			 if ($('#main_inside_div').children().size() > 100){ // if more than 100 results already loaded, then stop pagination (only for testing)
			 	$('#nomoreresults').fadeIn();
				$('#main_inside_div').stopScrollPagination();
			 }
		}
	});
	
	
		   
});



</script>
