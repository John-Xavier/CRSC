<?php require_once('../../../private/initialize.php'); ?>


<?php

$id = $_GET['id'] ?? '1'; 

$performance = find_performance_by_id($id);

?>
<?php
   $user_set = find_all_users(); 
   $users = mysqli_fetch_assoc($user_set);
?>

<?php $page_title = 'Show Performance'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/performance/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>Performance: <?php echo h($performance['Id']); ?></h1>

    <div class="attributes">
      <table>
        <tr>
          <td>&nbsp;</td>
          <td>
              <dt>
                    Compare
                </dt>
                <dd>
                  <form action="<?php echo url_for('/admin/performance/view.php');?>" method="post">
                  <select name="compare_user_id">
                  <?php while($user = mysqli_fetch_array($user_set)){?>
                 <option value="<?php echo $user['Id']; ?>"><?php echo $user['full_name']; ?></option>
                 <?php } ?>
                  </select>
                  <div id="operations">
                  <input type="submit" value="Go" />
                  </div>
                  </form>
                </dd>
              </td>
              </tr>
              <tr>
          <td>
              <dl>
              <dt>User name</dt>
              <dd><?php echo h($performance['full_name']); ?></dd>
            </dl>
            <dl>
              <dt>BackStroke</dt>
              <dd><?php echo h($performance['backstroke']); ?></dd>
            </dl>
            <dl>
              <dt>Breaststroke</dt>
              <dd><?php echo h($performance['breaststroke']); ?></dd>
            </dl>
            <dl>
              <dt>Butterfly</dt>
              <dd><?php echo h($performance['butterfly']); ?></dd>
            </dl>
            <dl>
              <dt>Sidestroke</dt>
              <dd><?php echo h($performance['sidestroke']); ?></dd>
            </dl>
            <dl>
              <dt>Week</dt>
              <dd><?php echo h($performance['week']); ?></dd>
            </dl>
        </td>
        <td>
        <?php 
              if(is_post_request()) {
                echo $_POST['compare_user_id'];
                $compare_id = $_POST['compare_user_id'] ?? '';
              $user_to_compare = find_performance_by_user_id_and_week($compare_id,$performance['week']);
             
              ?>
              <dl>
              <dt>User name</dt>
              <dd><?php echo h($user_to_compare['full_name']); ?></dd>
            </dl>
            <dl>
              <dt>BackStroke</dt>
              <dd><?php echo h($user_to_compare['backstroke']); ?></dd>
            </dl>
            <dl>
              <dt>Breaststroke</dt>
              <dd><?php echo h($user_to_compare['breaststroke']); ?></dd>
            </dl>
            <dl>
              <dt>Butterfly</dt>
              <dd><?php echo h($user_to_compare['butterfly']); ?></dd>
            </dl>
            <dl>
              <dt>Sidestroke</dt>
              <dd><?php echo h($user_to_compare['sidestroke']); ?></dd>
            </dl>
            <dl>
              <dt>Week</dt>
              <dd><?php echo h($user_to_compare['week']); ?></dd>
            </dl>
            <?php
              }
            ?>
        </td>
      </tr>
    </table>
    </div>

  </div>

</div>
