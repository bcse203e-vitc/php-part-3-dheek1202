<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Student";
}

$name = $_SESSION['user'];
$status = '';

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['feedback'])){
    $feedback = htmlspecialchars($_POST['feedback']);
    $status = "Thank you, $name. Feedback sent successfully!<br><br>
               Feedback Received:<br>
               <pre>$feedback</pre>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Feedback Form</title>
</head>
<body>
    <h2>Student Feedback</h2>
    <p>Hello, <?php echo htmlspecialchars($name); ?>! Please submit your feedback below.</p>
    <?php if($status) echo "<p>$status</p>"; ?>
    <form method="POST">
        <textarea name="feedback" rows="5" cols="50" placeholder="Enter your feedback here..." required></textarea><br><br>
        <button type="submit">Submit Feedback</button>
    </form>
</body>
</html>
