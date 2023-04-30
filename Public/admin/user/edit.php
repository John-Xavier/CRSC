<?php 
require_once('../../../private/initialize.php');
if(!isset($_GET['id'])) {
    redirect_to(url_for('/admin/user/index.php'));
  }
  $id = $_GET['id'];

  if(is_post_request()) {

    // Handle form values sent by create.php
  
    $user = [];
    $user['Id'] = $id;
    $user['user_name'] = $_POST['user_name'] ?? '';
    $user['age'] = $_POST['age'] ?? '';
    $user['role'] = $_POST['role'] ?? '';
    $user['email'] = $_POST['email'] ?? '';
  
    $result = update_user($user);
    if($result === true) {
      redirect_to(url_for('/admin/user/view.php?id=' . $id));
    } else {
      $errors = $result;
    }
  
  } else {
  
    $user = find_user_by_id($id);
  
  }
  
  $user_set = find_all_users();
  $user_count = mysqli_num_rows($user_set);
  mysqli_free_result($user_set);
  
  ?>
  
  <?php $page_title = 'Edit User'; ?>
  <?php include(SHARED_PATH . '/header.php'); ?>
  
  <div id="content">
  
    <a class="back-link" href="<?php echo url_for('/admin/user/index.php'); ?>">&laquo; Back to List</a>
  
    <div class="user edit">
      <h1>Edit User</h1>
  
      <?php echo display_errors($errors); ?>
  
      <form action="<?php echo url_for('/admin/user/edit.php?id=' . h(u($id))); ?>" method="post">
        <dl>
          <dt>User Name</dt>
          <dd><input type="text" name="user_name" value="<?php echo h($user['user_name']); ?>" /></dd>
        </dl>
        <dl>
          <dt>email</dt>
          <dd><input type="text" name="email" value="<?php echo h($user['email']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Age</dt>
          <dd><input type="text" name="age" value="<?php echo h($user['age']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Role</dt>
          <dd><input type="text" name="role" value="<?php echo h($user['role']); ?>" /></dd>
        </dl>
        <div id="operations">
          <input type="submit" value="Edit User" />
        </div>
      </form>
  
    </div>
  
  </div>
  
  <?php include(SHARED_PATH . '/footer.php'); ?>
