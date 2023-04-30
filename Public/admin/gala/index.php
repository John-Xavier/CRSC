<?php require_once('../../../private/initialize.php'); ?>
<?php
    $gala_set = find_all_galas();
    ?>
<?php $page_title = 'Galas';?>
<?php include(SHARED_PATH . '/header.php');?>
<div id="content">
    <div>
    <div class="actions">
        <a href="<?php echo url_for('admin/gala/create.php');?>">Create New Gala</a>
    </div>
<table class="list">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
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
                <?php echo h($gala['gala_name']);?>
            </td>
            <td>
                <?php echo h($gala['date']);?>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/gala/view.php?id=".h(u($gala['Id'])));?>">View</a>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/gala/edit.php?id=".h(u($gala['Id'])));?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/gala/delete.php?id=".h(u($gala['Id'])));?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php mysqli_free_result($gala_set);?>
</div>
</div>
<?php include(SHARED_PATH.'/footer.php');?>