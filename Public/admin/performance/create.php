<?php
require_once('../../../private/initialize.php');
if(is_post_request()) {

    $performance = [];
    $performance['Id'] = $_POST['Id'] ?? '';
    $performance['user_id'] = $_POST['user_id'] ?? '';
    $performance['backstroke'] = $_POST['backstroke'] ?? '';
    $performance['breaststroke'] = $_POST['breaststroke'] ?? '';
    $performance['butterfly'] = $_POST['butterfly'] ?? '';
    $performance['sidestroke'] = $_POST['sidestroke'] ?? '';
    $performance['week'] = $_POST['week'] ?? '';

    $result = insert_performance($performance);
    if($result === true) {
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('/admin/performance/view.php?id=' . $new_id));
    } else {
      $errors = $result;
    }
  
  } else {
    // display the blank form
    $performance = [];
    $performance["Id"] = '';
    $performance["user_id"] = '';
    $performance["backstroke"] = '';
    $performance["breaststroke"] = '';
    $performance["butterfly"] = '';
    $performance["sidestroke"] = '';
    $performance["week"] = '';
  }
?>
<?php $page_title = 'Create Performance';?>
<?php include(SHARED_PATH . '/header.php');?>

<div id="content">
    <div>
        <h1>
            Create performance
        </h1>
        <?php echo display_errors($errors);?>
        <form action="<?php echo url_for('/admin/performance/create.php');?>" method="post">
            <dl>
                <dt>
                    user_id
                </dt>
                <dd>
                    <input type="text" name="user_id"value="<?php echo h($performance['user_id']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                BackStroke
                </dt>
                <dd>
                    <input type="text" name="backstroke"value="<?php echo h($performance['backstroke']);?>"/>
                </dd>                 
            </dl>
            <dl>
                <dt>
                    BreastStroke
                </dt>
                <dd>
                    <input type="text" name="breaststroke"value="<?php echo h($performance['breaststroke']);?>"/>
                </dd>                 
            </dl>
            <dl>
                <dt>
                    Butterfly
                </dt>
                <dd>
                    <input type="text" name="butterfly"value="<?php echo h($performance['butterfly']);?>"/>
                </dd>                 
            </dl>
            <dl>
                <dt>
                    Sidestroke
                </dt>
                <dd>
                    <input type="text" name="sidestroke"value="<?php echo h($performance['sidestroke']);?>"/>
                </dd>                 
            </dl>
            <dl>
                <dt>
                    Week
                </dt>
                <dd>
                    <input type="text" name="week"value="<?php echo h($performance['week']);?>"/>
                </dd>                 
            </dl>
            <div>
                <input type="submit" value="Create Performance"/>
            </div>
        </form>
    </div>

</div>
<?php include(SHARED_PATH.'/footer.php');?>