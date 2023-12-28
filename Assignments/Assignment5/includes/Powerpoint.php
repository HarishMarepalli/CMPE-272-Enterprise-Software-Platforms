<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 6");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 6");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="6"){
            setcookie("lastVisitedIds","6,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "6", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Powerpoint | Softsol</title>
</head>
<body class="powerpointPage">
    <?php $page='Powerpoint'; include 'navbar.php' ?>
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
                <img src="../img/Powerpoint1.jpeg" alt="Powerpoint1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Powerpoint2.jpeg" alt="Powerpoint2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Powerpoint3.jpeg" alt="Powerpoint3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Powerpoint</h4>
            <p class="longDesc">
            Create well-designed, impactful slides with the help of Designer and Ideas in PowerPoint.
            <br>
            <br>
            Now you can easily insert 3D objects and embedded animations directly into PowerPoint decks from your own files or a library of content.
            <br>
            <br>
            Easily ink onto a slide, then convert handwritten notes into text and make hand-drawn shapes perfect in seconds.
            <br>
            <br>
            With Presenter Coach, practice your speech and get recommendations on pacing, word choice, and more through the power of AI.
            <br>
            <br>
            Always know where you are in the editing process. With the while you were away feature, track recent changes made by others in your decks.
            <br>
            <br>
            Get commonly used Office features and real-time co-authoring capabilities through your browser.
            <br>
            <br>
            Show your style and professionalism with templates, plus save time. Browse PowerPoint templates in over 40 categories.
            <br>
            <br>
            See what's new and get classic tips and editors' tricks to help you create, edit, and polish presentations like a pro.
            </p>
        </div>
    </div>
</body>