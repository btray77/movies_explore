﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OneHome</title>

    <link href="<?php echo base_url(); ?>Styles/C-Homestyle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>Styles/Top_Tab_styles.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url(); ?>Styles/B-Introduction.css" rel="stylesheet" type="text/css" />

 <link href="<?php echo base_url(); ?>Styles/common_style.css" rel="stylesheet" type="text/css" />
<?php
//include javascript for common purpose
include_once(APPPATH . 'js/common_js.php'); 
?>
<script>
function submit_form(){
var error='';
r_type=document.getElementById('r_type').value;
if(r_type==''){
error='Please fill all the required fields';
}

$.ajax({
            url: "<?php echo site_url('main/ajax_val_check_room_type');?>",
            type:'POST',
			data : {room_type_id:r_type},
            dataType: 'html',
            success: function(output_string){
			//alert(output_string);
                  if (output_string == 1){
			//alert('enter');
			error='You already have this room type please try another';
			document.getElementById('v_error').innerHTML=error;
			
			}
			else{

				document.forms["create_room"].submit()
				
			}
                } // End of success function of ajax form
            }); // End of ajax call 





}
</script>
</head>
<body style="margin:0px;background:none;">
	
	<div class="room_popup">
<div id="p_tag_head">
<h3 style="margin:0px;">Create Room</h3>
</div>
	<div class="v_error" id="v_error"></div>
		
	
				<div class="room_pop_wrapper">

	
	
		<!--<form class="Form StaticForm noMargin" name="create_room" action="main/room_style_select">-->
<?php 
		$attributes = array('class' => 'Form StaticForm noMargin', 'id' => 'create_room' , 'name'=>'create_room');
		echo form_open('style/index',$attributes);?>
            <ul>
            <!--    <li class="noBorderTop">
			<span class="searchbox">
                  
                        <input border="none" type="text" class="textbox common_input" name="search"></span>
                    
                   
                    <label>Room Name</label>
                    <span class="fff"></span>
                </li>-->

		
                <li class="val">
                    
  		<select id="r_type" name="r_type" class="common_input">

		<?php foreach($room_type as $row )
		echo '<option value="'.$row["room_type_id"].'">'.$row["room_type_name"].'</option>';
		?>
	</select>
                    <label>Room Type</label>
		<span class="fff"></span>
                </li>

 
            </ul>

      
                    <div class="p_buttonDisp " >
                       <input id="btnNext" class="common_input" type="button" value="next" onclick="submit_form();" />
                    </div>
        </form>		


	</div></div>
   
</body>
</html>
