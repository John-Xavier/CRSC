<?php
require_once('../../private/initialize.php');?>
<!doctype html>
<html lang='en'>
    <head>
        <title>Register</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="w3-container">
   
 
  <div class="w3-container w3-card w3-display-middle w3-padding" style="width:300px;">
  <div class="w3-container w3-teal">
  <h5>CRSC Registration Form</h5>
  </div>

    <?php if(isset($error)){ ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <?php if(isset($message)){ ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php } ?>
  <form method="post" action="">
    <dl>
        <dt><label for="fullname">Full Name:</label></dt>
        <dd> <input class="w3-input" type="text" name="full_name" required></dd>
      </dl>
      <dl>
        <dt><label for="age">Age:</label></dt>
        <dd> <input class="w3-input" type="text" name="age" required></dd>
      </dl><dl>
        <dt> <label for="phone">Phone:</label></dt>
        <dd><input class="w3-input" type="text" name="phone" required></dd>
      </dl>
      <dl>
        <dt><label for="email">Email:</label></dt>
        <dd><input class="w3-input" type="email" name="email" required></dd>
      </dl><dl>
        <dt><label for="password">Password:</label></dt>
        <dd><input class="w3-input" type="password" name="password" required></dd>
      </dl>
        <input class="w3-btn w3-teal" type="submit" name="submit" value="Register">
    </form>
    <dl>
        <dt><a href="<?php echo url_for("/loginandregistration/login.php");?>">Login</a></dt>
      
      </dl>
  </div>
    
  </div>
    
    </div>
    <footer>
  
</footer>
</body>
</html>
<?php
db_disconnect($db);
?>