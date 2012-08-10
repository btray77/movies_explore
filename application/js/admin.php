<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script>
$(document).ready(function(){

		
                
                
	 	
	});
        
        function delete_movie(id){
            
            var urll='<?php echo site_url("radmin/trash_movie");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {m_id : id},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
              
                if(data==1){
                    
                  $('#trash_button'+id).val('InActive')
                }
                else{
                     $('#trash_button'+id).val('Active');
                }
		
            });
            
            
            
        }
 function delete_actor(id){
            
            var urll='<?php echo site_url("radmin/trash_actor");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {a_id : id},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
              
                if(data==1){
                    
                  $('#trash_button_actor'+id).val('InActive')
                }
                else{
                     $('#trash_button_actor'+id).val('Active');
                }
		
            });
            
            
            
        }
function update_actor(id){

	var actor_photo=$('#tb_actor_photo'+id).val();
	var actor_name=$('#tb_actor_name'+id).val();
	var actor_desc=$('#txt_actor_desc'+id).val();

		 var urll='<?php echo site_url("radmin/update_actor");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {a_id : id,a_photo : actor_photo,a_name : actor_name,a_desc : actor_desc},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
              
                
                   alert(data); 
                  $('#list_aside'+id).html(data);
                
		
            });
	}
        
</script>        
