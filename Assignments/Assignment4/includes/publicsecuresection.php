<?php session_start();  include 'header.php'; $_SESSION["isAdmin"] = false; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>PublicSecure | Softsol</title>
</head>
<body class="psecurePage">
    <?php $_SESSION["isSecure"] = true; $page='Secure'; $secure = true; include 'navbar.php' ?>
    <h1 class="psecureWelcome" style="color:#fff">Hello, <?php echo $_SESSION["user"]?></h1>
    <h2>Thank you for registering with us.</h2>
    <script>
        setTimeout(function () 
        {
            window.location.href= '../index.php?errmsg=1'; // the redirect goes here
        },<?php echo $timeoutInSec*1000 ?>);
    </script>
</body>