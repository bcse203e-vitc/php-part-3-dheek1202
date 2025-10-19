<?php
if(isset($_GET['generate'])){
    $width = 400;
    $height = 60;
    $img = imagecreate($width, $height);
    $bg = imagecolorallocate($img, 240, 240, 240);
    $black = imagecolorallocate($img, 0, 0, 0);
    $text = "Generated on " . date("H:i:s");
    imagestring($img, 5, 10, 20, $text, $black);
    header("Content-Type: image/png");
    imagepng($img);
    imagedestroy($img);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Image Banner</title>
</head>
<body>
    <h2>Dynamic Banner</h2>
    <form method="GET">
        <button type="submit" name="generate" value="1">Generate Banner</button>
    </form>
    <?php if(isset($_GET['generate'])): ?>
        <br>
        <img src="?generate=1" alt="Dynamic Banner">
    <?php endif; ?>
</body>
</html>
