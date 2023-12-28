<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 5");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 5");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="5"){
            setcookie("lastVisitedIds","5,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "5", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Drive | Softsol</title>
</head>
<body class="drivePage">
    <?php $page='Drive'; include 'navbar.php' ?>
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
                <img src="../img/Drive1.jpeg" alt="Drive1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Drive2.jpeg" alt="Drive2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Drive3.jpeg" alt="Drive3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Drive</h4>
            <p class="longDesc">
            Access and protect your business and school work with this intelligent files app. Share and collaborate from anywhere, on any device.
            <br>
            <br>
            Easily add shared files from Softsol Teams or Sharing to Softsol Drive, upload files up to 100GB, sync libraries, and more.
            <br>
            <br>
            Work better together. New integrations allow you to create sharable links, grant expiring access, and follow configured policies.
            <br>
            <br>
            Enhance admin capabilities with sync reports, apply sensitivity labels, and manage migration.
            <br>
            <br>
            Easily store, access, and discover your individual and shared work files in Softsol apps, from all your devices. Your offline edits will automatically sync next time you connect.
            <br>
            <br>
            Work faster and smarter with anyone inside or outside your organization. Securely share files and work together in real time using Word, Excel, and PowerPoint across web, mobile, and desktop.
            <br>
            <br>
            Create, view, edit, and share files on the go with the Drive mobile app. Easily capture whiteboards and scan work receipts, business cards, and other paper documents for safekeeping.
            <br>
            <br>
            Back up and protect your files with Softsol Drive. You can easily recover files from accidental deletes or malicious attacks and administrators can manage security policies to help keep your information safe.
            </p>
        </div>
    </div>
</body>