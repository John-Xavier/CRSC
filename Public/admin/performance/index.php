<?php require_once('../../../private/initialize.php'); ?>
<?php
    $performance_set = find_all_performance();
    ?>
<?php $page_title = 'Performance';?>
<?php include(SHARED_PATH . '/header.php');?>
<div id="content">
    <div>
    <div class="actions">
        <a href="<?php echo url_for('admin/performance/create.php');?>">Create New Performance</a>
    </div>
<table class="list">
    <tr>
        <th>ID</th>
        <th>User Id</th>
        <th>BackStroke</th>
        <th>BreastStroke</th>
        <th>Butterfly</th>
        <th>SideStroke</th>
        <th>Week</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php while($performance = mysqli_fetch_assoc($performance_set)){?>
        <tr>
            <td>
                <?php echo h($performance['Id']);?>
            </td>
            <td>
                <?php echo h($performance['user_id']);?>
            </td>
            <td>
                <?php echo h($performance['backstroke']);?>
            </td>
            <td>
                <?php echo h($performance['breaststroke']);?>
            </td>
            <td>
                <?php echo h($performance['butterfly']);?>
            </td>
            <td>
                <?php echo h($performance['sidestroke']);?>
            </td>
            <td>
                <?php echo h($performance['week']);?>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/performance/view.php?id=".h(u($performance['Id'])));?>">View</a>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/performance/edit.php?id=".h(u($performance['Id'])));?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo url_for("/admin/performance/delete.php?id=".h(u($performance['Id'])));?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php mysqli_free_result($performance_set);?>
</div>
</div>
<?php include(SHARED_PATH.'/footer.php');?>