<?php require_once('../../../private/initialize.php'); 
if(!isset($_GET['id'])){
    redirect_to(url_for('/admin/user/index.php'));
}
$id = $_GET['id'];
if(is_post_request()){
    $result = delete_user($id);
    redirect_to(url_for('/admin/user/index.php'));
} else {
    $user = find_user_by_id($id);
}

?>
<?php $page_title = 'Delete User';?>
<?php include(SHARED_PATH.'/header.php');?>

<div id="content">
    <a class = "black-link" href="<?php echo url_for('/admin/user/index.php'); ?>">&laquo; Back to List</a>
    <div>
        <h1>Delete User</h1>
        <p>Are you sure you want to delete this user?</p>
        <p class="item"><?php echo h($user['user_name']);?></p>
        <form action="<?php echo url_for('/admin/user/delete.php?id=' . h(u($user['Id']))); ?>" method="post">
    <div id="operations">
        <input type="submit" name="commit" value="Delete User"/>
</div>
    </form>
    </div>
</div>
<?php include(SHARED_PATH.'footer.php');?>