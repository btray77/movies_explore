 <?php 

 
 if($movie_list->num_rows() > 0){
        			foreach($movie_list->result_array() as $mov){ ?>
                <div class="m_unit left" id="<?php echo $mov['movie_id'];?>">
                		<div  data-movie-id="<?php echo $mov['movie_name'];?>" class="unit_container nowplaying">
                			<div bax:sub="hovertrigger" class="ubox unit_movie_box">
									<a href="<?php echo site_url('movie?m_id='.$mov['movie_id']); ?>">
										<div class="posterDiv">
			<img class="pintPoster" src="<?php echo base_url().'m_images/'.$mov['movie_photo'] ;?>">
										</div>									
									<p class="movie_title"><?php echo $mov['movie_name'];?></p>
									</a>
									<p></p>
								</div>
                		</div>
               </div>
                
                <?php } } ?>