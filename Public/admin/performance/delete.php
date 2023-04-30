<?php require_once('../../../private/initialize.php'); 
if(!isset($_GET['id'])){
    redirect_to(url_for('/admin/performance/index.php'));
}
$id = $_GET['id'];
if(is_post_request()){
    $result = delete_performance($id);
    redirect_to(url_for('/admin/performance/index.php'));
} else {
    $performance = find_performance_by_id($id);
}

?>
<?php $page_title = 'Delete Performance';?>
<?php include(SHARED_PATH.'/header.php');?>

<div id="content">
    <a class = "black-link" href="<?php echo url_for('/admin/performance/index.php'); ?>">&laquo; Back to List</a>
    <div>
        <h1>Delete performance</h1>
        <p>Are you sure you want to delete this performance?</p>
        <p class="item"><?php echo h($performance['Id']);?></p>
        <form action="<?php echo url_for('/admin/performance/delete.php?id=' . h(u($performance['Id']))); ?>" method="post">
    <div id="operations">
        <input type="submit" name="commit" value="Delete Performance"/>
</div>
    </form>
    </div>
</div>
<?php include(SHARED_PATH.'footer.php');?>