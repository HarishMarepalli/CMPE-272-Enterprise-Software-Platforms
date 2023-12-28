<?php
    session_start();
    include_once 'dbconnect.php';
    include 'topProducts.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Products | Softsol</title>
</head>
<body class="productsPage">
    <?php $page='Products'; include 'navbar.php' ?>
    <div class="container mt-6 viewContainer1">
        <a class='prev5ViewBtn'data-bs-toggle='modal' data-bs-target='#last5PrevModal'>View 5 Last Visited Products</a>
        <a class='yourTop5ViewBtn'data-bs-toggle='modal' data-bs-target='#yourTop5Modal'>View your Top 5 Viewed Products</a>
        <a class='globalTop5ViewBtn'data-bs-toggle='modal' data-bs-target='#globalTop5Modal'>View Top 5 Globally Viewed Products</a>
    </div>
    <div class="container mt-6">
        <h1 class="productsIntro">Softsol Products</h1>
        <?php
            $sql = "SELECT * FROM SSProducts";
            $result = $conn->query($sql);
            echo "<div class='row'>\n";
            while($row = $result->fetch_assoc())
            {
                $id = $row["productId"];
                echo "<div class='col-xl-4 card'>\n";
                echo "<img class='card-img-top' style='width:100%' src = ' ../".$row["productImgUrl"]."' alt = '".$row["productName"]."'>\n";
                echo "<div class='card-body'>";
                echo "<h4 class='card-title'>".$row["productName"]."</h4>\n";
                echo "<p class='card-text cardText'>".$row["productShortDesc"]."</p>\n";
                echo "<p class='card-text'>$".$row["productPrice"]."</p>\n";
                echo "<div class='knowMoreBtn'>\n";
                $newName = handleSpaces($row["productName"]);
                echo "<a href='$newName.php' class='btn btn-primary'>Read More</a>";
                echo "</div>";
                echo "</div>\n";
                echo "</div>\n\n";
            }
            echo "</div>\n";

            function handleSpaces($productName)
            {
                $arr = explode(" ", $productName);
                if(isset($arr[1]))
                return $arr[0] . "_" . $arr[1];
                else
                return $productName;
            }
        ?>
    </div>
</body>