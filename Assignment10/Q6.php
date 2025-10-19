<?php
$img = imagecreate(400, 300);

$background = imagecolorallocate($img, 240, 240, 240);
$red = imagecolorallocate($img, 255, 0, 0);
$blue = imagecolorallocate($img, 0, 0, 255);
$green = imagecolorallocate($img, 0, 150, 0);
$black = imagecolorallocate($img, 0, 0, 0);


imagerectangle($img, 50, 50, 150, 150, $red);             
imagefilledrectangle($img, 200, 50, 350, 150, $blue);    
imageellipse($img, 100, 225, 80, 80, $black);            
imagefilledellipse($img, 275, 225, 120, 80, $green);      

imagestring($img, 5, 120, 10, "GD Library Shapes", $black);

header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
