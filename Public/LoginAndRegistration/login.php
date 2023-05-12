<?php
require_once('../../private/initialize.php');
session_start(); 
if(isset($_POST['submit'])){

    $username = $_POST['email'];
    $password = $_POST['password'];

    $credentials = [];
    $credentials['email'] = $_POST['email'] ?? '';
    $credentials['password'] = $_POST['password'] ?? '';

    if(empty($username) || empty($password)){
        $error = "Please enter both username and password";
    } else {

        $user = user_login($credentials);
        $_SESSION["user"] = $user;
        echo('session is set');
        redirect_to(url_for('dashboard.php?reg=s'));
    }
    
}
$message = $_GET['reg'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php if ($message == 's'){?>
        <p style="color: green;"><?php echo 'registration is success'; ?></p>
   <?php }?>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>



