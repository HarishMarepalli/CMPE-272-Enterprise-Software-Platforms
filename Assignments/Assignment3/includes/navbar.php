<nav class="navbar navbar-expand-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
            <img src="../img/SoftsolLogo.svg" alt="Softsol Logo" style="width:10em;"> 
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php if($page == 'Home') { echo 'active';}?>" href="../index.php" href="#">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == 'About') { echo 'active';}?>" 
                href=<?php if($page != 'Home') { echo 'about.php';} else { echo 'includes/about.php';}?>
                >ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == 'Products') { echo 'active';}?>" 
                href=<?php if($page != 'Home') { echo 'products.php';} else { echo 'includes/products.php';}?>>PRODUCTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == 'News') { echo 'active';}?>" 
                href=<?php if($page != 'Home') { echo 'news.php';} else { echo 'includes/news.php';}?>>NEWS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == 'Contact') { echo 'active';}?>" 
                href=<?php if($page != 'Home') { echo 'contacts.php';} else { echo 'includes/contacts.php';}?>>CONTACTS</a>
            </li>
            <?php
                if(($page == 'Secure'))
                {
                    echo "<li class='nav-item'>
                            <a class='nav-link' 
                            href='logout.php'>LOGOUT</a>
                        </li>";
                }
            ?>
        </ul>
    </div>
</nav>