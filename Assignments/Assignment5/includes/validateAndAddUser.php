<?php 
    session_start();
    ob_start();
    $_SESSION["last_login_timestamp"] = time();
    include_once 'dbconnect.php';
     if (isset($_POST["Signup"]) && 
        !empty($_POST["firstName"]) && 
        !empty($_POST["lastName"]) &&
        !empty($_POST["newUserName"]) 
        && !empty($_POST["newPassword"]))
     {
        if(preg_match("/^[0-9]+$/", $_POST["firstName"]))
        {
            header("location: ../index.php?errmsg=2");
            $_SESSION["errmessage"] = "Invalid FirstName";
            exit;
        }
        else if(preg_match("/^[0-9]+$/", $_POST["lastName"]))
        {
            header("location: ../index.php?errmsg=3");
            $_SESSION["errmessage"] = "Invalid LastName";
            exit;
        }
        else if(!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $_POST["emailID"]))
        {
            header("location: ../index.php?errmsg=4");
            $_SESSION["errmessage"] = "Invalid Email ID";
            exit;
        }
        else if(!preg_match("/^[(][0-9]{3}[)][0-9]{3}-[0-9]{4}$/", $_POST["homePhone"]))
        {
            header("location: ../index.php?errmsg=5");
            $_SESSION["errmessage"] = "Invalid Home Phone Number";
            exit;
        }
        else if(!preg_match("/^[(][0-9]{3}[)][0-9]{3}-[0-9]{4}$/", $_POST["cellPhone"]))
        {
            header("location: ../index.php?errmsg=6");
            $_SESSION["errmessage"] = "Invalid Cell Phone Number";
            exit;
        }
        else
        {
            //Check for duplicate user
            $sql = "SELECT * FROM SSCompUsersLst";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
                if($row["email"] == $_POST["emailID"])
                {
                    header("location:../index.php?errmsg=8");
                    exit;
                }
                if($row["userName"] == $_POST["newUserName"])
                {
                    header("location:../index.php?errmsg=8");
                    exit;
                }
            }

            //Insert user to the DB
            $sql = "INSERT INTO SSCompUsersLst (firstName,lastName,email,homeAddress,homePhone,cellPhone,userName,passwd) VALUES ('".$_POST["firstName"]."', '".$_POST["lastName"]."', '".$_POST["emailID"]."', '".$_POST["homeAddress"]."', '".$_POST["homePhone"]."', '".$_POST["cellPhone"]."', '".$_POST["newUserName"]."', AES_ENCRYPT('".$_POST["newPassword"]."','secretkey'))";
            mysqli_query($conn, $sql);
            $conn->close();
            $_SESSION["user"] = $_POST["newUserName"];
            if(!$_SESSION["isAdmin"])
            header("location: publicsecuresection.php");
            else
            {
                $_SESSION["user"] = $_SESSION["adminUserName"];
                header("location: users.php");
            }
            exit;
        }
     }
     else
    {
        header("location: ../index.php?errmsg=7");
        $_SESSION["errmessage"] = "Please fill all the fields of Signup Form correctly.";
    }
?>