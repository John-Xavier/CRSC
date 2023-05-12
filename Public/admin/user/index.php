<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Users';?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php $user_set = find_all_users(); ?>
<div id="content">
    <div>
        <div class="actions">
         <a href="<?php echo url_for('admin/user/create.php');?>">Create New User</a>
        </div> 
        <table class="list">
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>age</th>
                <th>role</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            <?php while($user = mysqli_fetch_assoc($user_set)){?>
                <tr>
                    <td>
                        <?php echo h($user['Id']);?>
                    </td>
                    <td>
                        <?php echo h($user['full_name']);?>
                    </td>
                    <td>
                        <?php echo h($user['email']);?>
                    </td>
                    <td>
                        <?php echo h($user['age']);?>
                    </td>
                    <td>
                        <?php echo h($user['role']);?>
                    </td>
                    <td>
                        <a href="<?php echo url_for("/admin/user/view.php?id=".h(u($user['Id'])));?>">View</a>
                    </td>
                    <td>
                        <a href="<?php echo url_for("/admin/user/edit.php?id=".h(u($user['Id'])));?>">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo url_for("/admin/user/delete.php?id=".h(u($user['Id'])));?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php mysqli_free_result($user_set);?>
    </div>
</div>
<?php include(SHARED_PATH.'/footer.php');?>