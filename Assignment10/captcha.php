<?php
session_start();
$captcha = rand(1000, 9999);
$_SESSION['captcha'] = $captcha;

$image = imagecreate(100, 40);
$bg = imagecolorallocate($image, 200, 200, 200);
$txt = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 25, 10, $captcha, $txt);

header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>
