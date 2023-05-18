<?php require_once('../../../private/initialize.php'); 
if(!isset($_GET['id'])){
    redirect_to(url_for('/admin/gala_results/index.php'));
}
$id = $_GET['id'];
if(is_post_request()){
    $result = delete_results($id);
    redirect_to(url_for('/admin/gala_results/index.php'));
} else {
    $gala_results = find_results_by_id($id);
}

?>
<?php $page_title = 'Delete Gala Result';?>
<?php include(SHARED_PATH.'/header.php');?>

<div id="content">
    <a class = "black-link" href="<?php echo url_for('/admin/gala_results/index.php'); ?>">&laquo; Back to List</a>
    <div>
        <h1>Delete Gala Results</h1>
        <p>Are you sure you want to delete this Result?</p>
        <p class="item"><?php echo h($gala_results['Id']);?></p>
        <form action="<?php echo url_for('/admin/gala_results/delete.php?id=' . h(u($gala_results['Id']))); ?>" method="post">
    <div id="operations">
        <input type="submit" name="commit" value="Delete Gala Result"/>
</div>
    </form>
    </div>
</div>
<?php include(SHARED_PATH.'footer.php');?>