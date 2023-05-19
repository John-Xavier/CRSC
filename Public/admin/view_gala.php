<?php
            require_once('../../private/initialize.php');
            session_start();
            $user = $_SESSION['user'];

            if(isset($user)){

            }else{
                echo('session is not set');
            }
$gala_id = $_GET['id'];
$gala = find_gala_by_id($gala_id);


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
            <h5><b><i class="fa fa-user"></i>Gala Details</b></h5>
        </header>



    <div class="w3-container">
        <div class="w3-container w3-cell w3-padding w3-cell-middle">
    <h1> <?php echo h($gala['gala_name']); ?></h1>

        </div>
    <div class="w3-container w3-cell w3-padding w3-cell-middle">
    </div>
    </div>
    <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-twothird">
        <table class="w3-table-all">
        <tr>
        <th>Description</th>
        <td><?php echo h($gala['description']); ?></td>
        </tr>
        <tr>
        <th>Date</th>
        <td><?php echo h($gala['date']); ?></td>
        </tr>
        <tr>
        <th>From</th>
        <td><?php echo h($gala['time_from']); ?></td>
        </tr>
        <tr>
        <th>To</th>
        <td><?php echo h($gala['time_to']); ?></td>
        </tr>
        </table>
        </div>
        </div>
        </div>
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




            
        
