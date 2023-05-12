    <?php
    require_once('../private/initialize.php');
    session_start();
    $user = $_SESSION['user'];

    if(isset($user)){

    }else{
        echo('session is not set');
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <h1><?php echo $user['full_name'];?></h1>
        <table class="list">
        <tr>
            <th>Main Menu</th>
        </tr>

        <tr>
                <td>
                <a href="<?php echo url_for("admin/gala/index.php");?>">Galas</a>
                </td>

    </tr>
    <tr>
                <td>
                <a href="<?php echo url_for("admin/user/index.php");?>">Users</a>
                </td>

    </tr>
    <tr>
                <td>
                <a href="<?php echo url_for("admin/performance/index.php");?>">Performance</a>
                </td>

    </tr>
    <tr>
                <td>
                <a href="<?php echo url_for("admin/gala_results/index.php");?>">Gala Results</a>
                </td>

    </tr>
   
    </table>
    </body>
    </html>
