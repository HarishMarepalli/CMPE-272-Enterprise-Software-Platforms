<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 2");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 2");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="2"){
            setcookie("lastVisitedIds","2,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "2", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Browser | Softsol</title>
</head>
<body class="browserPage">
    <?php $page='Browser'; include 'navbar.php' ?>
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
                <img src="../img/Browser1.jpeg" alt="Browser1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Browser2.jpeg" alt="Browser2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Browser3.jpeg" alt="Browser3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Browser</h4>
            <p class="longDesc">
            Softsol Browser is the best browser for Windows. Sync your passwords, favorites, and settings across multiple devices and start using Softsol Browser today.
            <br>
            <br>
            Boost your browsing experience with world class performance and speed, optimized to work best with Windows.
            <br>
            <br>
            Find inspiration for your creative projects, with features designed to personalize your experience for work and play.
            <br>
            <br>
            With built-in tools to help you save, Browser provides the best online shopping experience of any internet browser.
            <br>
            <br>
            Softsol Browser offers the highest rated protection against phishing and malware attacks on Windows 11/10.
            </p>
        </div>
    </div>
</body>