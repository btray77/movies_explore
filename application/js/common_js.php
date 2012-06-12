<?php 
/*
 * 
 * @package	 onehome
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
		 var Lst;

            function CngClass(obj){
                if (Lst) Lst.className='';
                obj.className+=' current';
                Lst=obj; 
                if(obj.id!="link1")
			$('#link1').css('color', ''); 
			$('#link1').css('background', 'none'); 
                 //   document.getElementById("link1").className = "";
                if(obj.id!="topLink1")
                    document.getElementById("topLink1").className = 'first';
                if(obj.id!="topLink2")
                    document.getElementById("topLink2").className = 'second';
                if(obj.id!="topLink3")
                    document.getElementById("topLink3").className = 'third';
            }

	
//javascript for menu items ends   


function search_click(){
var search_inbox=$('#s_key');
var s_keywords=$('#s_key').val();
if(s_keywords==''){
exit;
}
s_keywords=s_keywords.replace("/ /g",',');
//alert(s_keywords);
//ajax call start
var urll='<?php echo site_url("main/getSearchitems");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {s_keywords : s_keywords},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(msg) {
               // alert(msg);
		//$('.topTab').hide();
		 $("#search_head").show();		 
               $("#middle_div").html(msg);
            });
//ajax call ends



}

function search_more_click(current_page){
	old=parseInt(current_page)-1;
	//alert(current_page+old);
	var search_inbox=$('#s_key');
	var s_keywords=$('#s_key').val();
	if(s_keywords==''){
	exit;
	}
s_keywords=s_keywords.replace("/ /g",',');
//alert(s_keywords);
//ajax call start
	var urll='<?php echo site_url("main/getSearchitems");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {s_keywords : s_keywords,current_page:current_page},
            dataType: "html",
		complete: function($data) {
			//alert($data);
			// $("#search_more_div"+current_page).hide();
		}
        }).done(function(msg) {
               // alert(msg);
		//$('.topTab').hide();
			 
               $("#search_res_area").append(msg).show('slow');;
		 $("#search_more_div"+old).hide();
		$("#search_more_div").slideToggle("slow");
		


	
            });

}

function search_follow_click(isfollow,type,id,div_obj){
	

	if(isfollow==0){

	var urll='<?php echo site_url("main/search_follow_onclick");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {id : id, type:type},
            dataType: "html",
		complete: function($data) {
			//alert($data);
			// $("#search_more_div"+current_page).hide();
		}
        }).done(function(msg) {
               // alert(msg);
		$(div_obj).val('unfollow');
		
		$(div_obj).attr("name","1"+type+id);
		//$('.topTab').hide();
			 
              // $("#search_res_area").append(msg).show('slow');;
		// $("#search_more_div"+old).hide();
		//$("#search_more_div").slideToggle("slow");
		


	
            });
	}//isfollow if end
	else{


		var urll='<?php echo site_url("main/search_unfollow_onclick");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {id : id, type:type},
            dataType: "html",
		complete: function($data) {
			//alert($data);
			// $("#search_more_div"+current_page).hide();
		}
        }).done(function(msg) {
               // alert(msg);
		$(div_obj).val('follow');
		$(div_obj).attr("name","0"+type+id);
		//$('.topTab').hide();
			 
              // $("#search_res_area").append(msg).show('slow');;
		// $("#search_more_div"+old).hide();
		//$("#search_more_div").slideToggle("slow");
		


	
            });

	
	}



}

$("#follow_unfollow").live("click", function() { 
	var name=this.name;
	
	isfollow=name.substr(0,1);
	type=name.substr(1,1);
	id=name.substr(2);
	search_follow_click(isfollow,type,id,this);
    //do stuff
});
function create_room_pop(){
$('#crt_rm_div').css('display', 'block'); 
$('#login_fader').css('display', 'block'); 
}









//pop up close button event click
$('#close_btn_pop').live("click",function(){
$('.imgareaselect-selection').parent().hide();
$(".imgareaselect-outer").hide();
$(".imgareaselect-selection").hide();
$('#login_fader').css('display', 'none');
$('#crt_rm_div').css('display', 'none');
$('#upload_view_container').css('display', 'none');
$('#tag_image_popup').hide();  
});
 
$("#s_key").keyup(function(event){
alert('fgdf');
    if(event.keyCode == 13){
        $("#btnsearch").click();
    }
});

   
</script>
