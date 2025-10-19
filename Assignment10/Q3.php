<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    setcookie("username", "", time() - 3600); // Delete cookie
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$savedUsername = $_COOKIE['username'] ?? "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $remember = isset($_POST['remember']);

    if ($username === "admin" && $password === "1234") {
        $_SESSION['user'] = $username;

        if ($remember) {
            setcookie("username", $username, time() + (86400 * 7)); // 7 days
        } else {
            setcookie("username", "", time() - 3600); // Remove cookie if unchecked
        }
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
        <p>You are logged in successfully.</p>
        <a href="?logout=true">Logout</a>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head><title>Login with Remember Me</title></head>
    <body>
        <h2>Login</h2>
        <?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST" action="">
            Username: <input type="text" name="user" value="<?php echo htmlspecialchars($savedUsername); ?>" required><br><br>
            Password: <input type="password" name="pass" required><br><br>
            <label><input type="checkbox" name="remember"> Remember Me</label><br><br>
            <button type="submit">Login</button>
        </form>
    </body>
    </html>
    <?php
}
?>
