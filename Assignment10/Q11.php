<?php
if(isset($_GET['generate'])){
    $width = 200;
    $height = 200;
    $img = imagecreate($width, $height);

    for($i = 0; $i < $width; $i++){
        $col = imagecolorallocate($img, $i, $i, 255);
        imageline($img, $i, 0, $i, $height, $col);
    }

    header("Content-Type: image/png");
    imagepng($img);
    imagedestroy($img);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gradient Image</title>
</head>
<body>
    <h2>Gradient Image</h2>
    <form method="GET">
        <button type="submit" name="generate" value="1">Generate Gradient</button>
    </form>
    <?php if(isset($_GET['generate'])): ?>
        <br>
        <img src="?generate=1" alt="Gradient Image">
    <?php endif; ?>
</body>
</html>
