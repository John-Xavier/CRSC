<?php require_once('../../../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; 

$gala = find_gala_by_id($id);

?>

<?php $page_title = 'Show Gala'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/gala/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>Gala: <?php echo h($gala['gala_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Gala Name</dt>
        <dd><?php echo h($gala['gala_name']); ?></dd>
      </dl>
      <dl>
        <dt>Date</dt>
        <dd><?php echo h($gala['date']); ?></dd>
      </dl>
    </div>

  </div>

</div>
