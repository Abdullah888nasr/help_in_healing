<?php 
    // this variable for writing the file name in server to access its css page and the title page because pathinfo return array has elements such as filename, basename, extantion etc
    $path_parts = pathinfo(basename($_SERVER["PHP_SELF"]));
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Website for helping people to arrival to the doctor faster">
        <title><?php echo "Help in healing - " . ucfirst($path_parts['filename']) ?></title>
        <link rel="stylesheet" href="layout/css/style.css">
        <link rel="icon" href="layout/images/icon_head.png">
    </head>
    <body>
        <nav>
            <a href="index.php" title="Home">Home</a>
            <a href="about.php" title="About us">About us</a>
            <a href="about.php?contact=" title="Connect us">Connect us</a>
            <?php
                if(isset($_SESSION['type']) && $path_parts['filename']!='signup' && $path_parts['filename']!='login'):
                    if($_SESSION['type'] === "1"):?>
                        <a href="admin/index.php">Dashboard</a>
                    <?php endif;
                endif;
                if(isset($_SESSION['firstname']) && $path_parts['filename']!=='signup' && $path_parts['filename']!=='login'){?>
                <a href='login.php?logout=' title='Logout'>Logout</a>
            <?php } else { ?>
                <a href='login.php' title='Login' id='link4'>Login</a>
            <?php } ?>
            <?php
                if(isset($_SESSION['firstname']) && $path_parts['filename']!=='signup'&& $path_parts['filename']!=='login'):
                    echo "<span>".$_SESSION['firstname']."</span>";
                endif;
            ?>
        </nav>