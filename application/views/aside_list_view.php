<ul id="sidebar-list">
            
           <!-- <li class="sidebar-list-heading" >
                
            </li>-->
           <?php foreach($result->result_array() as $row){?> 
            <a href="<?php echo site_url('movie?m_id='.$row['movie_id']); ?>"><li class="sidebar-list-item" id="list_aside<?php echo $row['movie_id'];?>">
		<img src="<?php echo base_url(); ?>js/timthumb.php?src=<?php echo $row['movie_photo'];?>&w=54&h=81&zc=0" />
		<h3><?php echo $row['movie_name'];?></h3>
		<p>caste,caste,caste</p>
		
	</li></a>
	
	<?php } ?>
	</ul>


