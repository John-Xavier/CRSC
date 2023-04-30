<?php require_once('../../../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; 

$gala = find_user_by_id($id);

?>

<?php $page_title = 'Show User'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/user/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>User: <?php echo h($gala['user_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Name</dt>
        <dd><?php echo h($gala['user_name']); ?></dd>
      </dl>
      <dl>
        <dt>email</dt>
        <dd><?php echo h($gala['email']); ?></dd>
      </dl>
      <dl>
        <dt>Age</dt>
        <dd><?php echo h($gala['age']); ?></dd>
      </dl>
      <dl>
        <dt>Role</dt>
        <dd><?php echo h($gala['role']); ?></dd>
      </dl>
    </div>

  </div>

</div>
