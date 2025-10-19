<?php
session_start();

if(isset($_POST['name'])){
    $_SESSION['name'] = $_POST['name'];
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : "Student";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personalized Greeting</title>
</head>
<body>
    <h2>Personalized Greeting</h2>
    <p>Hello, <?php echo htmlspecialchars($name); ?>! Welcome to the PHP </p>
    
    <form method="POST">
        Enter your name: <input type="text" name="name" required>
        <button type="submit">Set Name</button>
    </form>
    
    <form method="POST">
        <button type="submit" name="reset" value="1">Reset Name</button>
    </form>

    <?php
    if(isset($_POST['reset'])){
        unset($_SESSION['name']);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    ?>
</body>
</html>
