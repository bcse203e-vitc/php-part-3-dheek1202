<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    if ($username === "admin" && $password === "1234") {
        $_SESSION['user'] = $username;
    } else {
        $error = "Invalid username or password!";
    }
}

if (isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head><title>Welcome</title></head>
    <body>
        <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
        <p>You are logged in successfully using session.</p>
        <a href="?logout=true">Logout</a>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head><title>Login</title></head>
    <body>
        <h2>Login</h2>
        <?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST" action="">
            Username: <input type="text" name="user" required><br><br>
            Password: <input type="password" name="pass" required><br><br>
            <button type="submit">Login</button>
        </form>
    </body>
    </html>
    <?php
}
?>
