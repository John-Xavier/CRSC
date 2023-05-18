<?php
        require_once('../../private/initialize.php');
        session_start();
        $user = $_SESSION['user'];
        if(isset($user)){

        }else{
            echo('session is not set');
        }
        if (isset($_GET['id'])){
            $gala_id = $_GET['id'];
        }
      

          if(is_post_request()) {
       
            // Handle form values sent by edit_profile.php
            $user = $_SESSION['user'];
            $gala = [];
            $gala['Id'] = $_POST['Id'];
            $gala['gala_name'] = $_POST['gala_name'] ?? '';
            $gala['description'] = $_POST['description'] ?? '';
            $gala['date'] = $_POST['date'] ?? '';
            $gala['time_from'] = $_POST['time_from'] ?? '';
            $gala['time_to'] = $_POST['time_to'] ?? '';
            $result = update_gala($gala);
            
            if($result === true) {
              
              redirect_to(url_for('/admin/view_gala.php?id=' . $gala['Id']));
            } else {
              $errors = $result;
              echo 'Errors';
            }
          
          } else {
          
           $gala = find_gala_by_id($gala_id);
          
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
   <!-- <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right">CRSC</span>
    </div> -->

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s8 w3-bar">
        <span>Welcome, <strong><?php echo $user['full_name'];?></strong></span><br>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="<?php echo url_for("admin/performance.php");?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard"></i>  Performance</a>
    <a href="<?php echo url_for("admin/users.php");?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Users</a>
    <a href="<?php echo url_for("admin/galas.php");?>" class="w3-bar-item w3-button w3-padding  w3-teal"><i class="fa fa-solid fa-trophy"></i></i>  Galas</a>
  </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-user"></i> Edit Gala</b></h5>
    </header>



<div class="w3-container w3-padding">
<form action="<?php echo url_for('/admin/edit_gala.php'); ?>" method="post">
    <div class="w3-padding">
<label>Gala Name</label>
<input class="w3-input" name="gala_name" value="<?php echo h($gala['gala_name']); ?>" type="text">
</div>
<div class="w3-padding">

<label>Description</label>
<input class="w3-input" name="description" value="<?php echo h($gala['description']); ?>" type="text">
</div>
<div class="w3-padding">

<label>Date</label>
<input class="w3-input" name="date" value="<?php echo h($gala['date']); ?>" type="text">
</div>
<div class="w3-padding">

<label>From</label>
<input class="w3-input" name="time_from" value="<?php echo h($gala['time_from']); ?>" type="text">
</div>
<div class="w3-padding">

<label>To</label>
<input class="w3-input" name="time_to" value="<?php echo h($gala['time_to']); ?>" type="text">
</div>
<div class="w3-padding">
<input type="hidden" name="Id" value="<?php echo h($gala['Id']); ?>" />

<input class="w3-btn w3-teal" type="submit" value="Submit"/>
</form>
</div>
    

    
    <div class="w3-container w3-dark-grey w3-padding-32">
        <div class="w3-row">
        <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-green">Demographic</h5>
            <p>Language</p>
            <p>Country</p>
            <p>City</p>
        </div>
        <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-red">System</h5>
            <p>Browser</p>
            <p>OS</p>
            <p>More</p>
        </div>
        <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-orange">Target</h5>
            <p>Users</p>
            <p>Active</p>
            <p>Geo</p>
            <p>Interests</p>
        </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
        <h4>FOOTER</h4>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
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




        
    
