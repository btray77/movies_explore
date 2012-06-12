<?php 
/*
 * 
 * @package	 onehome
 * @category	 javascript
 * @author	 prabin@eisplc.com(p/97/253)
 * @usage        javascripts for home page
 * @actors       users
 * Created Date  20-04-2012
 * Last updated  20-04-2012(prabin)
 * 
 */
?>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.imgareaselect.js"></script>
<link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>Styles/imgareaselect-default.css" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){


	
	//pop up box hide whhen click background fade-------------------------------
	$('#login_fader').click(function(e) {

		
		if(e.target.id == "login_fader" || e.target.id == "close_btn_pop" )
    		{
     	 	$('.imgareaselect-selection').parent().hide();
		$(".imgareaselect-outer").hide();
		$(".imgareaselect-selection").hide();
   		$('#tag_image_popup').hide();
	 	$('#login_fader').hide();
		$('#upload_view_container').css('display', 'none'); 
   		}
		/*alert("click");
		$('.imgareaselect-selection').parent().hide();
		$(".imgareaselect-outer").hide();
		$(".imgareaselect-selection").hide();
   		$('#tag_image_popup').hide();
	 	$('#login_fader').hide();*/
		//$(".imgareaselect-outer").hide();
		//$(".imgareaselect-handle").hide();
	 	
	});

	

	//pop up box hide whhen click background fade ends-------------------------------


	//connection talk submit click function to call ajax-------------------------------
	$('#con_tlk_submit').click(function() {
		con_tlk_val=$('textarea#con_tlk_textarea').val();
		current_photo_fb_id=$('#current_photo_fb_id').val();
		
				


		if(!con_tlk_val)
			exit;
	$.ajax({
            url: "<?php echo site_url('main/ajax_con_talk_insert');?>",
            type:'POST',
			data:{con_tlk_msg:con_tlk_val,photo_fb_id:current_photo_fb_id},
            dataType: 'text',
            success: function(output_string){
			$('textarea#con_tlk_textarea').val('');
			$('#con_tlk_container').scrollTop(0);

                  $('#con_tlk_container').html(output_string);
			
			$('#con_tlk_container ul li:first span').css('color','#000')
			$('#con_tlk_container ul li:first span').css('opacity','.6');
			 $('#con_tlk_container ul li:first span').animate({
   			 opacity: 1
    			  }, 1000, function() {

			$('#con_tlk_container ul li:first span').css('opacity','1');
   			
  				});
		

                } // End of success function of ajax form
            }); // End of ajax call 

	});
	//connection talk submit click ends--------------------------------------------------




	document.getElementById("link1").className = "";
	if("<?php echo $room_type_id; ?>")
	document.getElementById("rmt<?php echo $room_type_id; ?>").className = "current";
	});

function change_img(value){
var item_id=value.id;
var src=$("#src_big"+item_id).val();
var desc=$("#caption"+item_id).val();
var photo_id=$("#photo_id"+item_id).val();
 $('#main_img_container img')

$.ajax({
            url: "<?php echo site_url('main/ajax_set_roomtype_photo'); ?>",
            type: "POST",
            data: {photo_id : photo_id}
           // dataType: "html"
        }).done(function(msg) {
		//alert(msg);
		if(msg){
         	 htm='<img  src="'+src+'" id="mainimg" height="293px" width="460px"></img>';
		
		// htm_tag='<img id="crop" src="'+src+'"></img>';
		$("#main_img_container").html(htm);
		$("#p_tag_img img").attr("src", src);
		$("#filename").attr("value", src);
		htm_desc='<label id="lblcontent1">'+desc+'</label>';
		$("#img_desc_div").html(htm_desc); 
		$("#tagnames").html(msg);
 		}
        });
}

//on click the tag element 
function tag_img_home(){
var current_ph_id=$("#current_photo_fb_id").val();

if(current_ph_id==' '){

//show the sucess notice
		$('#i_notice').html("Upload an image to start tag.");
		$('#i_notice').fadeIn().delay(3000).fadeOut('slow');	
exit;
}
$('#tag_image_popup').css('display', 'block'); 
$('#login_fader').css('display', 'block'); 

}
 


</script>
<script type='text/javascript'> 
    $(function () {
      		
   $(document).ready(function () {

		
	$('#crop').imgAreaSelect({handles: true,
        
		onSelectEnd: function (img, selection) {
            document.getElementById('x1').value = selection.x1;
			document.getElementById('x2').value = selection.x2;
			document.getElementById('y1').value = selection.y1;
			document.getElementById('y2').value = selection.y2;
			document.getElementById('w').value = selection.width;
			document.getElementById('h').value = selection.height;
          
        }
    });

	});
		
   });
    $(document).ready(function(){

        $('#saveThumb').click(function(){
		var name=document.getElementById('img_tag_name').value;
     	

	 var x1 = document.getElementById('x1').value;
			var y1 = document.getElementById('y1').value;
            var x2 = document.getElementById('x2').value;
            var y2 = document.getElementById('y2').value;
          	var w = document.getElementById('w').value;
           	var h = document.getElementById('h').value;
			var extension = document.getElementById('extension').value;
			var filename = document.getElementById('filename').value;

			
		if(!x1){
		alert("please select image area");
		
		exit;
		}
		if(!name){
		alert('please tag the cropped image');	
		exit;
		}	
		$('#saveThumb').attr('disabled', 'true');

				
			$.ajax({
            url: "<?php echo $this->config->item('base_url').'index.php/crop/croping';?>",
            type:'POST',
			data:{x1:x1,x2:x2,y1:y1,y2:y2,w:w,h:h,name:name,extension:extension,filename:filename},
            dataType: 'text',
            success: function(output_string){
                   // $("#test").text(output_string);
			
		$('#img_tag_name').val('');
			//remove the pop up
		$('.imgareaselect-selection').parent().hide();
		$(".imgareaselect-outer").hide();
		$(".imgareaselect-selection").hide();
		
        	$('#tag_image_popup').hide();
	 	$('#login_fader').hide();
	 	$('#v_error').html("");

		//bind 
		$('#saveThumb').removeAttr('disabled');
		$("#tagnames").html(output_string);
		//show the sucess notice
		$('#i_notice').html("selected image part have been tagged.");
		$('#i_notice').fadeIn().delay(3000).fadeOut('slow');
		//alert(output_string);

                } // End of success function of ajax form
            }); // End of ajax call 
			
			
            if (x1 == "" || y1 == "" || x2 == "" || y2 == "" || w == "" || h == "") {
                alert("You must make a selection first");
                return false;
            }
            else {
                return false;
            }
        });


	$('#photo_upload_click').click(function(){
		$('#upload_view_container').css('display', 'block'); 
		$('#login_fader').css('display', 'block'); 


	});
	
 
  });

function submit_form_upload(){
var error='';
var up_image=document.getElementById('up_image').value;
var up_desc=document.getElementById('up_desc').value;
if(document.getElementById('up_image').value==''){
error='Please fill all the required fields';
}
else if(document.getElementById('up_desc').value==''){
error='Please fill all the required fields';

}

if(error==''){

	

document.forms["up_photo"].submit()
}
else{
document.getElementById('v_error').innerHTML=error;
}

}


	
	</script>
