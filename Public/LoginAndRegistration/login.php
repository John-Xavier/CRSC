<?php
require_once('../../../private/initialize.php');
session_start(); 
if(isset($_POST['submit'])){

    $username = $_POST['email'];
    $password = $_POST['password'];

    $credentials = [];
    $credentials['full_name'] = $_POST['full_name'] ?? '';
    $credentials['email'] = $_POST['email'] ?? '';

    if(empty($username) || empty($password)){
        $error = "Please enter both username and password";
    } else {

        $user = user_login($credentials);
        $_SESSION['user'] = $user;
        redirect_to(url_for('dashboard.php'))

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>



