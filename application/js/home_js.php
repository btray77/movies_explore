<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '225700707557663', // App ID
      channelUrl : '//202.88.239.12:8011/review/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

	/* All the events registered */
                FB.Event.subscribe('auth.login', function(response) {
                    // do something with response
                   login();
                });
                FB.Event.subscribe('auth.logout', function(response) {
                    // do something with response
                    alert('loginout');
                });
 
                FB.getLoginStatus(function(response) {
                    if (response.session) {
                        // logged in and connected user, someone you know
                        alert('loginsession');
                    }
                });


    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);

			

   }(document));


 

</script>
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

function login(){

 FB.api('/me', function(response) {
	
                     var query = FB.Data.query('select name, hometown_location, sex, pic_square from user where uid={0}', response.id);
		 	

                     query.wait(function(rows) {
 			var name=rows[0].name;
			var f_id=response.id;
			var pic_square=rows[0].pic_square;
			var email=rows[0].email;
			//ajax call start
var urll='<?php echo site_url("login/facebook_login");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {name : name,f_id : f_id ,pic_square : pic_square,email:email},
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
                alert(data);
		
            });
//ajax call ends

                      
                     });
                });



 


}



      
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
function load_movie_review(key){//input para movie_id
    
    var m_id=key;

    //ajax call start
var urll='<?php echo site_url("movie/ajax_get_movies_review");?>';
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
		$('#movie_review_list').html(data);
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



	


	






		$('#overlayid').click(function(e) {
  	
	if(e.target.id == "overlayid")
    		{
	
	 $('#overlayid').hide();
	$('#signupDiv').hide();
	$('#loginDiv').show();
		}
});

$('#sign_in').click(function(e) {
  	
	
	
	 $('#overlayid').show();
	$('#signupDiv').hide();
	$('#loginDiv').show();
		
});
$('#log_in').click(function(e) {
  	
	
	
	 $('#overlayid').show();
	$('#signupDiv').hide();
	$('#loginDiv').show();
		
});
$('#sign_up').click(function(e) {
  	
	
	
	 $('#overlayid').show();
	 $('#loginDiv').hide();
	$('#signupDiv').show();
	
		
});

		setTimeout(function() {
      // Do something after 5 seconds
		var w_height=$(document).height();
		$('#overlayid').css('height',w_height);
		}, 4000);

		$('.pop_close').click(function () {
			
			$('.overlay').hide();
			return false;
		});




		$('#overview').css('background','none repeat scroll 0 0 #1A7DBB');
		//Previous slide by passing prev=1
		$('.bar_menu').click(function () {
			var item=this.id;
			$('.bar_menu').css('background','none repeat scroll 0 0 #C9E2F1');
			$('#'+item).css('background','none repeat scroll 0 0 #1A7DBB');
			$('.cont_menu_area').hide();
			$('#d'+item).show();
			if(item=='media' || item=='overview')
			$('#gallery_media').show();
			else
			$('#gallery_media').hide();
			
			return false;
		});




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
	
	function review_submit(){
	
	var r_title=$('#re_title').val();
	var r_comment=$('#re_comment').val();
	var r_movie_id=$('#r_movie_id').val();
	var r_user_type=$('#r_user').val();
	var r_review=$('#m_rating').val();
	
	if((!r_title) || (!r_comment) || (!r_movie_id) || (!r_user_type)){
	alert('please fil  all required fields');
	return false;
	
	}
	
	  //ajax call start
var urll='<?php echo site_url("movie/insert_movie_review");?>';
 $.ajax({
            url: urll,
            type: "POST",
            data: {m_id : r_movie_id ,title : r_title, comment : r_comment ,user_type : r_user_type,r_review : r_review  },
            dataType: "html",
		complete: function($data) {
			//alert($data);
		}
        }).done(function(data) {
        	
        	load_movie_review(r_movie_id);
        	$('#re_comment').val('');
			$('#re_title').val('');
             //  alert(data);
		//$('#cast_content_div').html(data);
            });
//ajax call ends
	
	
	
	
	
	
	}

function login_validate(){
	var error='';
	var email=$('#LoginForm_email').val();
	var password=$('#LoginForm_password').val();
	if(!email || !password)
	error='Please fill all required field';
	if($.trim(email)!='' && !email.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)) {
	error="Email format isn't valid";
	}
	
	if(error !='')
	alert(error);
	else
	$('#login-form').submit();
}
function select_rating(item){
	var id=item.id;
	var rate=id.split('_');
	var rate=parseInt(rate[1]);
		$('#m_rating').val(rate);//value assign to hidden field 
	var rate1=rate;
	while(rate>1){
		
		$('#rate_'+rate).addClass('rate_on');
		$('#rate_'+rate).removeClass('rate_off');
		rate=rate-1;
		}
		while(rate1<6){
				
				rate1=rate1+1;
				$('#rate_'+rate1).addClass('rate_off');
				$('#rate_'+rate1).removeClass('rate_on');
				
			}
	
	
	}


        
</script>
