﻿﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OneHome</title>
    <link href="<?php echo base_url(); ?>Styles/C-Homestyle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>Styles/Top_Tab_styles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>Styles/common_style.css" rel="stylesheet" type="text/css" />



  <script language="JavaScript" type="text/javascript">

/*<![CDATA[*/
var Lst;

function CngClass(obj){
 if (Lst) Lst.className='';
 obj.className+=' current';
 Lst=obj; 
 if(obj.id!="link1")
 document.getElementById("link1").className = "";
  if(obj.id!="topLink1")
 document.getElementById("topLink1").className = 'first';
 if(obj.id!="topLink2")
 document.getElementById("topLink2").className = 'second';
 if(obj.id!="topLink3")
 document.getElementById("topLink3").className = 'third';
}

/*]]>*/
    </script>
</head>
<body>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/tb/thickbox.js"></script>
	 <link href="<?php echo base_url(); ?>js/tb/thickbox.css" rel="stylesheet" type="text/css" />
    <div id="MPOuterMost">
        <div id="MPOuter">
            <div id="MPHeader">
                <div class="logo">
                </div>
                <div class="searchbox">
                    <div>
                        <input name="search" type="text" class="textbox" border="none" /></div>
                    <a href="#"></a>
                    <div class="searchbox-btn">
                        <input type="button" id="btnsearch" /></div>
                </div>
                <div class="hidiv">
                    <div class="iconhome">
                    </div>
                    <div class="hi-cont">
                      <?php echo 'Hey, '.$this->session->userdata('full_name').' !';?></div>
		<div style="float:right";><a href="<?php echo site_url('main/logout');?>">logout</a></div>
                </div>
            </div>


 <div class="hidiv1">
                <div class="topTab">
                    <ul>
                        <li id="link1LI"><a id="topLink1" class="current first" href="<?php echo site_url('main/main_page'); ?>" onclick="CngClass(this);"></a></li>
                        <li id="link2LI"><a id="topLink2" href="#" class="second" onclick="CngClass(this);"></a></li>
                        <li id="link3LI"><a id="topLink3" href="<?php echo site_url('main/user_profile'); ?>" class="third" onclick="CngClass(this);"></a></li>
                    </ul>
                </div>
            </div><!--hidiv1 ends-->


            
            <div id="MPcont">
                <div class="leftside">
                    <div class="urbangreymenu">
                        <ul>
                            <li><a href="#" title="Create Room" id="link1" onclick="CngClass(this);" class="current thickbox">Newroom</a></li>
                            <li><a href="#" onclick="CngClass(this);">Bathroom</a></li>
                            <li><a href="#" onclick="CngClass(this);">Kitchen</a></li>
                            <li><a href="#" onclick="CngClass(this);">Besement</a></li>
                            <li><a href="#" onclick="CngClass(this);">Pation</a></li>
                            <li><a href="#" onclick="CngClass(this);">Familyroom</a></li>
                            <li><a href="#" onclick="CngClass(this);">Exterior</a></li>
                        </ul>
                    </div>
                </div>
                <div id="rightside">
                    
                    <div class="outerslide">
                        <div class="link">
                            <a href="#" id="lnkprevious">previous</a></div>
                        <div class="simg">
                            <img id="slideimage1" src="<?php echo base_url(); ?>Styles/Images/img9.png" alt="slideimage" /></div>
                        <div class="link">
                            <label id="lnkor">
                                or</label></div>
                        <div class="simg">
                            <img id="slideimage2" src="<?php echo base_url(); ?>Styles/Images/img10.png" alt="slideimage" /></div>
                        <div class="link">
                            <a href="#" id="lnknext">next</a></div>
                    </div>
                    <div class="notsureskip">
                        <div class="lblnotsurediv">
                            not sure</div>
                        <div class="skipdiv">
                            <a id="lnkskip" href="#">skip</a></div>
                    </div>
                    
                       <body style="margin: 0; padding: 0;">


<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>

</body>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
