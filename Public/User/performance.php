<?php
    require_once('../../private/initialize.php');
    session_start();
    $user = $_SESSION['user'];

    if(isset($user)){

    }else{
        echo('session is not set');
    }
$user_id = $user['Id'];
$week = '1';
$compare_active = false;
    if(is_post_request()) {
        $week = $_POST['week'];
        $user_id = $_POST['user_id'];
        
      $performance = find_performance_by_user_id_and_week($user_id,$week);
      if (!isset($performance)){
        echo 'no performance data available';
      }
      if (isset($_POST['compare_id'])){
        $compare_id = $_POST['compare_id'];
        $performance_compare = find_performance_by_user_id_and_week($compare_id,$week);
        if(isset($performance_compare['Id'])){
          $compare_active = true;
echo 'compare active';
        }else{
          $compare_active = false;
        }
      }


  }else{

      $performance = find_performance_by_user_id_and_week($user_id,$week);
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
      <span>Welcome, <strong><?php echo $user['full_name'];?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="<?php echo url_for("user/performance.php?id=".$user['Id']);?>" class="w3-bar-item w3-button w3-padding w3-teal"><i class="fa fa-dashboard fa-fw"></i>  Performance</a>
        <a href="<?php echo url_for("user/profile.php?id=".$user['Id']);?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Profile</a>
        <a href="<?php echo url_for("user/galas.php?id=".$user['Id']);?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-trophy fa-fw"></i>  All Galas</a>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Performance</b></h5>
  </header>
  
  <div class="w3-container">
  <form action="<?php echo url_for('/user/performance.php');?>" method="post">
  <div class="w3-container w3-cell w3-cell-middle  w3-padding">
  <select class="w3-select" name="week">
  <option value="1">Week 1</option>
  <option value="2">Week 2</option>
  <option value="3">Week 3</option>
  <option value="4">Week 4</option>
  <option value="5">Week 5</option>
  <option value="6">Week 6</option>
  <option value="7">Week 7</option>
  <option value="8">Week 8</option>
  <option value="9">Week 9</option>
  <option value="10">Week 10</option>
    </select>
    </div>
    <input type="hidden" name="user_id" value="<?php echo h($user_id); ?>" />

    <div class="w3-container w3-cell w3-cell-middle  w3-padding">
    <input class="w3-btn w3-teal" type="submit" value="Go"/>
    </div>

     </form>
     </div>
     <div class = "w3-container w3-padding">
  <h2>Week <?php echo $week ?> Performance</h2>
</div>

<div class="w3-panel">
<div class="w3-row-padding" style="margin:0 -16px">
<div class="w3-twothird">
<table class="w3-table-all">
  <?php if(isset($performance['full_name'])){?>
<tr>
  <th>User Name</th>
  <td><?php echo h($performance['full_name']); ?></td>

</tr>
<tr>
  <th>BackStroke</th>
  <td><?php echo h($performance['backstroke']); ?></td>
</tr>
<tr>
  <th>Breaststroke</th>
  <td><?php echo h($performance['breaststroke']); ?></td>
</tr>
<tr>
  <th>Butterfly</th>
  <td><?php echo h($performance['butterfly']); ?></td>
</tr>
<tr>
  <th>Sidestroke</th>
  <td><?php echo h($performance['sidestroke']); ?></td>
</tr>
<?php }else{
  ?>
  <tr>
  <th>No Data to display</th>
</tr>
 
  <?php
}?>
</table>
</div>
</div>
</div>
<div class="w3-container w3-padding">
<a href="<?php echo url_for("user/compare.php?id=".$user['Id']);?>" class="w3-button w3-teal">Compare</a>

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




       
   
