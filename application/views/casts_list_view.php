<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title></title>
        <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/scrollpagination.js"></script>
<!--<link href="<?php echo base_url(); ?>/css/scrollpagination_demo.css" rel="stylesheet" media="screen" /> -->
    </head>
    <body>
        <div style="width:100%" class='outer_container'>
         <?php
        include_once(APPPATH . 'views/header_view.php');
        include_once(APPPATH . 'js/casts_js.php');
        ?> 
        
         <div id="right_side" class="right_list_movies">
            <div id="content_main_list_movies">
                <div class="main_inside" >
                <div id='main_inside_div'>
                
                  <?php
        include_once(APPPATH . 'views/ajax_cast_list_view.php');
        ?> 
                </div>
              <input type="hidden" id="page_counter" value="<?php echo $page_counter; ?>">
                <div id="loadingm" class="loadingm" style="display:none"><img src="<?php echo base_url(); ?>images/loading.gif"></div>              
					  <div class="clear"></div>              
                
                
                
                
                </div>
            </div>
         </div>    
        
        <?php
        include_once(APPPATH . 'views/footer_view.php');
        ?> 
		</div><!-- outer container end --> 
		</body>