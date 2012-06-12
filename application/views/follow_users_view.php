
<!-- follow users show area -->
			<?php 
			
			if(!$friends_follow_array)
			echo '<p>To follow users click the link "Follow Users"...</p>';
			else{
			foreach($friends_follow_array as $row){ ?>
			 <div class="MemberListShow user_area" id="<?php echo $row['user_facebook_id']; ?>">
                            <div class="PhotoDisplay">
                                <img alt="" src="<?php echo ($row['user_picture_url'] !='') ? $row['user_picture_url'] : base_url().'/Styles/Images/icon8.png'; ?>" />
                            </div>
                            <div class="NameDisplay">
                                <span><?php echo (isset($row['user_full_name'])) ? $row['user_full_name'] : 'No Suggession';?></span>
                            </div>
<span class="mls_span" style="display:none" id="<?php echo $row['user_facebook_id']; ?>" onclick="unfollow_user(this);">unfollow</span>
                        </div>
			<?php }//for each end 
			}//else part end
			?>

		<div class="clear"></div>

		
		<!-- follow users show area ends -->
