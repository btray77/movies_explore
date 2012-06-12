<?php 

$main_img=isset($selected_photo_array['0']['src_big']) ?  $selected_photo_array['0']['src_big'] : base_url().'Styles/Images/default_house.gif';	

$room_type_name='';
if($rooms_result){
	foreach($rooms_result as $n_row){
		if($n_row['room_type_id']==$this->session->userdata('rm_type'))
			$room_type_name=$n_row['room_type_name'];
	}
}

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
//include javascrit for common purpose
include_once(APPPATH . 'js/common_js.php'); 
//include javascrit for compare purpose page
include_once(APPPATH . 'js/compare_js.php'); 
?>


     
    <!--[if  IE 8]>  
    
 <style>
 #MPHeader
 {
 width:1229px;
 }
 
 </style>
<![endif]-->
    <!--[if  IE 7]>
    
<style>
 #navigation
 {
 float:left;
 margin-top:0px;
 }
 .searchBoxes
 {
 width:449px;
 margin-left:-97px;
 }
 .downarrow2
 {
 width:214px;
 }
.tagError UL
{
margin-left:-36px;
}
ul.nav-sub li
{
 margin-left: -84px;
}

 </style>
<![endif]-->
    
    <style type="text/css">
        #fullPage
        {
            width: 100%;
        }

	
    </style>
</head>
<body>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tb/thickbox.js"></script>
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
<!--report error pop up-->
<div id="tag_image_popup" class="tag_image_popup">
<div class="close_btn_pop" id="close_btn_pop">
	<img src="<?php echo base_url();?>Styles/Images/close_b.png"></img>
	</div>
<!---- rport error hiden div --->
<div class="report_error_popup">
<div id="p_tag_head">
<h3>Report Error</h3>
</div>
	<div class="notice" id="v_error"></div>
		
	
				<div class="pop_wrapper">
	
	
		
<?php 
		$attributes = array('class' => 'Form StaticForm noMargin', 'id' => 'report_error_form' , 'name'=>'report_error_form');
		echo form_open('main/error_report_insert',$attributes);?>
		<input type="hidden" value="" name="error_photo_id" id="error_photo_id" />
            <ul>
           

		
                <li class="Report_val">
                    
  		<select id="error_type" name="error_type" class="">
		<option value="">select</option>
		<?php
			if($report_error_type){
			foreach($report_error_type as $row )
		echo '<option value="'.$row["report_error_type_id"].'">'.$row["report_error_type_name"].'</option>';
		}
		?>
	</select>
                    <label>Error Type</label>
		<span class="fff"></span>
                </li>
		
		<li class="Report_val" >
			
                   <textarea rows="5" cols="26" name="er_comment" id="er_comment">

</textarea> 
                    <label>Comment</label>
                   
                </li> 
            </ul>

      
                    <div align="center" >
                       <input id="rep_sub_but" class="sub_but" type="button" value="submit" onclick="report_error_sub();" />
                    </div>
        </form>		


	</div>




		</div>

<!----- report error hiden div ends -->
</div>
</div>
    <!-- <div id="MPOuter">-->
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

		 <div style="float:right"><a href="<?php echo site_url('main/logout'); ?>">Logout</a></div>

		<input type="hidden" value="<?php echo (!$selected_photo_array['0']['photo_fb_id']) ? '' : $selected_photo_array['0']['photo_fb_id'];?> " id="current_photo_fb_id" />

                </div>
            </div>
          
            <div class="hidiv1">
               <div class="topTab">
                        <ul>
                            <li id="link1LI"><a id="topLink1" class="first" href="<?php echo site_url('main/main_page'); ?>" onclick="CngClass(this);"></a></li>
                            <li id="link2LI"><a id="topLink2" href="<?php echo site_url('main/compare'); ?>" class="current second" onclick="CngClass(this);"></a></li>
                            <li id="link3LI"><a id="topLink3" href="<?php echo site_url('main/user_profile'); ?>" class=" third" onclick="CngClass(this);"></a></li>
                        </ul>
                    </div>
            </div>
		<div class="clear"></div>
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
                            <li><a href="<?php echo site_url('main/redirect_compare/'.$row['room_type_id']); ?>" onclick="CngClass(this);" id="rmt<?php echo $row['room_type_id']; ?>"><?php  echo $row['room_type_name']; ?></a></li>
                                <?php
					}
					}
				?>
                            </ul>
                </div>
		<!--rooms menu end -->

                 <!--   <div id="Advt">
                        <div class="downarrow">
                            Beall's Smart Latrine $99</div>
                        <div class="AdvtImg">
                            <img alt="" src="<?php //echo base_url(); ?>Styles/Images/img7.png" />
                        </div>
                        <div class="buyBtn">
                            <input id="btnBuy" type="button" value="Buy" />
                        </div>
                        <div class="viewAmt">
                            <label class="lblAmt">
                                $99USD</label>
                        </div>
                    </div> -->
                </div>
		<div id="search_head" class="search_head  c_search_head">
	<h2>Search Results</h2>
		</div>	
                <div class="c_middlediv" id="middle_div">
                    <div id="PagePart">
                        <div id="topPart">
                            <div class="imgLeft">
                                <img id="imgLeft_select" alt="" src="<?php echo $main_img;?>" />
                            </div>
                            <div class="rightPart">
                                <div class="leftArrow">
                                    <a href="#" id="btn-prev"><button id="btnLeft">
                                    </button></a>
                                </div>
                                <div class="img">
                                    <div class="txtHeading">
                                        <span class="headText"><?php echo  ($room_type_name!='') ? 'Selected '.$room_type_name : '' ; ?></span>
				</div>

		<!--start slide-->
			<div id="slider">

	<div id="mask-gallery">
	<ul id="gallery">

	<?php
		if($compare_photos_array){
						
			foreach($compare_photos_array as $row){
				?>  
		<li><img src="<?php echo $row['src_big']; ?>" width="205" height="187" alt=""/>
<input type="hidden" value="<?php echo $row['photo_id'];?>" id=""/>
</li>
		<?php
			}}

			else{
			?>
	
			<li><img src="<?php echo base_url().'Styles/Images/default_house.gif' ?>" width="205" height="187" alt=""/>

			
			<?php }


			?>
	</ul>
	</div>
	
	

</div>



<div class="clear"></div>

		<!-- end slide-->				




                                <!--    <img id="imgRight_select" alt="" src="<?php echo base_url(); ?>Styles/Images/img6.png" /> -->




                                    <div class="tagError">
                                        <ul>
                                          
                                            <li class="" style="float:none;text-align:center;"><a href="#" id="re_link"  onclick="report_error('re_link');">Report Error</a></li>
                                           
					<div class="clear" id="link1"></div>
                                        </ul>
                                    </div>

                                </div>
                                <div class="rightArrow">
                                    <a href="#" id="btn-next"><button id="btnRight">
                                    </button></a>
                                </div>
                            </div>
                        </div>
                        <div id="bottomPart">
                           
                        <div class="featuredPdts">
                            <span>Featured Products</span>
                           <div class="featuredPdtsListing">
                              <div class="featuredPdtsList">
                               <ul>
			<?php foreach($arry_featured_img->result_array() as $f_row){ ?>
				 <li class="PdtsListDisp">
                                    <div class="pdtImg">
                                        <img alt="" src="<?php echo base_url().$f_row['f_img_url']; ?>" width="75px" height="75px"/>
                                    </div>
					<div class="pdt_nm">
					<span><?php echo $f_row['tg_name'];?></span>
                                         
                                        </div>
                                    <!--<div class="pdtChk">
                                        <input id="chlSel" type="checkbox" />
                                    </div>-->
                                </li>
				<?php } ?>
                              
                               
                              <!--  <div class="PdtsListDisp">
                                    <div class="pdtImgLast">
                                        <img alt="" src="<?php echo base_url(); ?>Styles/Images/icon11.png" />
					</div>
                                    </div>-->
					<div class="clear"></div>
					</ul>
                               </div>
                            </div>
                        </div>
                        <div class="sugesstedProducts">
                            <span>Suggested Products</span>
                            <div class="suggestedPdtsListing">
                                <div class="suggestedPdtsList">
                                   
			<?php foreach($arry_sugt_pro as $row){ ?>
				 <div class="PdtsListDisp">
                                       <a class="itemPopupTrigger"  href="<?php echo $row['products_url'];?>" rel="<?php echo isset($row['products_main_image']) ?  $row['products_main_image'] : base_url().'Styles/Images/default_house.gif';?>^<?php echo $row['products_descr']; ?>^ "> <div class="pdtImg">
                                            <img alt=""  src="<?php echo isset($row['products_main_image']) ?  $row['products_main_image'] : base_url().'Styles/Images/default_house.gif';?>" width="75px" height="75px" />
                                        </div></a>
                                       <div class="pdt_nm">
					<span><?php echo $row['product_name'];?></span>
                                           <!--  <input id="Checkbox6" type="checkbox"/>-->
                                        </div>
                                  </div>

			<?php } ?>
				<div class="clear"></div>
                                    
                                </div>
                              
                               
                            </div>
                        </div>
                    </div>
		<div class="clear"></div>
                </div>
            </div>
            <div class="rightdiv">
                <div class="downarrow2">
                    Connection Talk</div>
                <div class="rightdiv-bottom">

			<div id="ajax_talk_container" class="right_widget_container">
			 <!--recent conversation include  area -->
                            <?php
                            include_once(APPPATH.'views/ajax_recent_comp_coversation.php'); //ajax_recent_conversation.php for list stores
                            ?>

                            <!-- recent conversation include ends -->

			</div>

                  
                    <div class="textSubmision">
                        <textarea maxlength="150" class="txtAreaSubmit" id="con_tlk_comp_textarea" cols="20" rows="2" style="padding:5px;"></textarea>
                        <div class="SubmitBTN">
                            <div class="buttonPart">
                                <input class="btnSubmit" id="con_tlk_compare_submit" type="button" value="Submit" />
                            </div>
                            <div class="textPart">
                                <label id="subStmt">
                                   <?php echo 'Posting as ' . $this->session->userdata('full_name') ; ?> 
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
     <div class="clear"></div>
    </div>
   <?php include_once(APPPATH.'views/footer.php'); ?>
    


</body>
</html>
