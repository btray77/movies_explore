<?php 
/*
 * 
 * @package	 onehome
 * @category	 javascript
 * @author	 prabin@eisplc.com(p/97/253)
 * @usage        javascripts for onehome compare page
 * @actors       users
 * Created Date  26-04-2012
 * Last updated  26-04-2012(prabin)
 * 
 */
?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.scrollTo.js"></script>
<script type="text/javascript">





$(document).ready(function(){


	

	$('#login_fader').click(function(e) {
  	
	if(e.target.id == "login_fader")
    		{
	 $('.report_error_popup').hide();
	 $('#login_fader').hide();
	 $('#v_error').html("");
		}
});


	//connection talk submit click function to call ajax
	$('#con_tlk_compare_submit').click(function() {
		con_tlk_val=$('textarea#con_tlk_comp_textarea').val();
		current_photo_fb_id=$('#current_photo_fb_id').val();
		if(!con_tlk_val)
			exit;
	$.ajax({
            url: "<?php echo site_url('main/ajax_con_talk_comp_insert');?>",
            type:'POST',
			data:{con_tlk_msg:con_tlk_val,photo_fb_id:current_photo_fb_id},
            dataType: 'text',
            success: function(output_string){
			$('textarea#con_tlk_comp_textarea').val('');
			//$('#con_tlk_comp_container').scrollTop(0);

                 $('#ajax_talk_container').html(output_string);
			
			$('#ajax_talk_container ul li:first span').css('color','#000')
			$('#ajax_talk_container ul li:first span').css('opacity','.6');
			 $('#ajax_talk_container ul li:first span').animate({
   			opacity: 1
    			  }, 1000, function() {

			$('#ajax_talk_container ul li:first span').css('opacity','1');
   			
  				});
		

                } // End of success function of ajax form
            }); // End of ajax call 
	});
	//connection talk submit click ends






	//Speed of the slideshow
	var speed = 5000;
	
	//You have to specify width and height in #slider CSS properties
	//After that, the following script will set the width and height accordingly
	$('#mask-gallery, #gallery li').width($('#slider').width());	
	$('#gallery').width($('#slider').width() * $('#gallery li').length);
	$('#mask-gallery, #gallery li, #mask-excerpt, #excerpt li').height($('#slider').height());
	
	//Assign a timer, so it will run periodically
	//var run = setInterval('newsscoller(0)', speed);	
	
	$('#gallery li:first, #excerpt li:first').addClass('selected');
	$('#gallery li.selected input').attr('id', 'sel');
	//Pause the slidershow with clearInterval
	$('#btn-pause').click(function () {
		clearInterval(run);
		return false;
	});

	//Continue the slideshow with setInterval
	$('#btn-play').click(function () {
		//run = setInterval('newsscoller(0)', speed);	
		return false;
	});
	
	//Next Slide by calling the function
	$('#btn-next').click(function () {
		newsscoller(0);	
		return false;
	});	

	//Previous slide by passing prev=1
	$('#btn-prev').click(function () {
		newsscoller(1);	
		return false;
	});	
	
	//Mouse over, pause it, on mouse out, resume the slider show
	$('#slider').hover(
	
		function() {
			clearInterval(run);
		}, 
		function() {
			//run = setInterval('newsscoller(0)', speed);	
		}
	); 	
	
	




	document.getElementById("link1").className = "";
	if("<?php echo $room_type_id; ?>")
	document.getElementById("rmt<?php echo $room_type_id; ?>").className = "current";
	});



	function newsscoller(prev) {

	//Get the current selected item (with selected class), if none was found, get the first item
	var current_image = $('#gallery li.selected').length ? $('#gallery li.selected') : $('#gallery li:first');
	var current_excerpt = $('#excerpt li.selected').length ? $('#excerpt li.selected') : $('#excerpt li:first');
	

	
	//if prev is set to 1 (previous item)
	if (prev) {
		
		//Get previous sibling
		var next_image = (current_image.prev().length) ? current_image.prev() : $('#gallery li:last');
		var next_excerpt = (current_excerpt.prev().length) ? current_excerpt.prev() : $('#excerpt li:last');
	
	//if prev is set to 0 (next item)
	} else {
		
		//Get next sibling
		var next_image = (current_image.next().length) ? current_image.next() : $('#gallery li:first');
		var next_excerpt = (current_excerpt.next().length) ? current_excerpt.next() : $('#excerpt li:first');
	}
	

	//clear the selected class
	$('#excerpt li, #gallery li').removeClass('selected');
	$('#gallery li input').attr('id', '');
	//reassign the selected class to current items
	next_image.addClass('selected');
	next_excerpt.addClass('selected');

	//Scroll the items
	$('#mask-gallery').scrollTo(next_image, 800);		
	$('#mask-excerpt').scrollTo(next_excerpt, 800);	
	$('#gallery li.selected input').attr('id', 'sel');
			
	
}

//code to high lite

    $(function()  
    {  
      var hideDelay = 500;    
      var currentID;  
      var hideTimer = null;  
      
      // One instance that's reused to show info for the current item  
      var container = $('<div id="itemPopupContainer">'  
          + '<div id="itemPopupContent"></div>'  
	 
          + '</div>');  
      
      //$('body').append(container);  
      
      $('.itemPopupTrigger').live('mouseover', function()  
      {  
		
          // format of 'rel' tag: pageid,itemguid  
          var settings = $(this).attr('rel').split('^');  
          var img_url = settings[0];  
          item_desc = settings[1];  
     // alert(pageID+currentID);
          // If no guid in url rel tag, don't popup blank  
          if (currentID == '')  
              return;  
      
          if (hideTimer)  
              clearTimeout(hideTimer);  
      
          var pos = $(this).offset();  
          var width = $(this).width(); 
	var height = $(this).height();   
         
	$(this).append(container);
        $('#itemPopupContent').html('<img src=" ' + img_url + '"></img><div class="item_pop_desc"><span> '+ item_desc + '</span></div>'); 
	var p_height=$('#itemPopupContent').height();
 container.css({  
              left: (pos.left + (width/2)) + 'px',  
              top: (pos.top - p_height) + 'px'  
          });  
       
      	//$('#itemPopupContent').html('<span> '+ item_desc + '"></span>'); 
        /*  $.ajax({  
              type: 'GET',  
              url: 'itemajax.aspx',  
              data: 'page=' + pageID + '&guid=' + currentID,  
              success: function(data)  
              {  
                  // Verify that we're pointed to a page that returned the expected results.  
                  if (data.indexOf('itemPopupResult') < 0)  
                  {  
                      $('#itemPopupContent').html('<span >Page ' + pageID + ' did not return a valid result for item ' + currentID + '.  
    Please have your administrator check the error log.</span>');  
                  }  
      
                  // Verify requested item is this item since we could have multiple ajax  
                  // requests out if the server is taking a while.  
                  if (data.indexOf(currentID) > 0)  
                  {                    
                      var text = $(data).find('.itemPopupResult').html();  
                      $('#itemPopupContent').html(text);  
                  }  
              }  
          });*/  
      
          container.css('display', 'block');  
      });  
      
      $('.itemPopupTrigger').live('mouseout', function()  
      {  
          if (hideTimer)  
              clearTimeout(hideTimer);  
          hideTimer = setTimeout(function()  
          {  
              container.css('display', 'none');  
          }, hideDelay);  
      });  
      
      // Allow mouse over of details without hiding details  
      $('#itemPopupContainer').mouseover(function()  
      {  
          if (hideTimer)  
              clearTimeout(hideTimer);  
      });  
      
      // Hide after mouseout  
      $('#itemPopupContainer').mouseout(function()  
      {  
          if (hideTimer)  
              clearTimeout(hideTimer);  
          hideTimer = setTimeout(function()  
          {  
              container.css('display', 'none');  
          }, hideDelay);  
      });  
    });  


//code to high lite end



/*report error pop up*/
function report_error(id){
		var compare_selected_img_id= $('#sel').val();
		$('#tag_image_popup').css('display', 'block'); 
		if(compare_selected_img_id){
		$('#error_photo_id').val(compare_selected_img_id);
		$('.report_error_popup').css('display', 'block'); 
		 $('#login_fader').css('display', 'block'); 
		}
		else{
			
			$('#i_notice').html("invalid photo selection");
			$('#i_notice').fadeIn().delay(3000).fadeOut('slow'); 
		}
		
	
	}

function report_error_sub(){//validation and submit of error reporting
	var error='';
error_type=document.getElementById('error_type').value;
error_comment=document.getElementById('er_comment').value;
error_photo_id=document.getElementById('error_photo_id').value;
if(document.getElementById('error_type').value==''){
error='Please fill all the required fields';


}
/*else if(document.getElementById('error_comment').value==''){
error='Please fill all the required fields';
}*/

if(error==''){
//document.forms["report_error_form"].submit();
 $.ajax({
                url: "<?php echo site_url('main/error_report_insert'); ?>",
                type: "POST",
                data: {error_photo_id : error_photo_id,er_comment : error_comment,error_type:error_type},
                dataType: "html"
            }).done(function(msg) {
             	//remove the pop up
        	$('.report_error_popup').hide();
	 	$('#login_fader').hide();
	 	$('#v_error').html("");
		//show the sucess notice
		$('#i_notice').html("Report error have been submited");
		$('#i_notice').fadeIn().delay(3000).fadeOut('slow');
		//change form value to null		
		$('#error_type').val('');
		$('#er_comment').val('');
		$('#error_photo_id').val('');
            });

}
else{
//document.getElementById('v_error').innerHTML=error;
$('#v_error').html(error);
$('#v_error').fadeIn().delay(3000).fadeOut('slow'); 
}





}

</script>
<style>

#slider {

	/* You MUST specify the width and height */
	width:205px;
	height:187px;
	position:relative;	
	overflow:hidden;
}

#mask-gallery {
	
	overflow:hidden;	
}

#gallery {
	
	/* Clear the list style */
	list-style:none;
	margin:0;
	padding:0;
	
	z-index:0;
	
	/* width = total items multiply with #mask gallery width */
	width:900px;
	overflow:hidden;
}

	#gallery li {

		
		/* float left, so that the items are arrangged horizontally */
		float:left;
	}


#mask-excerpt {
	
	/* Set the position */
	position:absolute;	
	top:0;
	left:0;
	z-index:500;
	
	/* width should be lesser than #slider width */
	width:100px;
	overflow:hidden;	
	

}
	
#excerpt {
	/* Opacity setting for different browsers */
	filter:alpha(opacity=60);
	-moz-opacity:0.6;  
	-khtml-opacity: 0.6;
	opacity: 0.6;  
	
	/* Clear the list style */
	list-style:none;
	margin:0;
	padding:0;
	
	/* Set the position */
	z-index:10;
	position:absolute;
	top:0;
	left:0;
	
	/* Set the style */
	width:100px;
	background-color:#000;
	overflow:hidden;
	font-family:arial;
	font-size:10px;
	color:#fff;	
}

	#excerpt li {
		padding:5px;
	}
	


.clear {
	clear:both;	
}


/*report error popup*/
/*.report_error_popup{
padding:8px;
	width: 460px;
height: 300px;
border:solid 2px #B5B5B5;
background: #EBF6FF;
position: fixed;
top: 50%;
left: 45%;
margin: -100px 0 0 -160px;
z-index: 10;
display: none;
}
#login_fader {
background:#FFF;
opacity: .5;
-moz-opacity: .5;
-filter: alpha(opacity=50);
position: fixed;
top: 0;
left: 0;
height: 100%;
width: 100%;
z-index: 5;
display: none;
}*/


/*highlite*/

#itemPopupContainer
{
    position:absolute;
    left:0;
    top:0;
    display:none;
    z-index: 20000;
}

#itemPopupContainer img
{
width:200px;
height:250px;
}



.itemPopupPopup
{
}

#itemPopupContent
{
    background-color: #FFF;
    min-width: 175px;
    min-height: 50px;
	border:solid 2px #B5B5B5;
	padding:5px;
}
.item_pop_desc {
background-color: #FFF;
width:200px;
font-size: 12px;
    font-weight: normal;
    word-wrap: break-word;
	color:#9F9F9F;

}
.itemPopupPopup .itemPopupImage
{
    margin: 5px;
    margin-right: 15px;
}

/*tag image pop start*/
/*#tag_image_popup{
padding:8px;
min-width: 460px;
min-height: 300px;
border:solid 2px #B5B5B5;
background: #EBF6FF;
position: fixed;
top: 50%;
left: 45%;
margin: -100px 0 0 -160px;
z-index: 10;
display: none;

}*/

/*tag image ends*/
    

</style>
