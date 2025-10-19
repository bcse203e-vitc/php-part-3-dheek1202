<?php
$status = '';

if(isset($_POST['send'])){
    $from = htmlspecialchars($_POST['from']);
    $to = htmlspecialchars($_POST['to']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $attachment = isset($_FILES['attachment']) ? $_FILES['attachment']['name'] : 'No attachment';

    $status = "Mail sent successfully!<br>
               From: $from<br>
               To: $to<br>
               Subject: $subject<br>
               Message: $message<br>
               Attachment: $attachment";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Send</title>
</head>
<body>
    <h2>Send Email</h2>
    <?php if($status) echo "<p>$status</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        From: <input type="email" name="from" required><br><br>
        To: <input type="email" name="to" required><br><br>
        Subject: <input type="text" name="subject" required><br><br>
        Message:<br>
        <textarea name="message" rows="5" cols="40" required></textarea><br><br>
        Attachment: <input type="file" name="attachment"><br><br>
        <button type="submit" name="send">Send Email</button>
    </form>
</body>
</html>
