<?php session_start();  include_once 'dbconnect.php';?>
<?php
    $result = $conn->query("SELECT * FROM SSProducts where productId = 7");
    $prod = $result -> fetch_assoc();
    $hits = $prod["productHits"] + 1;
    $conn->query("UPDATE SSProducts SET productHits = ".$hits." WHERE productId = 7");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastVisitedIds"])){
        if(explode(",",$_COOKIE["lastVisitedIds"])[0]!="7"){
            setcookie("lastVisitedIds","7,".$_COOKIE["lastVisitedIds"],time() + (86400 * 30));    
        }
    }
    else{
        setcookie("lastVisitedIds", "7", time() + (86400 * 30));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Chat | Softsol</title>
</head>
<body class="chatPage">
    <?php $page='Chat'; include 'navbar.php' ?>
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
                <img src="../img/Chat1.jpeg" alt="Chat1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Chat2.jpeg" alt="Chat2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../img/Chat3.jpeg" alt="Chat3" class="d-block" style="width:100%">
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
            <h4 class="Desctext">Softsol Chat</h4>
            <p class="longDesc">
            Stay connected and access shared content any time to learn, plan, and innovate—together.
            <br>
            <br>
            Share your screen, change or blur your background, and use together mode to virtually be in the same space.
            <br>
            <br>
            Make and receive calls directly in Softsol Chat with advanced features like group calling, voicemail, and call transfers.
            <br>
            <br>
            Easily find, share, and edit files together in real time with apps like Word, PowerPoint, and Excel.
            <br>
            <br>
            Share your thoughts and your personality. Send GIFs, stickers, and emojis in one-to-one or group chats.
            </p>
        </div>
    </div>
</body>