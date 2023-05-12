<?php 
require_once('../../../private/initialize.php');
if(!isset($_GET['id'])) {
    redirect_to(url_for('/admin/gala/index.php'));
  }
  $id = $_GET['id'];

  if(is_post_request()) {

    // Handle form values sent by create.php

    $gala = [];
    $gala['Id'] = $id;
    $gala['gala_name'] = $_POST['gala_name'] ?? '';
    $gala['description'] = $_POST['description'] ?? '';
    $gala['date'] = $_POST['date'] ?? '';
    $gala['time_to'] = $_POST['time_to'] ?? '';
    $gala['time_from'] = $_POST['time_from'] ?? '';
  
    $result = update_gala($gala);
    if($result === true) {
      redirect_to(url_for('/admin/gala/view.php?id=' . $id));
    } else {
      $errors = $result;
      //var_dump($errors);
    }
  
  } else {
  
    $gala = find_gala_by_id($id);
  
  }
  
  $gala_set = find_all_galas();
  $gala_count = mysqli_num_rows($gala_set);
  mysqli_free_result($gala_set);
  
  ?>
  
  <?php $page_title = 'Edit Gala'; ?>
  <?php include(SHARED_PATH . '/header.php'); ?>
  
  <div id="content">
  
    <a class="back-link" href="<?php echo url_for('/admin/gala/index.php'); ?>">&laquo; Back to List</a>
  
    <div class="gala edit">
      <h1>Edit Gala</h1>
  
      <?php echo display_errors($errors); ?>
  
      <form action="<?php echo url_for('/admin/gala/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
          <dt>Id</dt>
          <dd><input type="text" name="Id" value="<?php echo h($gala['Id']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Gala Name</dt>
          <dd><input type="text" name="gala_name" value="<?php echo h($gala['gala_name']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Description</dt>
          <dd><input type="textarea" name="description" value="<?php echo h($gala['description']); ?>" rows="4" cols="50"/></dd>
        </dl>
        <dl>
          <dt>Date</dt>
          <dd><input type="text" name="date" value="<?php echo h($gala['date']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Time From</dt>
          <dd><input type="text" name="time_from" value="<?php echo h($gala['time_from']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Time To</dt>
          <dd><input type="text" name="time_to" value="<?php echo h($gala['time_to']); ?>" /></dd>
        </dl>
        <div id="operations">
          <input type="submit" value="Edit Gala" />
        </div>
      </form>
  
    </div>
   
  </div>
  
  <?php include(SHARED_PATH . '/footer.php'); ?>
