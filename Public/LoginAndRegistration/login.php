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
        if (isset($user['role'])){
            $userRole = $user['role'];
           
            $_SESSION["user"] = $user;
            echo('session is set, user role =' . $user['role']);
           
    
            if($userRole == 'admin'){
               redirect_to(url_for('admin/performance.php?reg=s'));
            }else if($userRole == 'swimmer'){
                redirect_to(url_for('user/performance.php?reg=s'));
            }elseif($userRole == 'coach'){
    //coach
                redirect_to(url_for('coach/performance.php?reg=s'));
            }else{
                echo 'Invalid User';
            }
        
        } else{
            echo 'error : ' . $user;
        }
        
    }
    
}
$message = "";
if(isset($_GET['reg'])){
$message = $_GET['reg'];
}
?>
<!doctype html>
<html lang='en'>
    <head>
        <title>Login</title>
        <meta charset = "utf-8">
        <!-- <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/styles.css');?>"> -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
   

   
<?php if ($message == 's'){?>
    <div class="w3-container w3-display-top-middle w3-padding w3-green">
        <p><?php echo 'Registration is success'; ?></p>
        </div>
   <?php }?>
   
    
    <div class="w3-card w3-display-middle w3-padding">
    <div class="w3-container w3-teal">
  <h2>College Road Swimming Club</h2>
</div>
<div class="w3-container">

    <form method="post" action="">
    <dl>
        <dd><label for="email">Email:</label></dd>
        <dd><input class="w3-input" type="text" name="email" required><br></dd>
      </dl>
      <dl>
        <dd><label for="password">Password:</label></dd>
        <dd><input class="w3-input" type="password" name="password" required><br></dd>
      </dl>
     
            <div class="w3-container">
            <div class="w3-padding w3-display-middle-bottom">
        <input class="w3-btn w3-teal" type="submit" name="submit" value="Login">
        </div>
        </div>
    
      

    </form>
    </div>
    <dl>
        <dt> <a href="<?php echo url_for("/loginandregistration/register.php");?>">Sign Up</a></dt>
      
      </dl>
   
    </div>
    </div>

</body>
</html>
<?php
db_disconnect($db);
?>

