<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 9");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 9");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="9"){
            setcookie("lastVisitedIds","9,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "9", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Video | Softsol</title>
</head>
<body class="videoPage">
    <?php $page='Video'; include 'navbar.php' ?>
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
                <img src="../img/Video1.jpeg" alt="Video1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Video2.jpeg" alt="Video2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Video3.jpeg" alt="Video3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Video</h4>
            <p class="longDesc">
            Show exactly what you mean with explainer videos by recording yourself and the screen. Plus, you can add text, drawings, and effects to personalize your videos.
            <br>
            <br>
            Catch up on what you missed with meeting recordings. Find what you are looking for quickly with chapters and transcript search.
            <br>
            <br>
            Share videos and give and receive feedback easily with comments and @mentions.
            <br>
            <br>
            Get detailed analytics to measure the engagement and effectiveness of your video content.
            <br>
            <br>
            Enjoy the freedom to watch videos and meeting recordings on your own time, across all your devices.
            </p>
        </div>
    </div>
</body>