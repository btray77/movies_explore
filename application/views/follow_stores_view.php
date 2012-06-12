<!-- follow stores show area -->
		<?php 
				//include_once(APPPATH.'js/onehome_profile_js.php');//include javascript code for profile page
			if(!$stores_follow_array)
			echo '<p>To follow stores click the link "Follow Stores" ...
</p>';
			else{
			foreach($stores_follow_array as $row){ ?>
			 <div onmouseenter="show_unfollow_link(this)" class="MemberListShow store_area" id="<?php echo $row['store_id']; ?>">
                            <div class="PhotoDisplay">
                                <img alt="" src="<?php echo (isset($row['store_image'])) ? $row['store_image'] : base_url().'/Styles/Images/icon8.png'; ?>" />
                            </div>
                            <div class="NameDisplay">
                                <span><?php echo (isset($row['store_name'])) ? $row['store_name'] : 'No Name';?></span>
                            </div>
			<span class="mls_span" style="display:none" id="<?php echo $row['store_id']; ?>" onclick="unfollow_store(this);">unfollow</span>
                        </div><!--member list ends-->
			<?php }//for each end 
			}//else part end
			?>
<div class="clear"></div>

<!-- follow stores show area ends -->


