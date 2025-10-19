<?php
// Path to the image (place sample.jpg in the same folder as this file)
$imagePath = "j2.jpg";

// Check if image exists
if (!file_exists($imagePath)) {
    die("❌ Image not found! Please place 'sample.jpg' in the same folder.");
}

// Create image resource from JPEG
$img = imagecreatefromjpeg($imagePath);

// Allocate color for the text (R, G, B) → Blue
$textColor = imagecolorallocate($img, 0, 0, 255);

// Add text to the image
imagestring($img, 5, 20, 20, "VIT Chennai", $textColor);

// Set the content type header - JPEG image
header("Content-Type: image/jpeg");

// Output the image
imagejpeg($img);

// Free memory
imagedestroy($img);
?>
