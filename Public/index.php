<?php require_once('../private/initialize.php'); ?>
<?php include(SHARED_PATH.'/header.php');?>
    <div id="content">
    <div>
    <a href="<?php echo url_for("/loginandregistration/login.php");?>">Logout</a>
    <table class="list">
    <tr>
        <th>Main Menu</th>
    </tr>
    <tr>
            <td>
            <a href="<?php echo url_for("admin/gala/index.php");?>">Galas</a>
            </td>

</tr>
<tr>
            <td>
            <a href="<?php echo url_for("admin/user/index.php");?>">Users</a>
            </td>

</tr>
<tr>
            <td>
            <a href="<?php echo url_for("admin/performance/index.php");?>">Performance</a>
            </td>

</tr>
<tr>
            <td>
            <a href="<?php echo url_for("admin/gala_results/index.php");?>">Gala Results</a>
            </td>

</tr>
</table>
</div>
</div>
<?php include(SHARED_PATH.'/footer.php');?>