<?php require_once('../../../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; 

$gala_results = find_results_by_id($id);

?>

<?php $page_title = 'Show Gala Results'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/gala_results/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>Gala Result: <?php echo h($gala_results['Id']); ?></h1>
    <div class="attributes">
      <dl>

      <dl>
        <dt>Gala Name</dt>
        <dd><?php echo h($gala_results['gala_name']); ?></dd>
      </dl>
      <dl>
        <dt>User Name</dt>
        <dd><?php echo h($gala_results['full_name']); ?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><?php echo h($gala_results['position']); ?></dd>
      </dl>
      <dl>
        <dt>Stroke</dt>
        <dd><?php echo h($gala_results['stroke']); ?></dd>
      </dl>
    </div>

  </div>

</div>
