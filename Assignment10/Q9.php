<?php
function circlesOverlap($x1, $y1, $r1, $x2, $y2, $r2){
    $distance = sqrt(($x1 - $x2)**2 + ($y1 - $y2)**2);
    return $distance < ($r1 + $r2);
}

if(isset($_GET['generate'])){
    $img = imagecreate(400, 400);
    $bg = imagecolorallocate($img, 255, 255, 255);

    $circles = [];
    $maxCircles = 10;
    $radius = 30;

    for($i = 0; $i < $maxCircles; $i++){
        $tries = 0;
        do {
            $x = rand($radius, 400 - $radius);
            $y = rand($radius, 400 - $radius);
            $overlap = false;
            foreach($circles as $c){
                if(circlesOverlap($x, $y, $radius, $c['x'], $c['y'], $radius)){
                    $overlap = true;
                    break;
                }
            }
            $tries++;
        } while($overlap && $tries < 100);

        if(!$overlap){
            $color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
            imagefilledellipse($img, $x, $y, $radius*2, $radius*2, $color);
            $circles[] = ['x'=>$x, 'y'=>$y];
        }
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
    <title>Circles</title>
</head>
<body>
    <h2>NRandom Circles</h2>
    <form method="GET">
        <button type="submit" name="generate" value="1">Generate Circles</button>
    </form>
    <?php if(isset($_GET['generate'])): ?>
        <br>
        <img src="?generate=1" alt="Random Circles">
    <?php endif; ?>
</body>
</html>
