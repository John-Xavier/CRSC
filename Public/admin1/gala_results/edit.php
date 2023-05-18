<?php 
require_once('../../../private/initialize.php');
if(!isset($_GET['id'])) {
    redirect_to(url_for('/admin/gala_results/index.php'));
  }
  $id = $_GET['id'];

  if(is_post_request()) {

    // Handle form values sent by create.php
    $gala_results = [];
    $gala_results['Id'] = $id;
    $gala_results['gala_id'] = $_POST['gala_id'] ?? '';
    $gala_results['user_id'] = $_POST['user_id'] ?? '';
    $gala_results['position'] = $_POST['position'] ?? '';
    $gala_results['stroke'] = $_POST['stroke'] ?? '';
  
    $result = update_gala($gala_results);
    if($result === true) {
      redirect_to(url_for('/admin/gala_results/view.php?id=' . $id));
    } else {
      $errors = $result;
      //var_dump($errors);
    }
  
  } else {
  
    $gala_results = find_results_by_id($id);
  
  }
  
  $gala_results_set = find_all_results();
  $gala_results_count = mysqli_num_rows($gala_results_set);
  mysqli_free_result($gala_results_set);
  
  ?>
  
  <?php $page_title = 'Edit Gala Results'; ?>
  <?php include(SHARED_PATH . '/header.php'); ?>
  
  <div id="content">
  
    <a class="back-link" href="<?php echo url_for('/admin/gala_results/index.php'); ?>">&laquo; Back to List</a>
  
    <div class="gala edit">
      <h1>Edit Gala Results</h1>
      <?php echo display_errors($errors); ?>
  
      <form action="<?php echo url_for('/admin/gala_results/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
          <dt>Id</dt>
          <dd><input type="text" name="Id" value="<?php echo h($gala_results['Id']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Gala Id</dt>
          <dd><input type="text" name="gala_id" value="<?php echo h($gala_results['gala_id']); ?>" /></dd>
        </dl>
        <dl>
          <dt>User Id</dt>
          <dd><input type="text" name="user_id" value="<?php echo h($gala_results['user_id']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Position</dt>
          <dd><input type="text" name="position" value="<?php echo h($gala_results['position']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Stroke</dt>
          <dd><input type="text" name="stroke" value="<?php echo h($gala_results['stroke']); ?>" /></dd>
        </dl>
        <div id="operations">
          <input type="submit" value="Edit Gala Result" />
        </div>
      </form>
  
    </div>
  
  </div>
  
  <?php include(SHARED_PATH . '/footer.php'); ?>
