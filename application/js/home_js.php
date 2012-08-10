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

function load_main(m_id){
    
    var m_id=m_id;

    //ajax call start
var urll='<?php echo site_url("movie/get_movies_details");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {m_id : m_id},
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
function load_actor_main(a_id){
    
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
               // alert(data);
		$('#content_main').html(data);
            });
//ajax call ends

    

}
function list_click(item,m_id){

//$('#list_aside').css('background','#FFF');
//$(item).css('background','#E9E9E9');
load_main(m_id);

}

function actor_click(item,a_id){


load_actor_main(a_id);

}











$(document).ready(function(){
		load_aside();
		var actor_id=<?php echo $actor_id; ?>;
		
		if(actor_id > 0){
		load_actor_main(actor_id);
		}
		else{
		/*load_main(<?php echo $movie_id; ?>);*/
		}
                
                $('section').fadeIn(2000);
                $('#desc_more').live('click',function(){
                   
                   $('.blurb').hide();
                   $('.full').show();
                });
                    
                


                
	 	
	});
        
    function show_more_cast(m_id){
        
         //ajax call start
var urll='<?php echo site_url("movie/get_all_actors");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {m_id : m_id},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
                //alert(data);
		$('#cast_content_div').html(data);
            });
//ajax call ends
        
        
        
    }   
 
    function show_review_add(){
        $('#write_review_div').show('slow');
        
    }   
        
</script>
