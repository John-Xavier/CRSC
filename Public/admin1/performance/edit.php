<?php 
require_once('../../../private/initialize.php');
if(!isset($_GET['id'])) {
    redirect_to(url_for('/admin/performance/index.php'));
  }
  $id = $_GET['id'];

  if(is_post_request()) {

    // Handle form values sent by create.php
    $performance = [];
    $performance['Id'] = $id;
    $performance['user_id'] = $_POST['user_id'] ?? '';
    $performance['backstroke'] = $_POST['backstroke'] ?? '';
    $performance['breaststroke'] = $_POST['breaststroke'] ?? '';
    $performance['butterfly'] = $_POST['butterfly'] ?? '';
    $performance['sidestroke'] = $_POST['sidestroke'] ?? '';
    $performance['week'] = $_POST['week'] ?? '';
    $result = update_performance($performance);
    if($result === true) {
      redirect_to(url_for('/admin/performance/view.php?id=' . $id));
    } else {
      $errors = $result;
      //var_dump($errors);
    }
  
  } else {
  
    $performance = find_performance_by_id($id);
  
  }
  $performance_set = find_all_performance();
  $performance_count = mysqli_num_rows($performance_set);
  mysqli_free_result($performance_set);
  ?>
  <?php $page_title = 'Edit performance'; ?>
  <?php include(SHARED_PATH . '/header.php'); ?>
  <div id="content">
  
    <a class="back-link" href="<?php echo url_for('/admin/performance/index.php'); ?>">&laquo; Back to List</a>
  
    <div class="gala edit">
      <h1>Edit Performance</h1>
      <?php echo display_errors($errors); ?>
  
      <form action="<?php echo url_for('/admin/performance/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
          <dt>Id</dt>
          <dd><input type="text" name="Id" value="<?php echo h($performance['Id']); ?>" /></dd>
        </dl>
        <dl>
          <dt>User Id</dt>
          <dd><input type="text" name="gala_name" value="<?php echo h($performance['user_id']); ?>" /></dd>
        </dl>
        <dl>
          <dt>BackStroke</dt>
          <dd><input type="text" name="date" value="<?php echo h($performance['backstroke']); ?>" /></dd>
        </dl>
        <dl>
          <dt>BreastStroke</dt>
          <dd><input type="text" name="Id" value="<?php echo h($performance['breaststroke']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Butterfly</dt>
          <dd><input type="text" name="gala_name" value="<?php echo h($performance['butterfly']); ?>" /></dd>
        </dl>
        <dl>
          <dt>SideStroke</dt>
          <dd><input type="text" name="date" value="<?php echo h($performance['sidestroke']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Week</dt>
          <dd><input type="text" name="date" value="<?php echo h($performance['week']); ?>" /></dd>
        </dl>
        <div id="operations">
          <input type="submit" value="Edit Performance" />
        </div>
      </form>
  
    </div>
  
  </div>
  
  <?php include(SHARED_PATH . '/footer.php'); ?>
