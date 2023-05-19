<?php
        require_once('../../private/initialize.php');
        session_start();
        $session_user = $_SESSION['user'];
       $user_id = $_GET['id'];
       $user = find_user_by_id($user_id);
        
        
          if(is_post_request()) {
       
            // Handle form values sent by edit_profile.php
            $session_user = $_SESSION['user'];
            $user = [];
            $user['Id'] = $_POST['Id'];
            $user['full_name'] = $_POST['full_name'] ?? '';
            $user['age'] = $_POST['age'] ?? '';
            $user['role'] = $_POST['role'] ?? 'swimmer';
            $user['email'] = $_POST['email'] ?? '';
            $user['phone'] = $_POST['phone'] ?? '';
            $user['password'] = $_POST['password'] ?? '';
            $result = update_user($user);
            if($result === true) {
              redirect_to(url_for('/parent/children.php'));
            } else {
              $errors = $result;
            }
          
          } else {
          
           // $user = find_user_by_id($id);
          
          }
          
          
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Dashboard</title>
            <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-left">CRSC</span>
    <span class="w3-bar-item w3-right"><a href="<?php echo url_for("/loginandregistration/login.php");?>" class="w3-btn">  Logout</a>
</span>
    </div>
    <div class="w3-panel w3-black">
</div> 

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s8 w3-bar">
        <span>Welcome, <strong><?php echo  $session_user['full_name'];?></strong></span><br>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="<?php echo url_for("parent/performance.php");?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard"></i>  Performance</a>
    <a href="<?php echo url_for("parent/children.php");?>" class="w3-bar-item w3-button w3-padding w3-teal"><i class="fa fa-users fa-fw"></i>  Children</a>
    <a href="<?php echo url_for("parent/galas.php");?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-solid fa-trophy"></i></i>  Galas</a>
  </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-user"></i> Edit User</b></h5>
    </header>



<div class="w3-container w3-padding">
<form action="<?php echo url_for('/parent/edit_child.php?id=' . $user['Id']); ?>" method="post">
    <div class="w3-padding">
<label>Full Name</label>
<input class="w3-input" name="full_name" value="<?php echo h($user['full_name']); ?>" type="text">
</div>
<div class="w3-padding">

<label>Age</label>
<input class="w3-input" name="age" value="<?php echo h($user['age']); ?>" type="text">
</div>
<div class="w3-padding">

<label>Phone</label>
<input class="w3-input" name="phone" value="<?php echo h($user['phone']); ?>" type="text">
</div>
<div class="w3-padding">
<label>Email</label>
<input class="w3-input" name="email" value="<?php echo h($user['email']); ?>" type="text">
</div>
<input type="hidden" name="Id" value="<?php echo h($user['Id']); ?>" />

<div class="w3-padding">

<input class="w3-btn w3-teal" type="submit" value="Submit"/>
</form>
</div>
    

<div class="w3-container w3-dark-grey w3-padding-32">
       
       </div>
   
       <!-- Footer -->
       <footer class="w3-container w3-padding-16 w3-light-grey">
           <p>Copyrights Reserved College Road Swimming Club 2023</p>
       </footer>
    <!-- End page content -->
    </div>

    <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
    }

    // Close the sidebar with the close button
    function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
    }
    </script>

    </body>
    </html>




        
    
