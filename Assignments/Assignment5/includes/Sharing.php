<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 4");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 4");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="4"){
            setcookie("lastVisitedIds","4,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "4", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Sharing | Softsol</title>
</head>
<body class="sharingPage">
    <?php $page='Sharing'; include 'navbar.php' ?>
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
                <img src="../img/FileSharing1.jpeg" alt="FileSharing1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/FileSharing2.jpeg" alt="FileSharing2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/FileSharing3.jpeg" alt="FileSharing3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Sharing</h4>
            <p class="longDesc">
            Share and manage content, knowledge, and applications to empower teamwork, quickly find information, and seamlessly collaborate across the organization.
            <br>
            <br>
            Softsol Sharing empowers teamwork with dynamic and productive team sites for every project team, department, and division. Share files, data, news, and resources. Customize your site to streamline your team's work. Collaborate effortlessly and securely with team members inside and outside your organization, across PCs, Macs, and mobile devices.
            <br>
            <br>
            Build cohesion and inform your employees throughout your intranet. Drive organizational efficiency by sharing common resources and applications on home sites and portals. Tell your story with beautiful communication sites. And stay in the know with personalized, targeted news on the web and the mobile apps.
            <br>
            <br>
            You're just a click away from what you are looking for, with powerful search and intelligent ways to discover information, expertise, and insights to inform decisions and guide action. Softsol sharing's rich content management, along with valuable connections and conversations surfaced in Yammer, enable your organization to maximize the velocity of knowledge.
            <br>
            <br>
            Accelerate productivity by transforming processes—from simple tasks like notifications and approvals to complex operational workflows. With Softsol Sharing' lists and libraries, Power Automate, and Power Apps, you can create rich digital experiences with forms, workflows, and custom apps for every device.
            </p>
        </div>
    </div>
</body>