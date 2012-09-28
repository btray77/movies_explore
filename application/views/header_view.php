
<?php 
$pageURL = 'http';
 //if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
?>
<div class="wrapper">
<header>
<div class="header_container clearfix">
          <a href="#" class="site-logo">
            <img height="30" src="" class="" alt="">
         Total Movies
          </a>

           

              
    <div class="topsearch box">
        <form method="get" id="top_search_form" action="/search" accept-charset="UTF-8">
  <a class="advanced-search tooltipped downwards" href="/search" original-title="Advanced Search"><span class="mini-icon mini-icon-advanced-search"></span></a>
  <div class="search placeholder-field js-placeholder-field">
    <input type="text" data-hotkey="s" placeholder="Search...." data-autocomplete="my-repos-autocomplete" autocomplete="off" spellcheck="false" results="5" name="q" id="global-search-field" class="search my_repos_autocompleter">
    <div class="autocomplete-results" id="my-repos-autocomplete">
      <ul class="js-navigation-container"></ul>
    </div>
   
    <span class="mini-icon mini-icon-search-input"></span>
  </div>
 
</form>

      <ul class="top-nav">
          <li class="explore"><a href="<?php echo site_url('movies'); ?>">Movies</a></li>
          <li><a href="<?php echo site_url('casts'); ?>">Cast</a></li>
          <li><a href="#">users</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>


            


  <div id="h_userbox">
    <div id="h_user">
      <a href="#"><img height="20" width="20" src=""></a>
      <a class="name" href="#"><?php echo ($this->session->userdata('user_name')) ? $this->session->userdata('user_name') : 'Guest'; ?></a>
    </div>
    <ul id="user-links">
      <li>
	<?php if($this->session->userdata('is_logged_in')==1){?>

		<a class="tooltipped downwards" id="dlogout" href="<?php echo site_url('login/logout?redirect='.$pageURL); ?>" original-title="Create a New Repo"><span class="mini-icon mini-icon-create">logout</span></a>
 
	<?php } else { ?>


        <a class="tooltipped downwards" id="sign_in" href="#" original-title="Create a New Repo"><span class="mini-icon mini-icon-create">signin</span></a>
	
	<?php } ?>
	
      </li>
     <!--<li>
        <a class="tooltipped downwards" id="account_settings" href="/settings/profile" original-title="Account Settings (You have no verified emails)">
          <span class="mini-icon mini-icon-account-settings"></span>
            <span class="setting_warning">!</span>
        </a>
      </li>
      <li>
          <a class="tooltipped downwards" id="logout" data-method="post" href="/logout" original-title="Sign Out">
            <span class="mini-icon mini-icon-logout"></span>
          </a>
      </li>-->
    </ul>
  </div>



          
        </div>



</header>
