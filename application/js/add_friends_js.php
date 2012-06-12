<script type="text/javascript">


$(function() {
	
		
	$( "#project" ).autocomplete({
		
		minLength: 1,
		source:  function(request, response) {
   		 $.ajax({
    			  url:"<?php echo site_url('main/get_application_user_jsonlist'); ?>",
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
		focus: function( event, ui ) {
			$( "#project" ).val(ui.item.value);
			return false;
		},
		select: function( event, ui ) {
			
			$( "#project" ).val(ui.item.value);
			$( "#c_id" ).val(ui.item.user_facebook_id);
			//$( "#project-description" ).html( ui.item.desc );
			//$( "#project-icon" ).attr( "src", "userphoto/" + ui.item.icon );
		
			return false;
		}
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
		//if(item.hometown_location.city && item.hometown_location.country )
		//var location=item.hometown_location.city+' '+item.hometown_location.country;
		//else
		
		
		return $( '<li class="group"></li>' )
			.data( "item.autocomplete", item )
			.append('<a><img class="photo" src="'+item.pic_square+'"/><span class="text">'+ item.value+'</span><span class="category"></span><span class="subtext"></span></a>')
			.appendTo( ul );
	};
});

</script>
<script>
function submit_form(){
var error='';

if(document.getElementById('c_id').value==''){
error='Please fill all the required fields';
}
else if(document.getElementById('project').value=='')
{
error='Please fill all the required fields';
}
if(error==''){
document.forms["follow"].submit()
}
else{
document.getElementById('error').innerHTML=error;
}

}

//search onclick function
$("#clk_search_friends").live("click", function() { 
	var name=this.name;
	var ser_key=$('#project').val();
	if(ser_key=='Start Typing....' || ser_key=='')
		exit;
	

		var urll='<?php echo site_url("main/get_search_res_add_friends");?>';
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


