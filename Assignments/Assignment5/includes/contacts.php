<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <title>Contact Us | Softsol</title>
</head>
<body class="contactsPage">
    <?php $page='Contact'; include 'navbar.php' ?>
    <div class="main-contacts">
        <p class="contact-info">
            <?php
                $contacts = fopen("../txt/contacts.txt", "r");
                while(($line=fgets($contacts))!==false)
                {
                    echo $line;
                    echo "<br/>";
                }
                fclose($contacts);
            ?>
        </p>
    </div>
</body>