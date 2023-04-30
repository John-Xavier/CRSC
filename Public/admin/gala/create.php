<?php
require_once('../../../private/initialize.php');
if(is_post_request()) {

    $gala = [];
    $gala['gala_name'] = $_POST['gala_name'] ?? '';
    $gala['date'] = $_POST['date'] ?? '';

    $result = insert_gala($gala);
    if($result === true) {
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('/staff/galas/view.php?id=' . $new_id));
    } else {
      $errors = $result;
    }
  
  } else {
    // display the blank form
    $gala = [];
    $gala["gala_name"] = '';
    $gala["date"] = '';
  }
?>
<?php $page_title = 'Create Gala';?>
<?php include(SHARED_PATH . '/header.php');?>

<div id="content">
    <div>
        <h1>
            Create Gala
        </h1>
        <?php echo display_errors($errors);?>

        <form action="<?php echo url_for('/admin/gala/create.php');?>" method="post">
            <dl>
                <dt>
                    Gala Name
                </dt>
                <dd>
                    <input type="text" name="gala_name"value="<?php echo h($gala['gala_name']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    Date
                </dt>
                <dd>
                    <input type="text" name="date"value="<?php echo h($gala['date']);?>"/>
                </dd>                 
            </dl>
            <div>
                <input type="submit" value="Create Gala"/>
            </div>


        </form>
    </div>

</div>
<?php include(SHARED_PATH.'/footer.php');?>