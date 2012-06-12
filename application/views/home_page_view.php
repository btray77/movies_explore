

<?php 
$main_img=isset($selected_photo_array['0']['src_big']) ?  $selected_photo_array['0']['src_big'] : base_url().'Styles/Images/default_house.gif';
$main_desc=isset($selected_photo_array['0']['caption']) ?  $selected_photo_array['0']['caption'] : 'Upload an image to start';



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OneHome</title>
<link href="<?php echo base_url(); ?>js/tb/thickbox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>Styles/CDEPageStyles.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>Styles/Top_Tab_styles.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>Styles/common_style.css" rel="stylesheet" type="text/css" />

  
<?php
//include javascript for common purpose
include_once(APPPATH . 'js/common_js.php'); 
//include js script for this page(include after common_js.php)
include_once(APPPATH . 'js/home_page_js.php'); 
?>


</head>
<body>
<div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js">
      </script>
<script>
 FB.init({ 
            appId: <?php echo $app_id;?> , cookie:true, 
            status:true, xfbml:true 
         });
function postwall(){
	FB.ui(
  {
    method: 'feed',
    attachment: {
      name: 'onehome',
      caption: 'onehome caption',
      description: (
        'one home desc ' +
        ' ' +
        ''
      ),
      href: 'http://apps.facebook.com/one_home'
    },
	//picture: '<?php echo base_url(); ?>/Styles/Images/logo.gif',
	picture: '<?php echo $main_img;?>',

    action_links: [
      { text: 'onehome', href: 'http://apps.facebook.com/one_home' }
    ]
  },
  function(response) {
    if (response && response.post_id) {
     // alert('Post was published.');
    } else {
     // alert('Post was not published.');
    }
  }
);
}
</script>



<!-- background fader for popup-->
<div id="login_fader">
<!--create room popup start -->
<div class="crt_rm_div" id="crt_rm_div">
<div class="close_btn_pop" id="close_btn_pop">
	<img src="<?php echo base_url();?>Styles/Images/close_b.png"></img>
	</div>
<IFRAME SRC="<?php echo site_url('main/create_room/');?>"  height="517" WIDTH="601" scroll="0" frameborder="0">
</IFRAME>
</div>
<!-- create room end -->

<!--tag image pop up starts -->
<div id="tag_image_popup" class="popup_container_commom">
<div class="close_btn_pop" id="close_btn_pop">
	<img src="<?php echo base_url();?>Styles/Images/close_b.png"></img>
	</div>
<div id='p_tag_img'>
<div id="p_tag_head">
<h3>Crop and Tag items in this picture</h3>
</div>
<img id='crop' src="<?php echo $main_img;?>" />
</div>

<input type='hidden' name='x1' value='' id='x1' />
<input type='hidden' name='y1' value='' id='y1' />
<input type='hidden' name='x2' value='' id='x2' />
<input type='hidden' name='y2' value='' id='y2' />
<input type='hidden' name='w' value='' id='w' />
<input type='hidden' name='h' value='' id='h' />
<input type='hidden' name='extension' id='extension'  value='jpg' />
<input type='hidden' name='filename' id='filename'  value="<?php echo $main_img;?>" />
<input type='hidden' name='width'  value='$width' />
<input type='hidden' name='height'  value='$height' />

<div id="p_tag_bottom">
<ul>
<li>
Tag Name
</li>
<li>
<input type='text' name='img_tag_name' id="img_tag_name"  value='' />
</li>
<li>
<input type='submit' name='uploadThumbnail' value='Add' id='saveThumb' class="sub_but" />
</li>
</ul>

</div>
<h3>Previous Tags</h3>
<div id="p_tag_bottom" class="tag_items_cls">

<ul>
<div id="tagnames">
<?php 
if($arry_tagged_elements->num_rows()>0){
foreach($arry_tagged_elements->result_array() as $row){?>
<li>
<?php echo $row['tg_name']; ?>
</li>
<?php }}else{
echo '<p class="norecord">No Tags Found..</p>';
} ?>
</div>
</ul>
<div class="clear"></div>
</div>
</div>
<!--tag image pop up ends -->
<!--upload photo start -->
<div id="upload_view_container" class="popup_container_commom">
<div class="close_btn_pop" id="close_btn_pop">
	<img src="<?php echo base_url();?>Styles/Images/close_b.png"></img>
	</div>
<?php include_once(APPPATH.'views/upload_photos_view.php'); ?>
</div>
<!--upload photo start ends-->




</div><!--login fader end-->	
    <div id="MPOuterMost">
        <div id="MPOuter">
            <div id="MPHeader">
                <div class="logo">
                </div>
              

 <?php include_once(APPPATH.'views/common_search.php'); ?> 

                <div class="hidiv">
                    <div class="iconhome">
                    </div>
                     <div class="hi-cont">
                            <?php echo 'Hey, ' . $this->session->userdata('full_name') . ' !'; ?></div>

		<!-- div to show notice message -->
		<div class="notice" id="i_notice" ></div>

		 <div style="float:right";><a href="<?php echo site_url('main/logout'); ?>">Logout</a></div>
                </div>
            </div>
          
            <div class="hidiv1">
               <div class="topTab">
                        <ul>
                            <li id="link1LI"><a id="topLink1" class="current first" href="<?php echo site_url('main/main_page'); ?>" onclick="CngClass(this);"></a></li>
                            <li id="link2LI"><a id="topLink2" href="<?php echo site_url('main/compare'); ?>" class="second" onclick="CngClass(this);"></a></li>
                            <li id="link3LI"><a id="topLink3" href="<?php echo site_url('main/user_profile'); ?>" class=" third" onclick="CngClass(this);"></a></li>
                        </ul>
                    </div>
            </div>




		<div class="clear" id="link1"></div>
        </div>
        <div id="MPcont">
            <div class="leftside">
		 <!--rooms menu -->
                   <div class="urbangreymenu">
                    <ul>
            
                          <li class="linkUpload"><a href="#" title="create new room" id="" onclick="create_room_pop()" class="" >Create a New Room</a></li>
                            
                       
				<?php	
	
					if($rooms_result){
				
					foreach($rooms_result as $row){
				?>
                            <li><a href="<?php echo site_url('main/redirect_main_page/'.$row['room_type_id']); ?>" onclick="CngClass(this);" id="rmt<?php echo $row['room_type_id']; ?>"><?php  echo $row['room_type_name']; ?></a></li>
                                <?php
					}
					}
				?>
                            </ul>
                </div>
		<!--rooms menu end -->

                <div class="downarrow">
                    My Neighbors</div>

               <div class="imgouter">
		<?php
		if(!$friends_follow_array)
			echo '<p class="norecord">No neighbors Found.</p>';
			else{
		foreach($friends_follow_array as $row){ ?>
                    <div class="imginner">
                        <div class="img1">
                            <img id="smallimg1" class="p_img" src="<?php echo ($row['user_picture_url'] !='') ? $row['user_picture_url'] : base_url().'/Styles/Images/icon8.png'; ?>" />
                        </div>
                        <div class="imgcontent">
                            <label id="imgcontent1">
                               <?php echo (isset($row['user_full_name'])) ? $row['user_full_name'] : 'not available';?></label></div>
                    </div>

		<?php } 

			}?>
                    
                </div>
		
                <div class="toparrow-green">
                    <a href="<?php echo site_url('main/add_friends');?>"><input id="btnfindmore" class="pointer" type="button" value="Find more neighbors" /></a></div>
            </div>
            <!--<!middiv starting-->
	<div id="search_head" class="search_head h_search_head">
	<h2>Search Results</h2>
		</div>	

            <div class="middlediv" id="middle_div">
                <div class="EhomeTop">
                    <div class="gallery">
                        <div class="mainimg1" id=main_img_container>

                            <img  src="<?php echo $main_img; ?>" id="mainimg" height="293px"
                                width="391px" /></div>
                        <div class="gallerthump">
			<?php 
				$i=0;
				foreach($photos_array as $row){
				?>                            
			<div class="galleryimg1 pointer" id="<?php echo $i; ?>" onclick="change_img(this)">
			<input type="hidden" value="<?php echo $row['src_big']; ?>" id="<?php echo 'src_big'.$i;?>" />
			<input type="hidden" value="<?php echo $row['photo_id']; ?>" id="<?php echo 'photo_id'.$i;?>" />
			<input type="hidden" value="<?php echo $row['caption']; ?>" id="<?php echo 'caption'.$i;?>" />
				
                                <img class="galimg1" src="<?php echo $row['src']; ?>" alt="small image" /></div>
                          <?php
				$i++;
				}
    				?>
                        </div>
                    </div>

<?php if($room_type_id){ ?>

	

                 <div class="facebookdiv">

		   <!-- 	<div class="sendicon">
                            <input type="button" id="btnlike" onclick="postwall()" /></div>
                   <div class="facebookicon">
                            <input type="button" id="btnfacebook" /></div>
                         <div class="sendicon">
                            <input type="button" id="btnlike" /></div>
                           <div class="integrfont">
                            <label id="lblinteger">
                                Integer urna felis</label></div> -->
                     <input type="hidden" value="<?php echo (!$selected_photo_array['0']['photo_fb_id']) ? '' : $selected_photo_array['0']['photo_fb_id'];?> " id="current_photo_fb_id" />

                        

 
                        <div class="content1" id="img_desc_div">
                            <label id="lblcontent1">
                               <?php echo $main_desc; ?>

</label>
                        </div>
			   <div>  <a href="#" class="linkedit"></a></div>
                        <div class="tagUpload">
                            <ul>
				

                                <li class="linkTag"><a id="topLink" class="current" href="#" onclick="tag_img_home();">
                                    Tag</a></li>
                      

   <li class="linkUpload"><a href="#" id="photo_upload_click">+Upload</a></li>

                            </ul>
                        </div>
                    </div>
			<?php } ?>
                </div>
                <div class="EhomeBottom">
                    <div class="recent">
                        Recent Conversations</div>
                    <div class="recentinner">
			<div class="con_tlk_container" id="con_tlk_container">
		                

				 <!-- recent conversation include  area -->
                            <?php
                            include_once(APPPATH.'views/ajax_recent_coversation.php'); //ajax_recent_conversation.php for list stores
                            ?>

                            <!-- recent conversation include  ends -->

			</div>
			
			</div>
                    <div class="recentinner">
                        <div class="imginner3">
                            <div class="imginner">
                                <div class="img1">
                                    <img id="smallimg15" src="<?php echo $profile_details_array['pic_square']; ?>" alt="small img" /></div>
                                <div class="imgcontent">
                                    <label id="Label15">
                                       <?php echo $profile_details_array['name']; ?></label></div>
                            </div>
                            
                        </div>
                        <div class="textfield">
                            <textarea maxlength="150" name="" cols="" rows="6" class="textfield" id="con_tlk_textarea"></textarea>
                            <div class="submit-btn">
                                <input type="button" class="btnsubmit_ehome" id="con_tlk_submit" value="Submit" />
			<div class="clear"></div>
			</div>
                        </div>
                    </div>

			<div class="clear"></div>
                </div>
			<div class="clear"></div>
            </div>
            <!--<!middiv end -->
            <!--rightdivstart -->
            <div class="rightdiv_ehome">
                <div class="downarrow2">
                    Similar Styles</div>
                <div class="rightdiv-bottom">
                    

		<div id="similar_style_right" class="right_widget_container">

		<?php
		if($similar_style_user->num_rows()>0){
		 foreach($similar_style_user->result_array() as $s_row){ ?>
		<div class="similarsep">
                        <div class="imginner4">
                            <div class="imgright1">
                                <img id="smallimg17" src="<?php echo ($s_row['user_picture_url'] !='') ? $s_row['user_picture_url'] : base_url().'/Styles/Images/icon8.png'; ?>" alt="small img" /></div>
                            <div class="imgcontent">
                                <label id="Label17">
                                   <?php echo $s_row['user_full_name']; ?></label></div>
                        </div>
                        <div class="contentright">
				uses a similar style
                            <span style="font-weight: bold; color: #555454; font-size: 11px;"><?php echo '"'.$s_row['style_name'].'"';?></span><br />
                            <a href="#" class="mls_span"></a></div>
                    </div>

		<?php }}else{

			echo '<p class="norecord"> No user found with a similar style.</p>';


			} ?>
			<div class="clear"></div>
                    
		</div>

                </div>
                <div class="linkgreenright">
                  
  <a id="seemore" href="#"></a></div>
               <!-- <div class="add">
                    <img id="advertise1" src="<?php echo base_url(); ?>Styles/Images/add.gif" alt="advertisement" /></div>
                <div class="add">
                    <img id="advertise2" src="<?php echo base_url(); ?>Styles/Images/add.gif" alt="advertisement" /></div>
	-->
            </div>

        </div>
<div class="clear"></div>
    </div>
    
	 <?php include_once(APPPATH.'views/footer.php'); ?>

 
</body>
</html>
