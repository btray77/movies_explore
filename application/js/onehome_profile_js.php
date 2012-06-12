<script type="text/javascript">
/*
 * 
 * @package	 onehome
 * @category	 javascript
 * @author	 prabin@eisplc.com(p/97/253)
 * @usage        views/user_profile_view.php
 * @actors       users
 * Created Date  15-04-2012
 * Last updated  19-04-2012(prabin)
 * 
 */
	//call when  click viewmorestore on profile page
    function view_more_store(){
        var fset=$("#offset").val();//get offset and limit for query from the profile page
        var lmt=$("#limit").val();
        var next_fset = parseInt(fset) + parseInt(lmt);//find next offset
        //alert(fset);
        //alert(lmt);
	//ajax call to return html to show  store list on profile page
        $.ajax({
            url: "<?php echo site_url('main/ajax_more_stores'); ?>",
            type: "POST",
            data: {offset : fset , limit : lmt},
            dataType: "html"
        }).done(function(msg) {
            //alert(msg);
            $("#offset").val(next_fset);
            var new_item = $('<div class="newst'+fset+'">'+msg+'</div>').hide();
            $("#follow_stores").append(new_item);//appent result html
            $(".newst"+fset).slideToggle("slow");
 	
        });
    }
	//call when  click viewmoreusers on profile page
    function view_more_user(){
        var fset=$("#u_offset").val();//get offset default is 6 harad coded on profile page
        var lmt=$("#u_limit").val();//get limit default is 6 harad coded on profile page
        var next_fset = parseInt(fset) + parseInt(lmt);
        //alert(fset);
        //alert(lmt);
	//ajax call to return html to show  user list on profile page
        $.ajax({
            url: "<?php echo site_url('main/ajax_more_users'); ?>",
            type: "POST",
            data: {offset : fset , limit : lmt},
            dataType: "html"
        }).done(function(msg) {
            //alert(msg);
            $("#u_offset").val(next_fset);
            var new_item = $('<div class="u_newst'+fset+'">'+msg+'</div>').hide();
            $("#follow_friend").append(new_item);//appent result html
            $(".u_newst"+fset).slideToggle("slow");
        });
    }

	//unfollow the users on click profile page
    function unfollow_user(item){
        var fset=$("#u_offset").val();
        var lmt=$("#u_limit").val();
        var total_lmt = parseInt(fset) + parseInt(lmt);
        var user_facebook_id=item.id;
        if (confirm('Are you sure you want to unfollow')) {
            $.ajax({
                url: "<?php echo site_url('main/unfollow_users'); ?>",
                type: "POST",
                data: {id : user_facebook_id,limit : total_lmt},
                dataType: "html"
            }).done(function(msg) {
                //alert(msg);		 
                $("#follow_friend").html(msg);
            });
        }
    }

	//unfollow the stores on click profile page
    function unfollow_store(item){
        var fset=$("#offset").val();
        var lmt=$("#limit").val();
        var total_lmt = parseInt(fset) + parseInt(lmt);
        var store_id=item.id;
        if (confirm('Are you sure you want to unfollow"')) {
            $.ajax({
                url: "<?php echo site_url('main/unfollow_stores'); ?>",
                type: "POST",
                data: {id : store_id,limit : total_lmt},
                dataType: "html"
            }).done(function(msg) {
                //alert(msg);		 
                $("#follow_stores").html(msg);
            });
        }
    }

	// Handler for .ready() called.
    $(document).ready(function() {
        
        //handle the store mouse hover
        $(".store_area").live("hover",function(){
            var item=this.id;
            $("#"+item+" span").show();
        }).live("mouseleave",function(){
            var item=this.id;
            $("#"+item+" span:last").attr("style", "display:none");
        });

	 //handle the store mouse hover
        $(".user_area").live("hover",function(){
            var item=this.id;
            $("#"+item+" span").show();
            $("#"+item+" img").show();
        }).live("mouseleave",function(){
            var item=this.id;
            $("#"+item+" span:last").attr("style", "display:none");
        });

	//fade effect on mouse hover 
        $(".MemberListShow")
        .live("hover",function() {
            $(this).css({
                "opacity": "0.4"
            })
        }).live("mouseleave",function(){
            $(this).css({
                "opacity": "1"
            })
        });

	




    });

$(document).ready(function(){
	document.getElementById("link1").className = "";
	if("<?php echo $room_type_id; ?>")
	document.getElementById("rmt<?php echo $room_type_id; ?>").className = "current";
	});
// Handler for .ready() called ends....




</script>
