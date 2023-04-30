<?php
if(!isset($page_title)){$page_title = 'Admin';}
?>
<!doctype html>
<html lang='en'>
    <head>
        <title>CRSC - <?php echo h($page_title);?></title>
        <meta charset = "utf-8">
        <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/styles.css');?>">
    </head>
    <body>
        <header>
            <h1>College Road Swimming Club</h1>
        </header>
        <navigation>
            <ul>
                <li>
                    <a href="<?php echo url_for('/index.php')?>">Menu</a>
                </li>
            </ul>
        </navigation>
