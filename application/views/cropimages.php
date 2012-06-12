<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.imgareaselect.pack.js"></script>
<link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>Styles/imgareaselect-default.css" type="text/css" />
<script type='text/javascript'> 
    $(function () {
      		
   $(document).ready(function () {

		
	$('#crop').imgAreaSelect({handles: true,
        
		onSelectEnd: function (img, selection) {
            document.getElementById('x1').value = selection.x1;
			document.getElementById('x2').value = selection.x2;
			document.getElementById('y1').value = selection.y1;
			document.getElementById('y2').value = selection.y2;
			document.getElementById('w').value = selection.width;
			document.getElementById('h').value = selection.height;
          
        }
    });

	});
		
   });
    $(document).ready(function(){

        $('#saveThumb').click(function(){
		var name=prompt("Please enter a  name for your image");
     
	 var x1 = document.getElementById('x1').value;
			var y1 = document.getElementById('y1').value;
            var x2 = document.getElementById('x2').value;
            var y2 = document.getElementById('y2').value;
          	var w = document.getElementById('w').value;
           	var h = document.getElementById('h').value;
			var extension = document.getElementById('extension').value;
			var filename = document.getElementById('filename').value;
			
			
						
			$.ajax({
            url: "<?php echo $this->config->item('base_url').'index.php/crop/croping';?>",
            type:'POST',
			data:{x1:x1,x2:x2,y1:y1,y2:y2,w:w,h:h,name:name,extension:extension,filename:filename},
            dataType: 'text',
            success: function(output_string){
                    $("#test").text(output_string);

					alert(output_string);

                } // End of success function of ajax form
            }); // End of ajax call 
			
			
            if (x1 == "" || y1 == "" || x2 == "" || y2 == "" || w == "" || h == "") {
                alert("You must make a selection first");
                return false;
            }
            else {
                return false;
            }
        });
 
  });
	
	</script>
	
	
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<img id='crop' src="http://a7.sphotos.ak.fbcdn.net/hphotos-ak-snc6/75254_279436608816377_100002501199182_593863_632038838_n.jpg" />
<div id="test"></div>
<input type='hiden' name='x1' value='' id='x1' />
<input type='hiden' name='y1' value='' id='y1' />
<input type='hiden' name='x2' value='' id='x2' />
<input type='hiden' name='y2' value='' id='y2' />
<input type='hiden' name='w' value='' id='w' />
<input type='hiden' name='h' value='' id='h' />
<input type='hiden' name='extension' id='extension'  value='jpg' />
<input type='hidden' name='filename' id='filename'  value='75254_279436608816377_100002501199182_593863_632038838_n.jpg' />
<input type='hidden' name='width'  value='$width' />
<input type='hidden' name='height'  value='$height' />
<input type='submit' name='uploadThumbnail' value='Save Thumbnail' id='saveThumb' />

</body>
</html>
