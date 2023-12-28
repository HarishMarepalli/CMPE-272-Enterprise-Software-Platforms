<?php
    session_start();
    include_once 'dbconnect.php';
    include_once 'curls.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Combined Users | Softsol</title>
</head>
<body class="combinedUsersPage">
    <div class="txtContainer">
        <h3 class="text1">Users List of 3 Companies</h3>
    </div>
    <div class="combinedUsersContainer">
        <?php $page='combinedUsers'; include 'navbar.php' ?>
        <?php
            echo "<table class='table table-bordered table-text'>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email ID</th>
                    <th>Home Address</th>
                    <th>Home Phone</th>
                    <th>Cell Phone</th>
                </tr>
            </thead>
            <tbody>";
            $rowArray = explode("#",$allContents);
            $cnt = 0;
            for($i=0;$i<sizeof($rowArray);$i++)
            {
                $cnt++;
                echo "<tr>";
                $colArray = explode("~", $rowArray[$i]);
                echo "<td>";
                    echo $cnt;
                echo "</td>";
                echo "<td>";
                    echo $colArray[0];
                echo "</td>";
                echo "<td>";
                    echo $colArray[1];
                echo "</td>";
                echo "<td>";
                    echo $colArray[2];
                echo "</td>";
                echo "<td>";
                    echo $colArray[3];
                echo "</td>";
                echo "<td>";
                    echo $colArray[4];
                echo "</td>";
                echo "<td>";
                    echo $colArray[5];
                echo "</td>";
                echo "</tr>";
            }    
            echo "</tbody>
            </table>" 
        ?>
    </div>
</body>