<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
textarea{
float:right;
}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<title></title>
</head>
<body>
 <?php
  include_once(APPPATH . 'js/admin.php'); 
  
?>  
<div class="wrapper">

<ul id="sidebar-list">
            
           <!-- <li class="sidebar-list-heading" >
                
            </li>-->
           <?php foreach($result->result_array() as $row){?> 
           <li class="sidebar-list-item" id="list_aside<?php echo $row['actor_id'];?>">
		<img src="<?php echo base_url(); ?>js/timthumb.php?src=<?php echo $row['actor_photo'];?>&w=54&h=81&zc=0"  />
                <input type="text" value="<?php echo $row['actor_photo'];?>" id="tb_actor_photo<?php  echo $row['actor_id']; ?>"/>
               
                
		<h3><?php echo $row['actor_name'];?></h3>
		<input type="text" value="<?php echo $row['actor_name'];?>" id="tb_actor_name<?php  echo $row['actor_id']; ?>"/>
		<textarea  rows="10" cols="40" id="txt_actor_desc<?php echo $row['actor_id'];?>"><?php  echo $row['actor_desc']; ?></textarea>
                <input type="button" onclick="delete_actor(<?php  echo $row['actor_id']; ?>)" id="<?php echo 'trash_button_actor'.$row['actor_id'];?>" value="<?php echo ($row['actor_status']==1) ? 'InActive' : 'Active'; ?>"/>
		 <input type="button" onclick="update_actor(<?php  echo $row['actor_id']; ?>)" id="<?php echo 'bt_movie_update'.$row['actor_id'];?>" value="update"/>
	</li>
           <hr></hr>
	<?php } ?>
	</ul>
    
    
    
    
</div>


</body>





</html>

