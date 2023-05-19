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
                  echo $errors[0];
                }
          }
      }
      ?>
      <div class="w3-container">
    
  
    <div class="w3-container w3-card w3-display-middle w3-padding" style="width:400px;">
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
          <label for="fullname">Full Name:</label>
          <input class="w3-input" type="text" name="full_name" required>
        </dl>
        <dl>
          <label for="age">Age:</label>
          <input class="w3-input" type="text" name="age" required>
        </dl><dl>
          <label for="phone">Phone:</label>
          <input class="w3-input" type="text" name="phone" required>
        </dl>
        <dl>
          <label for="email">Email:</label></dt>
          <input class="w3-input" type="email" name="email" required>
        </dl><dl>
          <label for="password">Password:</label>
          <input class="w3-input" type="password" name="password" required>
        </dl>
        <dl>
          <input class="w3-check" type="checkbox" id="parent" name="role" value="parent">
          <label for="parent"> I am a Parent</label>
        </dl>
        <div class="w3-padding w3-cell">
          <input class="w3-btn w3-teal" type="submit" name="submit" value="Register">
      </div>
      <div class="w3-padding w3-cell">
     
          <a class="w3-btn" href="<?php echo url_for("/loginandregistration/login.php");?>">Login</a>
       
      </div>
      </form>
      <dl>
          <dt></dt>
        
        </dl>
    </div>
      
    </div>
      
      </div>
     
  </body>
  </html>
  <?php
  db_disconnect($db);
  ?>