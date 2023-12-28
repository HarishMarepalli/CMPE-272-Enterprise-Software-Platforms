<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php' ?>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Softsol | Innovation At Its Best</title>
</head>
<body>
    <?php 
        if(isset($_GET["errmsg"]))
        if($_GET["errmsg"] == 0)
        {
            echo "
            <div class='alert alert-danger alert-dismissible fade show'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            <strong>Error : </strong> Invalid Username or Password
            </div>
            <script>window.history.replaceState(null, '', '/index.php')</script>
            ";
            
        }
        else if($_GET["errmsg"] == 1)
        {
            echo "
            <div class='alert alert-danger alert-dismissible fade show'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            <strong>Info : </strong> Session Expired....Please Login Again
            </div>
            <script>window.history.replaceState(null, '', '/index.php')</script>
            ";
        }
    ?>
    <?php $page='Home'; include 'includes/navbar.php' ?>
    <?php $page='Home'; include 'includes/home.php' ?>
    <?php include 'includes/login.php' ?>
</body>
</html>
