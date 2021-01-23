<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Website for helping people to arrival to the doctor faster">
        <title><?php echo "Help in healing - Dashboard";?></title>
        <link rel="stylesheet" href="../layout/css/style.css">
        <link rel="icon" href="../layout/images/icon_head.png">
    </head>
    <body>
        <nav>
            <a href="../index.php" title="Home">Home</a>
            <a href="../about.php" title="About us" id="link2">About us</a>
            <a href="../about.php?contact=" title="Connect us" id="link3">Connect us</a>
            <a href="index.php">Dashboard</a>
                <a href='../login.php?logout=' title='Logout'>Logout</a>
                <span><?=$_SESSION['firstname']?></span>
        </nav>