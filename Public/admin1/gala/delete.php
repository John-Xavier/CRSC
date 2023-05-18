<?php require_once('../../../private/initialize.php'); 
if(!isset($_GET['id'])){
    redirect_to(url_for('/admin/gala/index.php'));
}
$id = $_GET['id'];
if(is_post_request()){
    $result = delete_gala($id);
    redirect_to(url_for('/admin/gala/index.php'));
} else {
    $gala = find_gala_by_id($id);
}

?>
<?php $page_title = 'Delete Gala';?>
<?php include(SHARED_PATH.'/header.php');?>

<div id="content">
    <a class = "black-link" href="<?php echo url_for('/admin/gala/index.php'); ?>">&laquo; Back to List</a>
    <div>
        <h1>Delete Gala</h1>
        <p>Are you sure you want to delete this gala?</p>
        <p class="item"><?php echo h($gala['gala_name']);?></p>
        <form action="<?php echo url_for('/admin/gala/delete.php?id=' . h(u($gala['Id']))); ?>" method="post">
    <div id="operations">
        <input type="submit" name="commit" value="Delete Gala"/>
</div>
    </form>
    </div>
</div>
<?php include(SHARED_PATH.'footer.php');?>