<?php
require_once('../../private/initialize.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){  
        $full_name = $_POST['full_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
  
        if(empty($full_name) || empty($password) || empty($email)){
            $error = "Please enter all required fields";
        } else {
            $user = [];
            $user['full_name'] = $_POST['full_name'] ?? '';
            $user['email'] = $_POST['email'] ?? '';
            $user['age'] = $_POST['age'] ?? '';
            $user['role'] = $_POST['role'] ?? 'swimmer';
            $user['phone'] = $_POST['phone'] ?? '';
            $user['password'] = $_POST['password'] ?? '';
        
            $result = insert_user($user);
            if($result === true) {
                $new_id = mysqli_insert_id($db);
                redirect_to(url_for('/loginandregistration/login.php?reg=s'));
              } else {
                $errors = $result;
              }
        }
    }
    ?>
    <h1>Registration Form</h1>
    <?php if(isset($error)){ ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <?php if(isset($message)){ ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php } ?>
    <form method="post" action="">
    <label for="fullname">Full Name:</label>
        <input type="text" name="full_name" required><br>
        <label for="age">Age:</label>
        <input type="text" name="age" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>