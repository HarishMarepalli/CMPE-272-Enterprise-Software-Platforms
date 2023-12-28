<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 10");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 10");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="10"){
            setcookie("lastVisitedIds","10,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "10", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Mail | Softsol</title>
</head>
<body class="mailPage">
    <?php $page='Mail'; include 'navbar.php' ?>
    <div class="topContainer">
        <!-- Carousel -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/Mail1.jpeg" alt="Mail1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Mail2.jpeg" alt="Mail2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Mail3.jpeg" alt="Mail3" class="d-block" style="width:100%">
            </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="longDescContainer">
            <h4 class="Desctext">Softsol Mail</h4>
            <p class="longDesc">
            Softsol Mail is a free email service provided by Softsol. As of 2012, it had 1.5 billion active users worldwide. A user typically accesses Mail in a web browser or the official mobile app. Softsol also supports the use of email clients via the POP and IMAP protocols.
            <br>
            <br>
            Softsol's mail servers automatically scan emails for multiple purposes, including to filter spam and malware, and to add context-sensitive advertisements next to emails. This advertising practice has been significantly criticized by privacy advocates due to concerns over unlimited data retention, ease of monitoring by third parties, users of other email providers not having agreed to the policy upon sending emails to certain mail addresses, and the potential for Softsol to change its policies to further decrease privacy by combining information with other Softsol data usage.
            </p>
        </div>
    </div>
</body>