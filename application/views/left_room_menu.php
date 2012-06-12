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
