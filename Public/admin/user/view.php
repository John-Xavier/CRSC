<?php require_once('../../../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; 

$user = find_user_by_id($id);

?>

<?php $page_title = 'Show User'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/user/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>User: <?php echo h($user['full_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Name</dt>
        <dd><?php echo h($user['full_name']); ?></dd>
      </dl>
      <dl>
        <dt>Phone</dt>
        <dd><?php echo h($user['phone']); ?></dd>
      </dl>
      <dl>
        <dt>email</dt>
        <dd><?php echo h($user['email']); ?></dd>
      </dl>
      <dl>
        <dt>Age</dt>
        <dd><?php echo h($user['age']); ?></dd>
      </dl>
      <dl>
        <dt>Role</dt>
        <dd><?php echo h($user['role']); ?></dd>
      </dl>
    </div>

  </div>

</div>
