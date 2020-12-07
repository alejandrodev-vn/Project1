<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuonVuiTuoi</title>
    <link rel="shortcut icon" type="image/x-icon" href="../view/assets/img/favicon.ico">
    <!-- CSS here -->
    <link rel="stylesheet" href="../view/assets/css/reset.css">
    <link rel="stylesheet" href="../view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/assets/css/flaticon.css">
    <link rel="stylesheet" href="../view/assets/css/slicknav.css">
    <link rel="stylesheet" href="../view/assets/css/animate.min.css">
    <link rel="stylesheet" href="../view/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../view/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../view/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../view/assets/css/slick.css">
    <link rel="stylesheet" href="../view/assets/css/nice-select.css">
    <link rel="stylesheet" href="../view/assets/css/style.css">
</head>
<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../view/assets/img/logo/logo.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky" id="navbar">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="../view/assets/img/logo/logo.png" alt="logo"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li class="li-parents" ><a href="index.php">Home</a></li>
                                    <li class="li-parents"><a href="?act=shop">shop</a></li>
                                    <li class="li-parents"><a href="?act=about">about</a></li>
                                    <li class="hot li-parents"><a href="?act=shop">Latest</a></li>
                                    <li class="li-parents"><a href="#">Pages</a>
                                        <ul class="submenu">
                                            <li><a href="?act=login">Login</a></li>
                                            <li><a href="?act=cart">Cart</a></li>
                                            <li><a href="?act=confirmation">Confirmation</a></li>
                                            <li><a href="?act=checkout">Product Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li class="li-parents"><a href="?act=contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <div id="search" class="search">
                                            <span class="closebtn" onclick="closeSearch()" title="Close">×</span>
                                            <div class="search-content">
                                                <form action="/action_page.php">
                                                <input type="text" placeholder="Search.." name="search">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <button class="openBtn" onclick="openSearch()"><span class="flaticon-search"></span></button>
                                        <script >
                                            //search modal
                                            function openSearch() {
                                            document.getElementById("search").style.display = "block";
                                            }

                                            function closeSearch() {
                                            document.getElementById("search").style.display = "none";
                                            }
                                        </script>
                                    </div>
                                </li>
                                <li>
                                <?php                                    
                                    if(!isset($_SESSION['username'])){
                                        ?>                                        
                                <a href="?act=login"><span class="flaticon-user"></span></a>                                        
                                        <?php
                                    }                                    
                                    else{
                                        echo"<a href='?act=login'><span class='flaticon-user'></span></a>" .$_SESSION['username']['fullName'];                                        
                                    }                                   
                                    ?></li>
                                <li><a href="?act=shopping-cart"><span class="flaticon-shopping-cart"></span></a> </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
