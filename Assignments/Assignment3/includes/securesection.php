<?php session_start();
    $timeoutInSec = 30;
        ob_start();
            if (!isset($_SESSION["user"])){
                header("location:../index.php");
                exit;
            }
            else if(isset($_SESSION['user']) && (time() - $_SESSION["last_login_timestamp"] > $timeoutInSec))
            {
                session_unset(); 
                session_destroy();
                header("location:../index.php?errmsg=1");
                exit;
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Secure | Softsol</title>
</head>
<body class="securePage">
    <?php $page='Secure'; include 'navbar.php' ?>
    <div class="secureContainer">
        <h1 class="secureWelcome">Welcome, <?php echo $_SESSION["user"]?></h1>
        <br/>
        <p class="simpleText">This website users are:</p>
        <br/>
        <?php
            $userfile = fopen("../txt/users.txt", "r");
            $cnt = 1;
            while(($line=fgets($userfile))!==false){
                    $user = explode(",", $line);
                    echo "<p class='usersList'>";
                    echo $cnt.". ";
                    echo $user[0];
                    echo "</p><br/>";
                    $cnt++;
                }
            fclose($userfile);    
        ?>
    </div>
    <script>
        setTimeout(function () {
            window.location.href= '../index.php?errmsg=1'; // the redirect goes here

            },<?php echo $timeoutInSec*1000 ?>);
    </script>  
</body>