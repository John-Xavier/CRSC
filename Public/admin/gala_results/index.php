<?php require_once('../../../private/initialize.php'); ?>
<?php
    $gala_set = find_all_results();
    ?>
<?php $page_title = 'Gala Results';?>
<?php include(SHARED_PATH . '/header.php');?>
<div id="content">
    <div>
    <div class="actions">
        <a href="<?php echo url_for('admin/gala_results/create.php');?>">Create New Gala Result</a>
    </div>
   
<table class="list">
    <tr>
        <th>ID</th>
        <th>Gala Id</th>
        <th>User Id</th>
        <th>Position</th>
        <th>Stroke</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php while($gala = mysqli_fetch_assoc($gala_set)){?>
        <tr>
            <td>
                <?php echo h($gala['Id']);?>
            </td>
            <td>
                <?php echo h($gala['gala_id']);?>
            </td>
            <td>
                <?php echo h($gala['user_id']);?>
            </td>
            <td>
                <?php echo h($gala['position']);?>
            </td>
            <td>
                <?php echo h($gala['stroke']);?>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/gala_results/view.php?id=".h(u($gala['Id'])));?>">View</a>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/gala_results/edit.php?id=".h(u($gala['Id'])));?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/gala_results/delete.php?id=".h(u($gala['Id'])));?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php mysqli_free_result($gala_set);?>
</div>
</div>
<?php include(SHARED_PATH.'/footer.php');?>