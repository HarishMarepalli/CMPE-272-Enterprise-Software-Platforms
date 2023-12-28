<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 3");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 3");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="3"){
            setcookie("lastVisitedIds","3,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "3", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Code Editor | Softsol</title>
</head>
<body class="codeEditorPage">
    <?php $page='CodeEditor'; include 'navbar.php' ?>
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
                <img src="../img/CodeEditor1.jpeg" alt="CodeEditor1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/CodeEditor2.jpeg" alt="CodeEditor2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/CodeEditor3.jpeg" alt="CodeEditor3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Code Editor</h4>
            <p class="longDesc">
            Faster and more reliable 64-bit IDE.
            <br>
            <br>
            Configure and theme just like you would expect from any modern development tool. Whether you choose one of the default themes already installed or explore new themes from the Softsol Marketplace, you have the freedom to make your editor or IDE truly yours.
            <br>
            <br>
            Extensions are add-ons that customize and enhance Softsol Code Editor, including extra settings, features, or uses for existing tools. With thousands of extensions on the marketplace, you've got options galore to increase your productivity and cater to your workflow.
            </p>
        </div>
    </div>
</body>