<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $title; ?></title>
	<link href="<?php echo base_url(); ?>/Styles/common_style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/Styles/A_Intoduction_1_Styles.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/Styles/A-IntroForOther.css" rel="stylesheet" type="text/css" />
 
    <!--[if  IE 7]>  
  <style>
  #btnSearch
  {
  margin-top:-23px;
  }
  .txtShaddow
  {
 
  margin-top:-1px;
  }
  #txtSearch
  {
  padding-top:10px;
  height:33px;
  }
  .skipStep
  {
  width:72px;
  
  margin-left:230px;
  }
  </style>
<![endif]-->
    <!--[if  IE 8]>  
<style>
   #btnSearch
  {
  margin-top:-7px;
  height:43px;
  
  }
  #txtSearch
  {
    padding-top:13px;
  height:30px;
  margin-top:1px;
  }
  </style>
<![endif]-->
<!--quto complete-->

<!-- auto complete end -->







</head>
<body>
 

    <div id="page">
        <div id="HeaderPart">
            <div class="logo_hm">
                <a href="<?php echo site_url('main/main_page'); ?>"><img alt="" src="<?php echo base_url(); ?>/Styles/Images/introduction-logo.png" /></a>
            </div>
        </div>

        <div id="ContentPart">
	<div class="content_head">
	<h2>
		<?php echo $title; ?>
	</h2>
	</div>
	
	
	<?php echo $desc; ?>
	
            
        </div>
        <div class="contentShaddow">
        </div>
	
    </div>
 <?php include_once(APPPATH.'views/footer.php'); ?>
</body>
</html>
