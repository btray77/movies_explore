<?php 
/*
 * 
 * @package	 kkkkk
 * @category	 javascript
 * @author	 prabin@eisplc.com(p/97/253)
 * @usage        common javascripts call most of the pages
 * @actors       users
 * Created Date  20-04-2012
 * Last updated  20-04-2012(prabin)
 * 
 */
?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<script type="text/javascript">        
//javascript for menu items start

function load_aside(key){
    
    var s_keywords=key;

    //ajax call start
var urll='<?php echo site_url("movie/get_movies_lists");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {s_keywords : s_keywords},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
                //alert(data);
		$('#side_ul_con').html(data);
            });
//ajax call ends

    

}

function load_main(a_id){
    
    var a_id=a_id;

    //ajax call start
var urll='<?php echo site_url("movie/get_actors_details");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {a_id : a_id},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
                //alert(data);
		$('#content_main').html(data);
            });
//ajax call ends

    

}
function list_click(item,m_id){

//$('#list_aside').css('background','#FFF');
//$(item).css('background','#E9E9E9');
load_main(m_id);

}













$(document).ready(function(){

		load_aside('');
                load_main('');
                
                $('#desc_more').live('click',function(){
                   
                   $('.blurb').hide();
                   $('.full').show();
                });
                    
                
                
	 	
	});
        
        
        
        
        
</script>