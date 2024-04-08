<?php
session_start();

if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header("Location: newemployee.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $dbusername = "jdaisy1";
    $dbpassword = "jdaisy1";
    $dbname = "jdaisy1";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $hashed_password = md5($password);

    $sql = "SELECT * FROM User WHERE username='$username' AND password='$hashed_password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        $_SESSION['authenticated'] = true;
        header("Location: newemployee.php");
        exit;
    } else {
        $error_message = "Invalid username or password. Please try again.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php 
    if(isset($error_message)) {
        echo "<p>$error_message</p>";
        echo "<p><a href='login.php'>Retry Login</a> | <a href='signup.php'>Create Account</a></p>";
    }
    ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
</body>
</html>

