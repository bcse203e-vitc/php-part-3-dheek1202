<?php
if (!is_dir("uploads")) {
    mkdir("uploads");
}

$message = "";

if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    $tempPath = $_FILES['file']['tmp_name'];
    $fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowed)) {
        $targetPath = "uploads/" . $filename;

        if (move_uploaded_file($tempPath, $targetPath)) {
            $message = "<p style='color:green'>File uploaded successfully </p>";
            $uploadedImage = $targetPath;
        } else {
            $message = "<p style='color:red'>Failed to upload file </p>";
        }
    } else {
        $message = "<p style='color:red'>Only image files are allowed (JPG, PNG, GIF)</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload and Display Image</title>
</head>
<body>
    <h2>Upload Image</h2>
    <?= $message ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" accept="image/*" required><br><br>
        <button type="submit">Upload</button>
    </form>

    <?php if (!empty($uploadedImage)): ?>
        <h3>Uploaded Image:</h3>
        <img src="<?= $uploadedImage ?>" width="250" style="border:1px solid #000;">
    <?php endif; ?>
</body>
</html>
