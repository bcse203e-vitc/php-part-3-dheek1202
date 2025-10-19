<?php
session_start();
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['captcha'] == $_SESSION['captcha']) {
        $message = "<p style='color:green'> CAPTCHA Verified Successfully!</p>";
    } else {
        $message = "<p style='color:red'> Incorrect CAPTCHA. Try again.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CAPTCHA Demo</title>
</head>
<body>
    <h2>Enter CAPTCHA</h2>
    <?= $message ?>
    <form method="POST">
        <img src="captcha.php" alt="CAPTCHA"><br><br>
        <input type="text" name="captcha" placeholder="Enter CAPTCHA" required><br><br>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
