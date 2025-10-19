<?php
$status = '';
if(isset($_POST['send'])){
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $status = "Mail Sent Successfully!<br><br>
               From: $email<br>
               Message:<br>
               <pre>$message</pre>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <?php if($status) echo "<p>$status</p>"; ?>
    <form method="POST">
        Your Email: <input type="email" name="email" required><br><br>
        Message:<br>
        <textarea name="message" rows="5" cols="40" required></textarea><br><br>
        <button type="submit" name="send">Send Message</button>
    </form>
</body>
</html>
