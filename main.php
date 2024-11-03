<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeX Shop</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="wrapper">
        <a href="index.php" class="logo"></a>
        <div class="emptydiv"></div>
        <div class="top">
            <a href="showcase.html">Showcase</a>
            <a href="about.html">About US</a>
            <a href="contact.php">Contact US</a>
            <a href="FAQ.html" style="margin-right: 10px;">FAQ</a>
        </div>
        <div class="header">

            <img src="vectors/menu (1).png" class="menu" alt="">
            <div class="menulink">
                <a href="men.php">Men</a>
                <a href="women.php">Women</a>
                <a href="accessories.php">Accessories</a>
            </div>
            <img src="vectors/shopping-cart.png" class="cart" id="carty" alt="" onclick="cart(<?php session_start(); echo $_SESSION['login']; ?>)">
                <span class="cart-counter"><?php  echo $_SESSION['cartnum'] ?></span>
                <img src="vectors/user.png" class="user" alt="" onclick="settingaccount(<?php  echo $_SESSION['login']; ?>)">

            <h1></h1>
        </div>
        <div class="sidebar">
            <h2>Gender Category</h2>
            <button class="filter-button active" data-category="all">All</button>
            <button class="filter-button" data-category="male">Male</button>
            <button class="filter-button" data-category="female">Female</button>
            <h2>Shoe Category</h2>
            <button class="filter-button active" data-category="all">All</button>
            <button class="filter-button" data-category="accessories">Accessories</button>
            <button class="filter-button" data-category="basketball">Basketball</button>
            <button class="filter-button" data-category="football">Football</button>
            <button class="filter-button" data-category="tennis">Tennis</button>
            <button class="filter-button" data-category="running">Running</button>

            <h2>Color Category</h2>
            <button class="color-button active" data-color="all">All</button>
            <button class="color-button" data-color="black" style="background-color: black;">.</button>
            <button class="color-button" data-color="white" style="background-color: white;">.</button>
            <button class="color-button" data-color="green" style="background-color: green;">.</button>
            <button class="color-button" data-color="pink" style="background-color: pink;">.</button>

        </div>
        <div class="main"></div>
        <!-- /////////////////////////////////////// Male basketball //////////////////////////// -->
        <div class="body1" data-category="male basketball" data-color="black">
            <div class="info">
                <div class="price">$99.99</div>
                <div class="name">Zoom_Pegasus_Turbo</div>
            </div>
        </div>
        <div class="body2" data-category="male basketball" data-color="black">
            <div class="info">
                <div class="price">$150</div>

                <div class="name">VaporMax</div>
            </div>

        </div>
        <div class="body3" data-category="male basketball" data-color="green">
            <div class="info">
                <div class="price">$120</div>
                <div class="name">Dunk_Low</div>
            </div>
        </div>
        <div class="body4" data-category="male basketball" data-color="green">
            <div class="price">$120</div>
            <div class="name">Jordan_1_Retro_High</div>
        </div>
        <div class="body5" data-category="male basketball" data-color="white">
            <div class="price">$220</div>
            <div class="name">Air_Jordan_11_Retro</div>
        </div>
        <div class="body6" data-category="male basketball" data-color="white">
            <div class="price">$180</div>
            <div class="name">Air_Jordan_4_Retro</div>
        </div>
        <!-- //////////////////////////////////// male football //////////////////////////// -->
        <div class="body7" data-category="male football" data-color="black">
            <div class="price">$160</div>
            <div class="name">Mercurial_Superfly</div>
        </div>


        <div class="body8" data-category="male football" data-color="black">
            <div class="price">$150</div>
            <div class="name">Phantom_Venom</div>
        </div>
        <div class="body9" data-category="male football" data-color="white">
            <div class="price">$150</div>
            <div class="name">Magista_Obra</div>
        </div>
        <div class="body10" data-category="male football" data-color="white">
            <div class="price">$150</div>
            <div class="name">Hypervenom_Phantom</div>

        </div>
        <div class="body11" data-category="male football" data-color="white">
            <div class="price">$150</div>
            <div class="name">Phantom_Vision</div>

        </div>
        <!-- /////////////////////////////////// male running /////////////////////////// -->
        <div class="body12" data-category="male running" data-color="black">
            <div class="price">$150</div>
            <div class="name">Vapor_XII</div>
        </div>
        <div class="body13" data-category="male running" data-color="green">
            <div class="price">$150</div>
            <div class="name">Tiempo_Legend_VII</div>
        </div>
        <div class="body14" data-category="male running" data-color="green">
            <div class="price">$150</div>
            <div class="name">Mercurial_Vapor</div>
        </div>
        <div class="body15" data-category="male running" data-color="white">
            <div class="price">$150</div>
            <div class="name">Phantom_VSN</div>
        </div>
        <div class="body16" data-category="male running" data-color="white">
            <div class="price">$150</div>
            <div class="name">Magista_Onda</div>
        </div>
        <!-- ////////////////////////////////////// female running /////////////////////// -->
        <div class="body17" data-category="female running" data-color="white">
            <div class="price">$150</div>
            <div class="name">Mercurial_Veloce</div>
        </div>
        <div class="body18" data-category="female running" data-color="white">
            <div class="price">$150</div>
            <div class="name">Hypervenom_Phinish</div>
        </div>
        <div class="body19" data-category="female running" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Superfly_7</div>
        </div>
        <div class="body20" data-category="female running" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Tiempo_Legend_VI</div>
        </div>
        <div class="body21" data-category="female running" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Mercurial_Superfly_VI</div>
        </div>
        <!-- ////////////////////////////////// female tennis ////////////////// -->
        <div class="body22" data-category="female tennis" data-color="black">
            <div class="price">$150</div>
            <div class="name">Hypervenom_Phantom_II</div>
        </div>
        <div class="body23" data-category="female tennis" data-color="black">
            <div class="price">$150</div>
            <div class="name">Zoom_Freak_2</div>
        </div>
        <div class="body24" data-category="female tennis" data-color="black">
            <div class="price">$150</div>
            <div class="name">Renew_Run</div>
        </div>
        <div class="body25" data-category="female tennis" data-color="pink">
            <div class="price">$150</div>
            <div class="name">React_Infinity_Run</div>
        </div>
        <div class="body26" data-category="female tennis" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Blazer_Mid</div>
        </div>
        <!-- //////////////////////////////////////////// accessories /////////////////// -->
        <div class="body27" data-category="accessories" data-color="black">
            <div class="price">$150</div>
            <div class="name">cap</div>
        </div>
        <div class="body28" data-category="accessories" data-color="black">
            <div class="price">$150</div>
            <div class="name">Water_bottle</div>
        </div>
        <div class="body29" data-category="accessories" data-color="black">
            <div class="price">$150</div>
            <div class="name">Glove</div>
        </div>
        <div class="body30" data-category="accessories" data-color="black">
            <div class="price">$150</div>
            <div class="name">Book-Bag</div>
        </div>
        <div class="body31" data-category="accessories" data-color="green">
            <div class="price">$150</div>
            <div class="name">Goal_keeper_glove</div>
        </div>
        <div class="body32" data-category="accessories" data-color="white">
            <div class="price">$150</div>
            <div class="name">Socks_low</div>
        </div>
        <div class="body33" data-category="accessories" data-color="white">
            <div class="price">$150</div>
            <div class="name">Socks</div>
        </div>

        <div class="footer">
            <!-- line -->
            <hr>

            <!--  social's for the footer -->
            <img src="vectors/instagram.png" class="in" alt="">
            <img src="vectors/linkedin.png" class="lin" alt="">
            <img src="vectors/twitter.png" class="tw" alt="">
            <!-- payment method img -->
            <img src="vectors/amex.png" class="amex" alt="">
            <img src="vectors/paypal.png" class="paypal" alt="">
            <img src="vectors/visa.png" class="visa" alt="">

            <div class="buttom">
            <h1>Help</h1>
                    <a href="showcase.html">Showcase</a>
                    <a href="about.html">About US</a>
                    <a href="contact.php">Contact US</a>
                    <a href="FAQ.html">FAQ</a>
                    <h1 class="sws">shopping_with_Shoex</h1>
                    <a href="" class="shoppingpolicy">shopping_policy</a>
                    <a href="" class="Pm">Payment_Methods</a>
                    <a href="" class="sg">Size_Guide</a>

                    <h1 class="h2">My Account</h1>
                    <a href="Log-in soe - Copy/index.php" class="link2">Login</a>
            </div>
        </div>
</body>

</html>
<script src="jquery.js"></script>
<script src="main.js"></script>