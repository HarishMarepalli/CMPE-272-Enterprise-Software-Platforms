<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "Zacien@377";
$dbName = "MyFirstDB";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //you need to exit the script, if there is an error
    exit();
}
?>