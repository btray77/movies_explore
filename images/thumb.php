<?php

// Input
$image_path = $_REQUEST['path'] ;// "images/tophtml3.jpg";
$MAX_WIDTH = 0 + $_REQUEST['width'];
$MAX_HEIGHT = 0 + $_REQUEST['height']; 

$s_image = $_REQUEST['path']; // Image url set in the URL. ex: thumbit.php?image=URL
$e_image = "cast_thumb.gif"; // If there is a problem using the file extension then load an error JPG.
$max_width = 0 + $_REQUEST['width']; // Max thumbnail width.
$max_height = 0 + $_REQUEST['height']; // Max thumbnail height.
$quality = 100; // Do not change this if you plan on using PNG images.

// Resizing and Output : Do not edit below this line unless you know what your doing.
if(file_exists(realpath($s_image)))
{
if (preg_match("/.jpg/i", "$s_image")) {

header('Content-type: image/jpeg');
list($width, $height) = getimagesize($s_image);
$ratio = ($width > $height) ? $max_width/$width : $max_height/$height; 
if($width > $max_width || $height > $max_height) { 
$new_width = $width * $ratio; 
$new_height = $height * $ratio; 
} else {
$new_width = $width; 
$new_height = $height;
} 
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($s_image); 
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagejpeg($image_p, null, $quality); 
imagedestroy($image_p); 

}
elseif (preg_match("/.png/i", "$s_image")) {

header('Content-type: image/png');
list($width, $height) = getimagesize($s_image);
$ratio = ($width > $height) ? $max_width/$width : $max_height/$height; 
if($width > $max_width || $height > $max_height) { 
$new_width = $width * $ratio; 
$new_height = $height * $ratio; 
} else {
$new_width = $width; 
$new_height = $height;
} 
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefrompng($s_image); 
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagepng($image_p, null, $quality); 
imagedestroy($image_p); 

}
elseif (preg_match("/.gif/i", "$s_image")) {

header('Content-type: image/gif');
list($width, $height) = getimagesize($s_image);
$ratio = ($width > $height) ? $max_width/$width : $max_height/$height; 
if($width > $max_width || $height > $max_height) { 
$new_width = $width * $ratio; 
$new_height = $height * $ratio; 
} else {
$new_width = $width; 
$new_height = $height;
} 
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromgif($s_image); 
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagegif($image_p, null, $quality);
imagedestroy($image_p); 

}
else {

// Show the error JPG.
/*header('Content-type: image/jpeg');
imagejpeg($e_image, null, $quality); 
imagedestroy($e_image); */

header('Content-type: image/gif');
list($width, $height) = getimagesize($e_image);
$ratio = ($width > $height) ? $max_width/$width : $max_height/$height; 
if($width > $max_width || $height > $max_height) { 
$new_width = $width * $ratio; 
$new_height = $height * $ratio; 
} else {
$new_width = $width; 
$new_height = $height;
} 
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromgif($e_image); 
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagegif($image_p, null, $quality);
imagedestroy($image_p); 
}
}
else{
header('Content-type: image/gif');
list($width, $height) = getimagesize($e_image);
$ratio = ($width > $height) ? $max_width/$width : $max_height/$height; 
if($width > $max_width || $height > $max_height) { 
$new_width = $width * $ratio; 
$new_height = $height * $ratio; 
} else {
$new_width = $width; 
$new_height = $height;
} 
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromgif($e_image); 
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagegif($image_p, null, $quality);
imagedestroy($image_p); 
}
exit;
?>


<?php


# Constants
$image_path = $_REQUEST['path'] ;// "images/tophtml3.jpg";
$MAX_WIDTH = 0 + $_REQUEST['width'];
$MAX_HEIGHT = 0 + $_REQUEST['height']; 

# Constants
define(IMAGE_BASE, '/var/www/html/mbailey/images');

# Get image location
/*$image_file = str_replace('..', '', $_SERVER['QUERY_STRING']);
$image_path = IMAGE_BASE . "/$image_file";*/

# Load image
$img = null;
$ext = strtolower(end(explode('.', $image_path)));
if ($ext == 'jpg' || $ext == 'jpeg') {
    $img = @imagecreatefromjpeg($image_path);
} else if ($ext == 'png') {
    $img = @imagecreatefrompng($image_path);
# Only if your version of GD includes GIF support
} else if ($ext == 'gif') {
    $img = @imagecreatefrompng($image_path);
}

# If an image was successfully loaded, test the image for size
if ($img) {

    # Get image size and scale ratio
    $width = imagesx($img);
    $height = imagesy($img);
    $scale = min($MAX_WIDTH/$width, $MAX_HEIGHT/$height);

    # If the image is larger than the max shrink it
    if ($scale < 1) {
        $new_width = floor($scale*$width);
        $new_height = floor($scale*$height);

        # Create a new temporary image
        $tmp_img = imagecreatetruecolor($new_width, $new_height);

        # Copy and resize old image into new image
        imagecopyresized($tmp_img, $img, 0, 0, 0, 0,
                         $new_width, $new_height, $width, $height);
        imagedestroy($img);
        $img = $tmp_img;
    }
}

# Create error image if necessary
if (!$img) {
    $img = imagecreate($MAX_WIDTH, $MAX_HEIGHT);
    imagecolorallocate($img,0,0,0);
    $c = imagecolorallocate($img,70,70,70);
    imageline($img,0,0,$MAX_WIDTH,$MAX_HEIGHT,$c2);
    imageline($img,$MAX_WIDTH,0,0,$MAX_HEIGHT,$c2);
}

# Display the image
header("Content-type: image/jpeg");
imagejpeg($img);

?> 