<?php
require_once('../../../private/initialize.php');
if(is_post_request()) {
    $gala_results = [];
    $gala_results['gala_id'] = $_POST['gala_id'] ?? '';
    $gala_results['user_id'] = $_POST['user_id'] ?? '';
    $gala_results['position'] = $_POST['position'] ?? '';
    $gala_results['stroke'] = $_POST['stroke'] ?? '';

    $result = insert_results($gala_results);
    if($result === true) {
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('/admin/gala_results/view.php?id=' . $new_id));
    } else {
      $errors = $result;
    }
  } else {
    // display the blank form
    $gala_results = [];
    $gala_results["gala_id"] = '';
    $gala_results["user_id"] = '';
    $gala_results["position"] = '';
    $gala_results["stroke"] = '';
  }
?>
<?php $page_title = 'Create Gala';?>
<?php $strokes = array('Backstroke','Breaststroke','Butterfly','Sidestroke')?>
<?php include(SHARED_PATH . '/header.php');?>

<div id="content">
    <div>
        <h1>
            Create Gala
        </h1>
        <?php echo display_errors($errors);?>
        <form action="<?php echo url_for('/admin/gala_results/create.php');?>" method="post">
            <dl>
                <dt>
                    Gala Id
                </dt>
                <dd>
                    <input type="text" name="gala_id"value="<?php echo h($gala_results['gala_id']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    User Id
                </dt>
                <dd>
                    <input type="text" name="user_id"value="<?php echo h($gala_results['user_id']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    Position
                </dt>
                <dd>
                    <input type="text" name="position"value="<?php echo h($gala_results['position']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    Stroke
                </dt>
                <dd>
                    <select name="stroke">
                    <?php
                    foreach($strokes as $key => $value):
                        echo '<option value="'.$value.'">'.$value.'</option>';
                    endforeach;
                    ?>
                    </select>
                </dd>
            </dl>
            <div>
                <input type="submit" value="Create Gala Results"/>
            </div>


        </form>
    </div>

</div>
<?php include(SHARED_PATH.'/footer.php');?>