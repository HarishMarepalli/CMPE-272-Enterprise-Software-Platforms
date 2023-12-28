<?php
    ob_start();
    session_start();
    $_SESSION["last_login_timestamp"] = time();
     if (isset($_POST["Login"]) && !empty($_POST["Username"]) && !empty($_POST["Password"]))
     {
        $userfile = fopen("../txt/users.txt", "r");
        while(($line=fgets($userfile))!==false)
        {
            $line = rtrim($line,"\r\n");
            $user = explode(",", $line);
            if ($_POST["Username"]==$user[0]  && $_POST["Password"]==$user[1])
            {
                $_SESSION["user"] = $_POST["Username"];
                fclose($userfile);
                header("location: securesection.php");
                exit;
            }
        }
        header("location: ../index.php?errmsg=0");
        $_SESSION["errmessage"] = "Invalid UserName or Password";
        exit;
     }
    else
    {
        header("location: ../index.php?errmsg=0");
        $_SESSION["errmessage"] = "Invalid UserName or Password";
    }
?>