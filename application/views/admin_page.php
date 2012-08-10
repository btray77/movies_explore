<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
           <li class="sidebar-list-item" id="list_aside<?php echo $row['movie_id'];?>">
		<img src="<?php echo base_url(); ?>js/timthumb.php?src=<?php echo $row['movie_photo'];?>&w=54&h=81&zc=0"  />
                <input type="text" value="<?php echo $row['movie_photo'];?>" id="tb_movie_photo"/>
               
                
		<h3><?php echo $row['movie_name'];?></h3>
		<p>caste,caste,caste</p>
                <input type="button" onclick="delete_movie(<?php  echo $row['movie_id']; ?>)" id="<?php echo 'trash_button'.$row['movie_id'];?>" value="<?php echo ($row['movie_status']==1) ? 'InActive' : 'Active'; ?>"/>
		 <input type="button" onclick="update_movie(<?php  echo $row['movie_id']; ?>)" id="<?php echo 'bt_movie_update'.$row['movie_id'];?>" value="update"/>
                 <input type="button" onclick="upload_photo(<?php  echo $row['movie_id']; ?>)" id="<?php echo 'bt_photo_upload'.$row['movie_id'];?>" value="upload photo"/>
	</li>
           <hr></hr>
	<?php } ?>
	</ul>
    
    
    
    
</div>


</body>





</html>

