<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $srcPath = $_FILES['image']['tmp_name'];
        $src = imagecreatefromjpeg($srcPath);

        $newWidth = isset($_POST['width']) ? intval($_POST['width']) : imagesx($src);
        $newHeight = isset($_POST['height']) ? intval($_POST['height']) : imagesy($src);
        $keepAspect = isset($_POST['aspect']) ? true : false;

        if ($keepAspect) {
            $ratio = imagesx($src) / imagesy($src);
            $newHeight = intval($newWidth / $ratio);
        }

        $new = imagescale($src, $newWidth, $newHeight);
        header("Content-Type: image/jpeg");
        imagejpeg($new);
        imagedestroy($src);
        imagedestroy($new);
        exit;
    } else {
        echo "Please upload a valid JPEG image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Resize Demo</title>
</head>
<body>
    <h2>Upload an image to resize</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/jpeg" required><br><br>
        Width: <input type="number" name="width" value="300" required><br>
        Height: <input type="number" name="height" value="300"><br>
        <label>
            <input type="checkbox" name="aspect" checked> Keep Aspect Ratio
        </label><br><br>
        <button type="submit">Resize Image</button>
    </form>
</body>
</html>
