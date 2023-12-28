<?php include_once "dbconnect.php"?>

<?php
    $sql = "SELECT * FROM SSCompUsersLst";
    $result = $conn->query($sql);
    $cnt = 0;
    while($row = $result->fetch_assoc())
    {
        $cnt++;
        if(isset($users))
        {
            $users = $users."#".$row["firstName"]."~".$row["lastName"]."~".$row["email"]."~".$row["homeAddress"]."~".$row["homePhone"]."~".$row["cellPhone"];
        }
        else
        {
            $users = $row["firstName"]."~".$row["lastName"]."~".$row["email"]."~".$row["homeAddress"]."~".$row["homePhone"]."~".$row["cellPhone"];
        }
    }
    echo $users;
?>