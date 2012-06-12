<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Styles</title>
			<link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>Styles/galleriffic-2.css" type="text/css" />
		<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.opacityrollover.js"></script>
<link href="<?php echo base_url(); ?>Styles/common_style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			function tst(firstid,parent_id)
			{
			document.getElementById('hdninst').value="";
			document.getElementById('hdninstslash').value="";
			document.getElementById('selectedimg').value=firstid;
			document.getElementById('selectedimgparentid').value=parent_id;
			
			for(i=1;i<=9;i++)
			{
			val = $("#hdn"+i).val();
			if(i==9) {
			document.getElementById('hdninst').value+=val;
			//document.getElementById('hdninstslash').value+=val;
			}
			else {
			document.getElementById('hdninst').value+=val+',';
			//document.getElementById('hdninstslash').value+=val+';';
}
			
}
$.ajax({
            url: "<?php echo $this->config->item('base_url').'index.php/style/second';?>",
            type:'POST',
			data:"id=" + document.getElementById('hdninst').value,
            dataType: 'html',
            success: function(output_string){
                    $("#contents").html(output_string);
			$("#second").hide();

					//alert(output_string);

                } // End of success function of ajax form
            }); // End of ajax call 

			
			//alert(document.getElementById('hdninst').value);
			} //end of javascript function
		</script>

</head>
<body style="background:none;">


<div class="select_style" id="select_style">Click to select one style to create room</div>
<?php //print_r($data); die; ?>
<input type="hidden" value="<?php echo $room_type;?>" id="room_type"/>
<input type='hidden' value=" " id="hdninst"/>
<input type='hidden' value=" " id="selectedimg"/>
<input type='hidden' value=" " id="selectedimgparentid"/>
<input type='hidden' value=" " id="hdninstslash"/>

   <div id="first" style="">
    <div id="example_column1" class="example_column1">

</div>


<div id="second" style="">
<div id="page">
			
				<div id="thumbs" class="navigation" style="float:none">
				<ul class="thumbs noscript">
				
				
				
					
		<?php 
		$i=0;
		foreach ($data as $values) 
{
$i=$i+1;
?>	

										
										<li>
										<input type='hidden' value='<?php echo $values['style_id'];?>' id="hdn<?php echo $i;?>"/>
										<input type='hidden' value='<?php echo $values['style_type_parent_id'];?>' id="hdnprnt<?php echo $i;?>"/>
							<a class="thumb"  href="<?php echo $this->config->item('base_url');?>Styles/allstyles/<?php echo $values[style_image]; ?>" title="<?php echo $values[style_name];?>">
								<img   src="<?php echo $this->config->item('base_url');?>Styles/allstyles/<?php echo $values[style_image]; ?>" width="75" height="75" alt="<?php echo $values[style_name];?>" onclick="tst('<?php echo $values['style_id'];?>',<?php echo $values['style_type_parent_id'];?>);"/>
							</a>
							
						</li>
					
<?php } ?>

					</ul>	
				</div>	
				</div>
				
			</div>
		</div>
		 <div id="example_column2" class="example_column2">

<div id="page">

			
				<div id="thumbs" class="navigations" style="margin-top:10px;margin-left:170px;width:300px;">
					<ul class="thumbs noscript">
   						<div id="contents" name="contents"></div>
						</ul>	
					
				</div>
				
			
		</div>


</div>


		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'margin-left' : '170px','width' : '300px', 'float' : 'left'});
				//$('div.navigations').css({'margin-left' : '13px','width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				//$('#thumbs ul.thumbs li').opacityrollover({
					//mouseOutOpacity:   onMouseOutOpacity,
					//mouseOverOpacity:  1.0,
					//fadeSpeed:         'fast',
					//exemptionSelector: '.selected'
				//});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 9,
					preloadAhead:              10,
					enableTopPager:            false,
					enableBottomPager:         false,
					maxPagesToShow:            1,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
			
		
			
		</script>

		
		




</div>
</body>
</html>
