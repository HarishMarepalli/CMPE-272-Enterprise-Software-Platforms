<?php 
//session_start(); 
include 'header.php'; 
include_once 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Users | Softsol</title>
</head>
<body class="usersPage">
    <?php $page='Users'; include 'navbar.php' ?>
    <?php include 'login.php' ?>
    <?php include 'searchUser.php' ?>
    <div class="txtContainer">
        <h3 class="text1">Hello, <?php echo $_SESSION["user"]?></h3>
        <p class="text2">Current list of registered users:</p>
    </div>

	<div class="usersContainer">
        <?php
            if(isset($_POST["Search"]))
            {
                $sql = "SELECT * FROM SSCompUsersLst";
                if($_POST["searchName"]=="" && $_POST["searchEmailID"]== "" && $_POST["searchPhone"] == "")
                {
                    $result = mysqli_query($conn, $sql);
                }
                else
                {
                    $whereText = " WHERE "; 
                    $orText = " OR ";
                    $flag1 = false;
                    $flag2 = false;
                    if(isset($_POST["searchName"]) and $_POST["searchName"]!="")
                    {
                        $sql .= $whereText;
                        $sql=$sql."firstName LIKE '%".$_POST["searchName"]."%' OR lastName LIKE '%".$_POST["searchName"]."%'";
                        $flag1 = true;
                    }
                    /*else
                    {
                        $sql=$sql." WHERE firstName = '' OR lastName= ''";
                    }*/
                    if(isset($_POST["searchEmailID"]) and $_POST["searchEmailID"] != "" )
                    {
                        if($flag1 || $flag2)
                        {
                            $sql .= $orText;
                            $sql=$sql."email LIKE '%".$_POST["searchEmailID"]."%'";
                        }
                        else
                        {
                            $sql .= $whereText;
                            $sql=$sql."email LIKE '%".$_POST["searchEmailID"]."%'";
                        }
                        $flag2 = true;
                    }
                    if(isset($_POST["searchPhone"]) and $_POST["searchPhone"] != "")
                    {
                        if($flag1 || $flag2)
                        {
                            $sql .= $orText;
                            $sql=$sql."homePhone LIKE '%".$_POST["searchPhone"]."%' OR cellPhone LIKE '%".$_POST["searchPhone"]."%'";
                        }
                        else
                        {
                            $sql .= $whereText;
                            $sql=$sql."homePhone LIKE '%".$_POST["searchPhone"]."%' OR cellPhone LIKE '%".$_POST["searchPhone"]."%'";
                        }
                    }
                    $result = mysqli_query($conn, $sql);
                }
            }
            else{
                $sql = "SELECT * FROM SSCompUsersLst";
                //$sql = "SELECT firstName,lastName,email,homeAddress,homePhone,cellPhone,userName,CONVERT(AES_DECRYPT(passwd, 'secretkey') USING utf8) AS passwd FROM UsersList";
                $result = mysqli_query($conn, $sql);
            }

            if(mysqli_num_rows($result) > 0)
            {
                echo "<table class='table table-bordered' style='color:#fff'>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email ID</th>
                        <th>Home Address</th>
                        <th>Home Phone</th>
                        <th>Cell Phone</th>
                        <th>User Name</th>
                    </tr>
                </thead>
                <tbody>";
                $cnt = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $cnt++;
                    echo "<tr>";
                        echo "<td>";
                            echo $cnt;
                        echo "</td>";
                        echo "<td>";
                            echo $row["firstName"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["lastName"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["email"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["homeAddress"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["homePhone"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["cellPhone"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["userName"];
                        echo "</td>";
                    echo "</tr>";
                }
            }
            else
            {
                echo "
                <div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Error : </strong> No records found.
                </div>
                <script>window.history.replaceState(null, '', 'users.php')</script>
                ";
            }
        ?>
        </tbody>
        </table>
        <br/>
        <br/>
        <div class="add_Search_BtnContainer">
            <a class="addUserBtn" data-bs-toggle="modal" data-bs-target="#signUpModal">ADD</a>
            <a class="searchUserBtn" data-bs-toggle="modal" data-bs-target="#searchModal">SEARCH</a>
        </div>
    </div>

    <script>
        setTimeout(function () {
            window.location.href= '../index.php?errmsg=1'; // the redirect goes here
            },<?php echo $timeoutInSec*1000 ?>);
    </script> 
</body>