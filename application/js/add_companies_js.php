<script type="text/javascript">


$(function() {
	
		
	$( "#project" ).autocomplete({
		//source:"<?php echo site_url('main/get_companies_jsonlist'); ?>",
		source: function(request, response) {
   		 $.ajax({
    			  url:"<?php echo site_url('main/get_store_jsonlist'); ?>",
      			data: {
						
						maxRows: 12,
						name_startsWith: request.term
					},
    			  dataType: "json",
     			 method: "post",
     			success: function(data){
                      response(data);
                  }
   		 
 		 
		});
		
		},
		minLength: 1,
	
		focus: function( event, ui ) {
			$( "#project" ).val(ui.item.value);
			return false;
		},
		select: function( event, ui ) {
			
			$( "#project" ).val(ui.item.value);
			$( "#c_id" ).val(ui.item.store_id);
			//$( "#project-description" ).html( ui.item.desc );
			//$( "#project-icon" ).attr( "src", "userphoto/" + ui.item.icon );
		
			return false;
		}
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
			
			
		return $( "<li></li>" )
			.data( "item.autocomplete", item )
			.append('<a><img class="photo" src="'+item.store_image+'"/><span class="text">'+ item.value+'</span><span class="category">'+ item.store_url+'</span><span class="subtext">'+ item.store_description+'</span></a>')
			.appendTo( ul );
	};
});
</script>
<script>
$("#company_search_click").live("click", function() {


	var name=this.name;
	var ser_key=$('#project').val();
	if(ser_key=='Start Typing....' || ser_key=='')
		exit;
	

		var urll='<?php echo site_url("main/get_search_res_add_stores");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {key : ser_key},
            dataType: "html",
		complete: function($data) {
			//alert($data);
			// $("#search_more_div"+current_page).hide();
		}
        }).done(function(msg) {
               // alert(msg);
		$('#ser_result_shw').html(msg);
		//$(div_obj).attr("name","0"+type+id);
		//$('.topTab').hide();
			 
              // $("#search_res_area").append(msg).show('slow');;
		// $("#search_more_div"+old).hide();
		//$("#search_more_div").slideToggle("slow");
		


	
            });
   

 

});

</script>

