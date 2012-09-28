 <?php 

 
 if($cast_list->num_rows() > 0){
        			foreach($cast_list->result_array() as $mov){ 
        			$cast_image=($mov['actor_photo']!='') ? 'm_images/'.$mov['actor_photo'] : 'images/default_profile.jpg'
        			
        			?>
                <div class="m_unit left" id="<?php echo $mov['actor_id'];?>">
                		<div  data-movie-id="<?php echo $mov['actor_name'];?>" class="unit_container nowplaying">
                			<div bax:sub="hovertrigger" class="ubox unit_movie_box">
									<a href="<?php echo site_url('actor?a_id='.$mov['actor_id']); ?>">
										<div class="posterDiv">
			<img class="pintPoster" src="<?php echo base_url().$cast_image ;?>">
										</div>									
									<p class="movie_title"><?php echo $mov['actor_name'];?></p>
									</a>
									<p></p>
								</div>
                		</div>
               </div>
                
                <?php } } ?>