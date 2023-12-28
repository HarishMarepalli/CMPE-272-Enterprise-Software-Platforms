<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 8");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 8");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="8"){
            setcookie("lastVisitedIds","8,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "8", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Drawing | Softsol</title>
</head>
<body class="drawingPage">
    <?php $page='Drawing'; include 'navbar.php' ?>
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
                <img src="../img/Drawing1.jpeg" alt="Drawing1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Drawing2.jpeg" alt="Drawing2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Drawing3.jpeg" alt="Drawing3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Drawing</h4>
            <p class="longDesc">
            Transform the way you use and visualize data so you can bring your best ideas to life. With dozens of ready-to-use templates and thousands of customizable shapes, Softsol Drawing makes it easy—and fun—to create powerful visuals.
            <br>
            <br>
            Drawing in Softsol is available to Softsol commercial subscribers, so you can create professional diagrams anytime, anywhere, with anyone.
            <br>
            <br>
            Create easy-to-understand visuals with confidence. Choose from dozens of premade templates, starter diagrams, and stencils available in the Drawing desktop and web app.
            <br>
            <br>
            Create and coauthor professional-looking diagrams for effective decision making, data visualization, and process execution to help increase productivity across the business.
            <br>
            <br>
            Drawing is an innovative solution that helps you visualize data-connected business process flows with a host of integrated features that bring the power of Softsol to Drawing.
            <br>
            <br>
            Drawing supports a variety of accessibility features—including Narrator, Accessibility Checker, and high-contrast support—to help ensure your Visio diagrams are available for everyone.
            <br>
            <br>
            Drawing shares many of the same security features as Softsol apps, including Information Rights Management (IRM), to provide persistent production of diagram files while users collaborate.
            </p>
        </div>
    </div>
</body>