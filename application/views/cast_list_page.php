<?php if($cast_array){ ?>
<ul class="main-page-list" lesstext="Show less cast" component="ShowMoreItems" id="">
 
   <?php foreach($cast_array->result_array() as $row){?>
  
    
  <a href="<?php echo site_url('actor?a_id='.$row['actor_id']);?>">
    <li  class="box clickable hidden" component="PageLink">
      <img alt="<?php echo $row['actor_name']?>" src="<?php echo base_url(); ?>js/timthumb.php?src=<?php echo $row['actor_photo']?>&w=50&h=50&zc=0" class="thumbnail person-thumbnail">
      <div class="role">
	      <span class="person-name"><?php echo $row['actor_name']?></span>
	     
      </div>
    </li></a>
    
    
    <?php } ?>
    
  <li class="box toggle"><a class="moreItems button org_button" onclick="show_more_cast(<?php echo $movie_id; ?>)">Show all</a></li>
  </ul>

<?php }else{
    
    echo "No cast available";
} ?>
