<?php
require_once('../../../private/initialize.php');
if(is_post_request()) {
  
    $gala = [];
    $gala['gala_name'] = $_POST['gala_name'] ?? '';
    $gala['description'] = $_POST['description'] ?? '';
    $gala['date'] = $_POST['date'] ?? '';
    $gala['time_to'] = $_POST['time_to'] ?? '';
    $gala['time_from'] = $_POST['time_from'] ?? '';


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
    $gala["description"] = '';
    $gala["date"] = '';
    $gala["time_to"] = '';
    $gala["time_from"] = '';
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
                    Gala Description
                </dt>
                <dd>
                    <input type="textarea" name="description"value="<?php echo h($gala['description']);?>" rows="4" cols="50"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    Gala Date
                </dt>
                <dd>
                    <input type="text" name="date"value="<?php echo h($gala['date']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    From Time
                </dt>
                <dd>
                    <input type="text" name="time_from"value="<?php echo h($gala['time_from']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    To Time
                </dt>
                <dd>
                    <input type="text" name="time_to"value="<?php echo h($gala['time_to']);?>"/>
                </dd>                 
            </dl>
            <div>
                <input type="submit" value="Create Gala"/>
            </div>


        </form>
    </div>

</div>
<?php include(SHARED_PATH.'/footer.php');?>