<?php
require_once('../../../private/initialize.php');
if(is_post_request()) {
    $user = [];
    $user['full_name'] = $_POST['full_name'] ?? '';
    $user['email'] = $_POST['email'] ?? '';
    $user['age'] = $_POST['age'] ?? '';
    $user['role'] = $_POST['role'] ?? '';
    $result = insert_user($user);
    if($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/admin/user/view.php?id=' . $new_id));
      } else {
        $errors = $result;
      }
  } else {
    // display the blank form
    $user = [];
    $user["full_name"] = '';
    $user["email"] = '';
    $user["age"] = '';
    $user["role"] = '';
  }
  $roels = ['swimmer','parent','coach','admin']
?>
<?php $page_title = 'Create User';?>
<?php include(SHARED_PATH . '/header.php');?>

<div id="content">
    <div>
        <h1>
            Create User
        </h1>
        <?php echo display_errors($errors);?>

        <form action="<?php echo url_for('/admin/user/create.php');?>" method="post">
            <dl>
                <dt>
                    User Name
                </dt>
                <dd>
                    <input type="text" name="full_name"value="<?php echo h($user['full_name']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    email
                </dt>
                <dd>
                    <input type="text" name="email"value="<?php echo h($user['email']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    Age
                </dt>
                <dd>
                    <input type="text" name="age"value="<?php echo h($user['age']);?>"/>
                </dd>
            </dl>
            <dl>
                <dt>
                    Role
                </dt>
                <dd>
                    <input type="text" name="role"value="<?php echo h($user['role']);?>"/>
                </dd>
            </dl>
            <div>
                <input type="submit" value="Create User"/>
            </div>


        </form>
    </div>

</div>
<?php include(SHARED_PATH.'/footer.php');?>